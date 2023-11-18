<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController; // Import controller
use App\Http\Controllers\Api\UserController; // Import Controller
use App\Http\Controllers\Api\PromptController; // Import Controller
use Illuminate\Facades\Hash; // Import Hash

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

// Public APIs
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user',  [UserController::class, 'store'])->name('user.store'); 

// Private APIs
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Carousel
    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/carousel',             'index'); 
        Route::get('/carousel/{id}',        'show'); 
        Route::post('/carousel',            'store'); 
        Route::put('/carousel/{id}',        'update'); 
        Route::delete('/carousel/{id}',     'destroy');
    });

    // User
    Route::controller(UserController::class)->group(function () {
        Route::get('/user',                 'index');
        Route::get('/user/{id}',            'show');
        Route::delete('/user/{id}',         'destroy'); 
        Route::put('/user/{id}',            'update')->name('user.update'); 
        Route::put('/user/email/{id}',      'email')->name('user.email'); 
        Route::put('/user/password/{id}',   'password')->name('user.password'); 
    });
});

// Prompt
Route::controller(PromptController::class)->group(function () {
    Route::get('/prompt',           'index');
    Route::get('/prompt/{id}',      'show'); 
    Route::put('/prompt/{id}',      'update');
    Route::delete('/prompt/{id}',   'destroy'); 
    Route::post('/prompt',          'store'); 
});
