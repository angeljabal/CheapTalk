<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all()
    {   
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.home', compact('posts'));
    }

    public function byCategory(Category $category)
    {   
        $posts = Post::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('pages.category', compact('posts', 'category'));
    }

    public function byAuthor(User $author)
    {
        $posts = Post::where('user_id', $author->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('pages.author', compact('posts', 'author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('category');
        return view('pages.users.create-post', compact('categories'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   =>  'required',
            'post'          =>  'required|string|max:255'
        ]);
        Post::create($request->all());
        return back()->with('status', 'Post published successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
