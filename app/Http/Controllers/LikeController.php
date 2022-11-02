<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $post = Post::find($id);
        $post->users()->attach($user->id());
        $count = $post->users()->count();
        return response()->json([
            'count' => $count, 
        ]);
    }

    public function destroy(Like $like)
    {
        $post = Post::find($id);
        $post->users()->detach($user->id());
        $count = $post->users()->count();
        return response()->json([
            'count' => $count, 
        ]);
    }

    public function count ($id)
    {
        $post = Post::find($id);
        $count = $post->users()->count();
        return response()->json($count);
    }
}
