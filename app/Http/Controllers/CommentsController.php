<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index($id)
    {
        $comments = Comment::where('post_id', $id)->orderBy('id', 'desc')->get();
        return view('templates.comments', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'comment' => 'required'
            ],
            [
                'comment.required' => 'Please give comment'
            ]
        );

        $comment = Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post_id
        ]);

        return $comment;
    }
}
