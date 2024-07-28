<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\comment_replies;
use Illuminate\Http\Request;

class ReplyCommentController extends Controller
{
    public function postReply(Request $request, $commentId)
    {
        {
            $request->validate([
                'comment' => 'required|string|max:2000',
            ]);
        
            $comment = $request->comment;
            $userId = auth()->id();
        
            comment_replies::create([
                'comment_id' => $commentId,
                'user_id' => $userId,
                'comment' => $comment,
            ]);
        
            $request->session()->flash('alert-success', 'Comment reply added successfully');
            return back();
        }
    
    }
}
