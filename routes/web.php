<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\LocationController;
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
Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth')->group(function () {
    //===== Profile settings
    Route::get('/podesavanja', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/podesavanja', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/podesavanja', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //===== Create listing
    Route::view('/postavi-oglas', 'listing.create.listingType')->name('listing.type');

    Route::controller(ListingController::class)->name('listing.')->group(function () {
        Route::get('/postavi-oglas/detalji-nekretnine', 'displayForm')->name('form');
        Route::post('/kreiraj-oglas', 'createListing')->name('create');
    });
});

Route::get('/locations/{input}', [LocationController::class, 'getLocations']);

require __DIR__.'/auth.php';
