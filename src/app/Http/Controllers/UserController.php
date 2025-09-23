<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store1(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect('/mypage/profile');
    }

    public function store2(Request $request){
        $dir = 'images';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $user_data = new User();
        $user_data->image = 'storage/' . $dir . '/' . $file_name;
        $user_data->name = $_POST["name"];
        $user_data->postcode = $_POST["post-code"];
        $user_data->address = $_POST["address"];
        $user_data->building = $_POST["building"];
        $user_data->save();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return redirect('/login')->withErrors(['email' => 'メールアドレスまたはパスワードが間違っています']);
    }
}
