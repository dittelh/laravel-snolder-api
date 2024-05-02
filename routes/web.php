<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandyController;

Route::get('/', function () {
    return view('welcome');
});

// Display a listing of the candies
Route::get('/candies', [CandyController::class, 'index']);

// Create a new candy
Route::post('/candies', [CandyController::class, 'store']);

// Display the specified candy
Route::get('/candies/{id}', [CandyController::class, 'show']);

// Update the specified candy
Route::put('/candies/{id}', [CandyController::class, 'update']);

// Remove the specified candy from storage
Route::delete('/candies/{id}', [CandyController::class, 'destroy']);
