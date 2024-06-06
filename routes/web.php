<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MedicineController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/medicine', function () {
    return view('pages.plp');
})->name('plp');

Route::get('/medicine/{id}', function () {
    return view('pages.pdp');
})->name('pdp');