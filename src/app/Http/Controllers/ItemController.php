<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ExhibitionRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Sale;
use App\Models\ItemCategory;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $userId = Auth::id();

        if ($request->tab === 'mylist') {
            if (Auth::check()) {
                $items = Item::whereHas('favorites', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })-> where("user_id", "!=", $userId)->orderby('id', 'asc')->get();
            } else {
                $items = collect();
            }
        } else {
            $items = Item::where("user_id", "!=", $userId)->orderby('id', 'asc')->get();
        }

        if ($request->has('keyword')) {
            $items = Item::KeywordSearch($request->keyword)->where("user_id", "!=", $userId)->orderby('id', 'asc')->get();
        }
        $sold_items = Item::with('sale')->get();
        return view('index', compact('request', 'items', 'sold_items'));
    }

    public function item(Request $request, $item_id)
    {
        $item = Item::find($item_id);
        $items = Item::with('condition')->get();
        $items = Item::with('categories')->get();
        $item = Item::with('latestComment.user')->findOrFail($item_id);
        return view('item', compact('item', 'items'));
    }

    public function purchase(Request $request, $item_id)
    {
        $item = Item::find($item_id);
        $user = Auth::user();
        session(['previous-url' => request()->fullUrl()]);
        return view('purchase', compact('item', 'user'));
    }

    public function sell()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        return view('sell', compact('categories', 'conditions'));
    }

    public function sellPost(ExhibitionRequest $request)
    {
        $dir = 'item_img';
        $file_name = $request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('public/' . $dir, $file_name);

        $item_data = new Item();
        $item_data->user_id = Auth::id();
        $item_data->condition_id = $request->input('condition');
        $item_data->name = $_POST["name"];
        $item_data->brand = $_POST["brand"];
        $item_data->price = $_POST["price"];
        $item_data->content = $_POST["content"];
        $item_data->img = 'storage/' . $dir . '/' . $file_name;
        $item_data->save();

        $item_categories = $request->input('item_category', []);
        $new_item_id =  Item::count();

        foreach ($item_categories as $item_category) {

            $item_category_data = new ItemCategory();
            $item_category_data->item_id = $new_item_id;
            $item_category_data->category_id = $item_category;
            $item_category_data->save();
        }
        return redirect('/');
    }

    public function mypage(Request $request)
    {
        $user = Auth::user();
        $items = Item::all();
        if ($request->page === 'sell') {
            $userId = Auth::id();
            $items = Item::where('user_id', $userId)->orderby('id', 'asc')->get();
        } elseif ($request->page === 'buy') {
            $items = Item::whereHas('sale', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->orderby('id', 'asc')->get();
        } else {
            $items = collect();
        }

        if ($request->has('keyword')) {
            $items = Item::KeywordSearch($request->keyword)->get();
        }
        $sold_items = Item::with('sale')->get();
        return view('mypage', compact('user', 'request', 'items', 'sold_items'));
    }

    public function sale(PurchaseRequest $request, $item_id)
    {
        Sale::create(
            [
                'item_id' => $item_id,
                'user_id' => Auth::id()
            ]
        );

        return redirect('/');
    }
}
