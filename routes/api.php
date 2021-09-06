<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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



Route::post('register',[
    \App\Http\Controllers\AuthController::class,
    'register'
]);

Route::post('login',[
    \App\Http\Controllers\AuthController::class,
    'login'
]);

Route::get('alluser',[
    \App\Http\Controllers\AuthController::class,
    'alluser'
]);


// Route::get('login',App\Http\Controllers\Auth\LoginController::class,'login');



// Route::middleware('auth:sanctum')->group(function (){
//     Route::get('user',[
//         \App\Http\Controllers\AuthController::class,
//         'user'
//     ]);
//     Route::post('logout',[
//         \App\Http\Controllers\AuthController::class,
//         'logout'
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('admin')->group(function(){
//     Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
//     Route::post('/logout', [LoginController::class, 'logout']);

// });



Route::resource('/category','CategoryController');
Route::resource('/post','PostController');