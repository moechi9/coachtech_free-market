<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function profile()
    {
        return view('mypage_profile');
    }

    public function index()
    {
        return view('index');
    }

    public function sell()
    {
        return view('sell');
    }

    public function mypage()
    {
        return view('mypage');
    }
}
