<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments')->paginate(20);
        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }
}
