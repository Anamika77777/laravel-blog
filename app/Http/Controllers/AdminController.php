<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\tags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
       
        public function dashboard()
    {
        $PostsCount = post::count();
        $TagsCount = tags::count();
        $CategoriesCount = category::count();
        $UsersCount = User::count();

        return view('admin.dashboard', compact('PostsCount', 'TagsCount', 'CategoriesCount', 'UsersCount'));
    }
        
}