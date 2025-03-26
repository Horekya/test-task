<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/resources', [ProductController::class, 'store']);
Route::get('/resources', [ProductController::class, 'index']);

Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/resources/{id}/bookings', [BookingController::class, 'show']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
