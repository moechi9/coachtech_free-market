<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    public function like($item_id)
    {
        Favorite::create([
            'item_id' => $item_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function unlike($item_id)
    {
        $favorite = Favorite::where('item_id', $item_id)->where('user_id', Auth::id())->first();
        $favorite->delete();

        return redirect()->back();
    }
}
