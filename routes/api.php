<?php

use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('customer', CustomerController::class);
Route::apiResource('address', AddressController::class);

// Route::get('/customer', [CustomerController::class, 'index']);
// Route::get('/customer/{id}', [CustomerController::class, 'show']);
// Route::post('/customer', [CustomerController::class, 'store']);
// Route::patch('/customer/{id}', [CustomerController::class, 'update']);
// Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);

// Route::post('/address', [AddressController::class, 'store']);
// Route::patch('/address/{id}', [AddressController::class, 'update']);
// Route::delete('/address/{id}', [AddressController::class, 'destroy']);

