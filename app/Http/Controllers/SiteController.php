<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class SiteController extends Controller
{
    public function index() {
        $categories = Category::get()->sortBy('category');
        $posts = Post::paginate(5)->sortBy('created_at');
        return view('layouts.welcome', compact('categories', 'posts'));
    }

}
