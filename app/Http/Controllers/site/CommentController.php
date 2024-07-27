<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Request $request, $postId){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:2000',
        ]);

        




        comment::create([
           'post_id' => $postId,
           'user_id'=> auth()->id(),
           'comment'=>$request->comment,
        ]);

        
    }


}
