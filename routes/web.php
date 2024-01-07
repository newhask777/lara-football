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
    return redirect('predictions/today');
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

/*
 *  Backend requests to api
 */
Route::group(['prefix' => 'backend/predictions'], function() {
    Route::get('/today', \App\Http\Controllers\Back\Predictions\PredictionsTodayController::class)->name('back.index');
    Route::get('/date/{date}', \App\Http\Controllers\Back\Predictions\PredictionsByDateController::class)->name('back.date');
});


/*
 * Frontend requests today games
 */
Route::group(['prefix' => 'predictions'], function() {
    Route::get('/today', \App\Http\Controllers\Front\Predictions\Today\PredictionsTodayController::class)->name('predictions.today');
    Route::get('/today/{federation}', \App\Http\Controllers\Front\Predictions\Today\PredictionsByFederationToday::class)->name('predictions.today.federation');
    Route::get('/today/cluster/{country}', \App\Http\Controllers\Front\Predictions\Today\PredictionsByCountryToday::class)->name('predictions.today.country');
    Route::get('/today/league/{league}', \App\Http\Controllers\Front\Predictions\Today\PredictionsByLeagueToday::class)->name('predictions.today.league');
});


/*
 * Filter
 */
Route::group(['prefix' => 'filter'], function() {
    Route::get('/', \App\Http\Controllers\Front\FilterController::class)->name('predictions.filter');
});


/*
 * Frontend requests games by dates
 */
Route::group(['prefix' => '/predictions/date'], function() {
    Route::get('/{date}', \App\Http\Controllers\Front\Predictions\Date\PredictionsByDateController::class)->name('predictions.date');
    Route::get('/federation/{date}/{federation}', \App\Http\Controllers\Front\Predictions\Date\PredictionsByDateFederationController::class)->name('predictions.date.federation');
    Route::get('/country/{date}/{country}', \App\Http\Controllers\Front\Predictions\Date\PredictionsByDateCountryController::class)->name('predictions.date.country');
    Route::get('/league/{date}/{league}', \App\Http\Controllers\Front\Predictions\Date\PredictionsByDateLeagueController::class)->name('predictions.date.league');

});


