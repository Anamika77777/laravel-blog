<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class comment extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','user_id','comment','name','email'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }


    public function commentReplies()
    {
      return $this->hasMany(comment_replies::class);
    }


    public function store(Request $request)
{
    $comment = new Comment();
    $comment->user_id = auth()->id();
    $comment->post_id = $request->post_id;
    $comment->comment = $request->comment;
    $comment->status = 'pending';
    $comment->save();

    return redirect()->back()->with('message', 'Your comment is awaiting approval.');
}

public function post()
{
    return $this->belongsTo(post::class);
}


}