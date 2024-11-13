<?php

use Illuminate\Support\Facades\Route;
use Modules\Hospital\Http\Controllers\HospitalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('hospital.')->group([], function () {
    Route::get('hospital', [HospitalController::class, 'index'])->name('index');
});
