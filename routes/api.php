<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::apiResource('/v1/user', UserController::class)->only(['index']);
Route::apiResource('/v1/post', PostController::class)->only(['index', 'store', 'show', 'destroy']);
Route::apiResource('/v1/like', LikeController::class)->only(['store', 'destroy']);
Route::apiResource('/v1/comment', CommentController::class)->only(['store']);
