<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;

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
    return redirect()->route('ad.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User must be logged in to use these pages
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('ad', AdController::class)->except('index', 'show');
    Route::resource('business', BusinessController::class);
    Route::post('/ad/{id}/favorite', [AdController::class, 'favorite'])->name('ad.favorite');
    Route::post('/ad/{id}/unfavorite', [AdController::class, 'unfavorite'])->name('ad.unfavorite');
    Route::resource('order', OrderController::class)->except('create');
    Route::get('/ad/{id}/create-order', [OrderController::class, 'create'])->name('order.create');
    Route::resource('review', ReviewController::class)->except('create');
    Route::get('/ad/{id}/create-review', [ReviewController::class, 'create'])->name('review.create');
    Route::get('/my-ads', [AdController::class, 'myAdvertisements'])->name('ad.my');
    Route::post('/ad-update-status/{id}', [AdController::class, 'updateExpiredStatus'])->name('ad.updateExpiredStatus');
    Route::get('/account/{id}', [AccountController::class, 'index'])->name('account.index');
    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
    })->name('token.create');
});

// Everyone can see these pages
Route::get('/ad', [AdController::class, 'index'])->name('ad.index');
Route::get('/ad/{id}', [AdController::class, 'show'])->name('ad.show');
Route::get('/all-ads', [AdController::class, 'all'])->name('ad.all');



require __DIR__.'/auth.php';
