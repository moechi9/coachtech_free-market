<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->item_id = $request->item_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return back();
    }
}
