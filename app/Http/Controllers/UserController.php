<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where("firebaseid", $request -> firebaseid )->first();
        $items = ['users' => $users];
        return response()->json([
        'data' => $items
        ], 200);
    }


    public function store(Request $request) {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "firebaseid" => $request->firebaseid
        ]);
        return response()->json(['message' => 'Successfully user create']);
    }

}

