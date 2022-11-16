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
        $post = Post::where("id", $request -> id )->first();
        $items = [
            'post_id' => $post->id,
            'user_id' => $post->user_id,
        ];
        Like::create($items);
        return response()->json([
            'data' => $items 
        ],201);
    }

    public function destroy(Like $like)
    {
        $item = Like::where('id', $like->id)->delete();
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
