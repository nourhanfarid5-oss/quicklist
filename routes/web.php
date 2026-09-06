<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Listings
|--------------------------------------------------------------------------
*/

// Show all listings
Route::get('/listings', [ListingController::class, 'index'])
    ->name('listings.index');

// Create listing form
Route::get('/listings/create', [ListingController::class, 'create'])
    ->middleware('auth')
    ->name('listings.create');

// Store new listing
Route::post('/listings', [ListingController::class, 'store'])
    ->middleware('auth')
    ->name('listings.store');

// Show one listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])
    ->name('listings.show');

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
    ->middleware('auth')
    ->name('listings.edit');

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])
    ->middleware('auth')
    ->name('listings.update');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
    ->middleware('auth')
    ->name('listings.destroy');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

// Public profile
Route::get('/profile/{user}', [ProfileController::class, 'show'])
    ->name('profile.show');


/*
|--------------------------------------------------------------------------
| Temporary Test Route
|--------------------------------------------------------------------------
*/

// Temporary route to check logged-in user
Route::get('/test-user', function () {
    return [
        'authenticated' => auth()->check(),
        'user_id' => auth()->id(),
        'user_name' => auth()->user()?->name,
        'user_email' => auth()->user()?->email,
    ];
});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';