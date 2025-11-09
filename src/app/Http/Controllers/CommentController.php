<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $request){
        $user_id=Auth::id();
        $input=$request['comment'];
        $input=['user_id'=>$user_id];
        $comment=new Comment();
        $comment->fill($input)->save();

        return redirect($input['item_id'])->back();
    }
}
