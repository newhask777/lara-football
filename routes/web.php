<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/backend/predictions/today', \App\Http\Controllers\Back\Predictions\PredictionsTodayController::class)->name('back.index');
Route::get('/backend/predictions/date/{date}', \App\Http\Controllers\Back\Predictions\PredictionsByDateController::class)->name('back.date');



Route::get('/predictions/today', \App\Http\Controllers\Front\Predictions\PredictionsTodayController::class)->name('predictions.today');
Route::get('/predictions/today/{federation}', \App\Http\Controllers\Front\Predictions\PredictionsByFederationToday::class)->name('predictions.today.federation');
Route::get('/predictions/today/cluster/{country}', \App\Http\Controllers\Front\Predictions\PredictionsByCountryToday::class)->name('predictions.today.country');


Route::get('/predictions/date/{date}', \App\Http\Controllers\Front\Predictions\PredictionsByDateController::class)->name('predictions.date');


