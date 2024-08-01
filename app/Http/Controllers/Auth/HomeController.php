<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\post;

class HomeController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {

        $latestPosts = post::where('status','1')->latest()->limit(3)->get();

        return view('site.home', compact('latestPosts'));
    }
}