<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function openTagsPage(){
        $tags = tags::all();

        return view('auth.tags.index', compact('tags'));
    }
}
