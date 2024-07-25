<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function openCategoriesPage(){
        $categories = category::all();

        return view('auth.categories.index', compact('categories'));
    }
}
