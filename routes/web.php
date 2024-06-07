<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\SupplierController;
use App\Http\Controllers\API\MedicineTypeController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/medicine', [MedicineController::class, 'populateDropdowns'])->name('plp');

Route::get('/medicine/{id}', function () {
    return view('pages.pdp');
})->name('pdp');