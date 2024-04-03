<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
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

// Redirect root to ad index
Route::get('/', function () {
    return redirect()->route('ad.index');
});

// Dashboard route requiring authentication and email verification
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::resource('profile', ProfileController::class)->only(['edit', 'update', 'destroy']);
    Route::resource('business', BusinessController::class)->except('show');
    Route::get('/business/{slug}', [BusinessController::class, 'show'])->name('business.show');
    Route::get('/business/{slug}/export', [BusinessController::class, 'export'])->name('business.export');
    Route::get('/business/{slug}/upload', [BusinessController::class, 'uploadForm'])->name('business.uploadForm');
    Route::post('/business/{slug}/upload', [BusinessController::class, 'upload'])->name('business.upload');
    Route::resource('ad', AdController::class)->except('index', 'show');
    Route::post('/ad/{id}/favorite', [AdController::class, 'favorite'])->name('ad.favorite');
    Route::post('/ad/{id}/unfavorite', [AdController::class, 'unfavorite'])->name('ad.unfavorite');
    Route::get('/my-favorites', [AdController::class, 'myFavorites'])->name('ad.myFavorites');
    Route::get('/my-ads', [AdController::class, 'myAdvertisements'])->name('ad.my');
    Route::post('/ad-update-status/{id}', [AdController::class, 'updateExpiredStatus'])->name('ad.updateExpiredStatus');
    Route::resource('order', OrderController::class)->except('create');
    Route::get('/my-orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/my-advertiser-orders', [OrderController::class, 'advertiserOrders'])->name('order.advertiserOrders');
    Route::get('/ad/{id}/create-order', [OrderController::class, 'create'])->name('order.create');
    Route::resource('review', ReviewController::class)->except('create');
    Route::get('/ad/{id}/create-review', [ReviewController::class, 'create'])->name('review.create');
    Route::get('/account/{id}', [AccountController::class, 'index'])->name('account.index');
    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
        $user = $request->user();
        return view('account.index', compact('user'));
    })->name('token.create');
    Route::get('/advertiser/{id}', [AdvertiserController::class, 'show'])->name('advertiser.show');
    Route::post('/advertiser/{id}/favorite', [AdvertiserController::class, 'favorite_advertiser'])->name('advertiser.favorite');
    Route::post('/advertiser/{id}/unfavorite', [AdvertiserController::class, 'unfavorite_advertiser'])->name('advertiser.unfavorite');
    Route::get('/advertiser/list/{id}', [AdvertiserController::class, 'list'])->name('advertiser.list');
});

// Public routes
Route::get('/ad', [AdController::class, 'index'])->name('ad.index');
Route::get('/ad/{id}', [AdController::class, 'show'])->name('ad.show');
Route::get('/all-ads', [AdController::class, 'all'])->name('ad.all');

// Error handling
Route::fallback(function () {
    // Handle 404 errors or other fallback scenarios
    abort(404, 'Page not found');
});

require __DIR__ . '/auth.php';