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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout', 'logout');
});

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

// Carousel
Route::controller(CarouselItemsController::class)->group(function () {
    Route::get('/carousel', 'index'); // Read
    Route::get('/carousel/{id}', 'show'); // Read
    Route::post('/carousel', 'store'); // Create
    Route::put('/carousel/{id}', 'update'); // Update
    Route::delete('/carousel/{id}', 'destroy'); // Delete
});

// User
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index'); // Read
    Route::get('/user/{id}', 'show'); // Read
    Route::delete('/user/{id}', 'destroy'); // Delete
    Route::post('/user', 'store')->name('user.store'); // Create
    Route::put('/user/{id}', 'update')->name('user.update'); // Update Name
    Route::put('/user/email/{id}', 'email')->name('user.email'); // Update email
    Route::put('/user/password/{id}', 'password')->name('user.password'); // Update password
});

// Prompt
Route::controller(PromptController::class)->group(function () {
    Route::get('/prompt', 'index'); // Read
    Route::get('/prompt/{id}', 'show'); // Read
    Route::put('/prompt/{id}', 'update'); // Update Name
    Route::delete('/prompt/{id}', 'destroy'); // Delete
    Route::post('/prompt', 'store'); // Create
});
