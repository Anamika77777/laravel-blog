<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\comment_replies;
use App\Models\post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Request $request, $postId){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:2000',
        ]);

        


        if(auth()->check()){
            $post = post::find($postId);

            if(! $post){
                return back()->withErrors('unable to find the post, please refresh the webpage and try again');
            }

        comment::create([
           'post_id' => $postId,
           'user_id'=> auth()->id(),
           'comment'=>$request->comment,
        ]);

        $request->session()->flash('alert-success', 'Comment added successfully');
    }
    return back();


}

}
