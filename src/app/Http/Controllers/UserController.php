<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function store1(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect('/mypage/profile');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('mypage_profile', compact('user'));
    }

    public function store2(ProfileRequest $request)
    {
        if ($request->hasFile('image')) {
            $dir = 'user_img';
            $file = $request->file('image');
            $userId = auth()->id();
            $file_name = "user{$userId}.{$file->extension()}";
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $user_data = User::find($_POST["id"]);
            $user_data->image = 'storage/' . $dir . '/' . $file_name;
        }

        $user_data = User::find($_POST["id"]);
        $user_data->name = $_POST["name"];
        $user_data->postcode = $_POST["postcode"];
        $user_data->address = $_POST["address"];
        $user_data->building = $_POST["building"];
        $user_data->save();

        return redirect('/');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return redirect('/login')->withErrors(['email' => 'ログイン情報が登録されていません']);
    }

    public function address($item_id)
    {
        $item = Item::find($item_id);
        $userId = Auth::id();
        $user = Auth::user();
        Session::put('previous_url', request()->fullUrl());
        return view('address', compact('item', 'userId', 'user'));
    }

    public function addressUpdate(Request $request)
    {
        $user = $request->only(['postcode', 'address', 'building']);
        User::find($request->id)->update($user);

        $redirectUrl = Session::get('previous_url');
        if ($redirectUrl) {
            Session::forget('previous_url');
            return redirect($redirectUrl);
        }
        return redirect('/');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('mypage_edit', compact('user'));
    }

    public function editUpdate(ProfileRequest $request)
    {
        if ($request->hasFile('image')) {
            $dir = 'user_img';
            $file = $request->file('image');
            $userId = auth()->id();
            $file_name = "user{$userId}.{$file->extension()}";
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $user_data = User::find($_POST["id"]);
            $user_data->image = 'storage/' . $dir . '/' . $file_name;
        } else {
            $user_data = User::find($_POST["id"]);
            $user_data->image = $request->input('existing_image_path');
        }

        $user_data->name = $_POST["name"];
        $user_data->postcode = $_POST["postcode"];
        $user_data->address = $_POST["address"];
        $user_data->building = $_POST["building"];
        $user_data->save();

        return redirect('/mypage');
    }
}
