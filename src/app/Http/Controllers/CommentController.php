<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function comment(CommentRequest $request)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->item_id = $request->item_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return back();
    }
}
