<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store1()
    {
        return view('auth/register');
    }
    public function login()
    {
        return view('auth/login');
    }
}
