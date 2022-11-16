<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::apiResource('/user', UserController::class)->only(['store']);
Route::apiResource('/post', PostController::class)->only(['index', 'store', 'show']);
Route::post('/post/destroy/{post}', [PostController::class, 'destroy']);
Route::apiResource('/like', LikeController::class)->only(['store']);
Route::post('/like/destroy/{like}', [LikeController::class, 'destroy']);
Route::apiResource('/comment', CommentController::class)->only(['store']);
