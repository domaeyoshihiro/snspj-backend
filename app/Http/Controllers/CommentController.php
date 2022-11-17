<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $items = [
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ];
        Post::create($items);

        return response()->json([
        'data' => $items
        ], 201);
    }
}
