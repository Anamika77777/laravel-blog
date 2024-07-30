<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function openCategoriesPage()
    {
        // Fetch all categories
        $categories = Category::all();

        // Return the view with the categories data
        return view('admin.categories.index', compact('categories'));
    }
}
