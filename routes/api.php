<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\MedicineTypeController;
use App\Http\Controllers\API\SupplierController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('medicines', MedicineController::class);
Route::apiResource('medicineType', MedicineTypeController::class);
Route::apiResource('supplier', SupplierController::class);
