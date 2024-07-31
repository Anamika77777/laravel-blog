<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        
        $blogs = post::where('status','=','1')->get();
        
        $comments = comment::all();
        return view('site.index', compact('blogs', 'comments'));
    }


    public function singleBlog($id){
       
        $blog = post::find($id);
         
        if(! $blog){
            abort(404);
        }

        $comments = comment::where('post_id', $blog->id)->get();

        $latestPosts = post::where('status','1')->latest()->get();
        $postTags = $blog->tags;

        return view('site.single', compact('blog','comments','latestPosts','postTags'));


       
    }

   
}
