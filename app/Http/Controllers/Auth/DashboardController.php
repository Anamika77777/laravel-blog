<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\tags;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\PostCondition;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $PostsCount = post::count();
        $TagsCount = tags::count();
        $CategoriesCount = category::count();
        $UsersCount = User::count();

        return view('user.dashboard', compact('PostsCount', 'TagsCount', 'CategoriesCount', 'UsersCount'));
    }
}
