<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
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

// Public routes
Route::post('/register',[AuthController::class , 'register']);
Route::post('/login',[AuthController::class , 'login']);
Route::get('/posts',[PostController::class , 'index']);
Route::get('/posts/{id}',[PostController::class , 'show']);
Route::get('/posts/search/{title}',[PostController::class , 'search']);

// Protected routes
Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::post('/posts',[PostController::class , 'store']);
    Route::put('/posts/{id}',[PostController::class , 'update']);
    Route::delete('/posts/{id}',[PostController::class , 'destroy']);
    Route::post('/logout',[AuthController::class , 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
