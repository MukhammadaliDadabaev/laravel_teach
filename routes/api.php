<?php

use App\Http\Controllers\API\PostApiController;
use App\Http\Controllers\PageController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('posts', function () {
//     // Cache::flush();
//     // $posts = Cache::remember('posts', 120, function () {
//     //     return Post::latest()->paginate(270);
//     // });

//     // return $posts;
// });

// Route::get('posts', [PostApiController::class, 'index']);
// Route::get('posts/{post}', [PostApiController::class, 'show']);

Route::apiResource('posts', PostApiController::class);
