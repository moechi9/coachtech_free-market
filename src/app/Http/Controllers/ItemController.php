<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id();
        $items = Item::where("user_id", "!=", $currentUserId)->orderby('id', 'asc')->get();
        return view('index', compact('items'));
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
        $items = Item::with('user')->get();
        return view('purchase', compact('item', 'items'));
    }

    public function sell()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        return view('sell', compact('categories', 'conditions'));
    }

    public function mypage()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('mypage', compact('items', 'user'));
    }
}
