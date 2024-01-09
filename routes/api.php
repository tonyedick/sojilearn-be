<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BlogController;

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

Route::get('/', function () {
    return response(
        "Welcome to Sojilearn API",
        200
    );
});

Route::get('/blogs', [BlogController::class, 'index']);

Route::get('/blogs/featured', [BlogController::class, 'getFeaturedBlogs']);

Route::get('/blogs/{id}', [BlogController::class, 'getBlogById']);

Route::get('/categories', [BlogController::class, 'getAllCategories']);

Route::post('/contactus', [ContactUsController::class, 'contactUs']);

Route::post('/comment', [CommentController::class, 'postComment']);
