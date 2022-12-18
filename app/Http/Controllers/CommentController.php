<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // 1-usul
        $comments = Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back();

        // // 2-usul
        // $post = Post::find($request->post_id);
        // $post->comments()->create([
        //     'body' => $request->body,
        //     'user_id' => $request->user_id,
        // ]);

    }
}
