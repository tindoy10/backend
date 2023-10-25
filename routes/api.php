<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController; // Import controller
use App\Http\Controllers\Api\UserController; // Import Controller
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Carousel

Route::get('/carousel', [CarouselItemsController::class, 'index']); // Read
Route::get('/carousel/{id}', [CarouselItemsController::class, 'show']); // Read

Route::post('/carousel', [CarouselItemsController::class, 'store']); // Create
Route::put('/carousel/{id}', [CarouselItemsController::class, 'update']); // Update

Route::delete('/carousel/{id}', [CarouselItemsController::class, 'destroy']); // Delete

// User
Route::get('/user', [UserController::class, 'index']); // Read
Route::get('/user/{id}', [UserController::class, 'show']); // Read

Route::delete('/user/{id}', [UserController::class, 'destroy']); // Delete

Route::post('/user', [UserController::class, 'store'])->name('user.store'); // Create

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update'); // Update Name
Route::put('/user/email/{id}', [UserController::class, 'email'])->name('user.email'); // Update email
Route::put('/user/password/{id}', [UserController::class, 'password'])->name('user.password'); // Update password
