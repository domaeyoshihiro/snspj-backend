<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $items = [
            'comment' => $request->comment,
            'user_id' => User::id();
            'post_id' => Post::id();
        ];
        Post::create($items);

        return response()->json([
        'data' => $items
        ], 201);
    }
}
