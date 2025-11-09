<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\User;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($request->tab === 'mylist') {
            $items = $user->favorites()->with('item')->get();
        }
        $userId = Auth::id();
        $items = Item::where("user_id", "!=", $userId)->orderby('id', 'asc')->get();

        if ($request->has('keyword')) {
            $items = Item::KeywordSearch($request->keyword)->where("user_id", "!=", $userId)->orderby('id', 'asc')->get();
        }
        return view('index', compact('request', 'items'));
    }

    public function item(Request $request, $item_id)
    {
        $item = Item::find($item_id);
        $items = Item::with('condition')->get();
        $items = Item::with('categories')->get();
        return view('item', compact('item', 'items'));
    }

    public function purchase(Request $request, $item_id)
    {
        $item = Item::find($item_id);
        $user = Auth::user();
        return view('purchase', compact('item', 'user'));
    }

    public function sell()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        return view('sell', compact('categories', 'conditions'));
    }

    public function sellPost(Request $request)
    {
        $dir = 'item_img';
        $file = $request->file('image');
        $file_name = "{$_POST["name"]}.{$file->extension()}";
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $item_data = new Item();
        $item_data->user_id = Auth::id();
        $item_data->condition_id = $request->input('category_id');
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
        } else {
        }

        if ($request->has('keyword')) {
            $items = Item::KeywordSearch($request->keyword)->get();
        }
        return view('mypage', compact('user', 'request', 'items'));
    }

    public function buyPost(Request $request)
    {
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity', 1);
        $item = Item::find($itemId);

        if (!$item) {
            return response()->json(['message' => '商品が存在しません'], 404);
        }

        $item->stock -= $quantity;
        $item->save();

        $sale = new Sale([
            'product_id' => $itemId,
        ]);

        $sale->save();
        return response()->json(['message' => '購入成功']);
    }
}
