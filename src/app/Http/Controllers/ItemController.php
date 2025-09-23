<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;

class ItemController extends Controller
{
    public function profile()
    {
        return view('mypage_profile');
    }

    public function index()
    {
        $items = Item::all();
        return view('index', compact('items'));
    }

    public function item()
    {
        return view('item');
    }

    public function purchase()
    {
        return view('purchase');
    }

    public function address()
    {
        return view('address');
    }

    public function sell()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        return view('sell', compact('categories', 'conditions'));
    }

    public function mypage()
    {
        return view('mypage');
    }
}
