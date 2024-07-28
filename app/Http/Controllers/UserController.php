<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\tags;
use App\Models\User;
use PHPUnit\Framework\Attributes\PostCondition;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // Pass any necessary data to the view
        return view('user.dashboard');
    }
}