<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    public function like($id)
    {
        Favorite::create([
            'item_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Favorite::where('item_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }
}
