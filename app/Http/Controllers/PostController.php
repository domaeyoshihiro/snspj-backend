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
        $posts = Post::with('user', 'likes.user', 'comments.user')->get();
        $items = ['posts' => $posts];

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
        $posts = Post::with('user', 'likes.user', 'comments.user')->find($post);

        $items = [
            'posts' => $posts
        ];
        if ($items) {
            return response()->json([
                'data' => $items
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    public function destroy(Post $post)
    {
        $item = Comment::where("post_id", $post->id )->delete();
        $item = Like::where("post_id", $post->id )->delete();
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
