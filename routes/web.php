<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = [];
    if(auth()->check()) {
        $posts = auth()->user()->usersPosts()->latest()->get();
    }
    //$posts = Post::where('user_id', auth()->id())->get();
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Blog posts related routes
Route::post('/create-post', [PostsController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostsController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostsController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostsController::class, 'deletePost']);