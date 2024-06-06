<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\MedicineTypeController;
use App\Http\Controllers\API\SupplierController;

Route::prefix('user')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
});


Route::resource('medicines', MedicineController::class, [
    'only' => [
        'index',
        'show'
    ]
]);

Route::resource('medicines', MedicineController::class, [
    'except' => [
        'index',
        'show'
    ]
])->middleware(['auth:api']);

Route::apiResource('medicineType', MedicineTypeController::class);
Route::apiResource('supplier', SupplierController::class);
