<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('posts')->controller(PostController::class)->group(function () {
    
    Route::get('/public', 'getPublishedPosts');

    Route::prefix('my_posts')->group(function () {
        Route::get('/', 'getClientPosts');
        Route::post('/new_post', 'store');
        Route::put('/{post}', 'update');
        Route::delete('/{post}', 'delete');
    });
});
