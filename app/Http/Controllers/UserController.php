<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('firebase');
    }

    public function __invoke(Request $request): JsonResponse
    {
        $firebaseId = $request->firebaseId;
        $email = $request->email;
        var_dump($firebaseId);
        var_dump($email);

        $response = [
            'firebase_id' => $firebaseId,
            'email' => $email,
        ];

        var_dump($response);

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function store(Request $request) {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json(['message' => 'Successfully user create']);
    }

}

