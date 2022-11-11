<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $user = User::all();
        $likes = Like::all();
        $comments = Comment::all();
        $items = ['posts' => $posts, 'user' => $user, 'likes' => $likes, 'comments' => $comments];

        return response()->json([
        'data' => $items
        ], 200);
    }

    public function store(Request $request)
    {
        $firebaseid = User::where("firebaseid", $request -> firebaseid )->first();

        $items = [
            'content' => $request->content,
            'user_id' => $firebaseid->id,
        ];
        Post::create($items);
        
        return response()->json([
        'data' => $items
        ], 201);
    }

    public function show(Post $post)
    {
        $posts = Post::find($post);

        $items = [
            'posts' => $posts
        ];

        if ($items) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    public function destroy(Post $post)
    {
        $item = Post::where('id', $post->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
