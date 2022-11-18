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
        $items = [
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
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

    public function count(Request $request)
    {
        $posts = Like::where("post_id", $request -> post_id )->get()->count();
        $items = ['posts' => $posts];
        return response()->json([
        'data' => $items
        ], 200);
    }
}
