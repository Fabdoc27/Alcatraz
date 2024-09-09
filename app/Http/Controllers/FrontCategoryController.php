<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Category $category)
    {
        $posts = $category->posts()->with('user', 'category')->latest()->paginate(10);
        $categories = Category::withCount('posts')->latest()->get();

        return view('blog.index', compact('posts', 'categories'));
    }
}
