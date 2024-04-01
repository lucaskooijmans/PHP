<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LanguageController;
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
    Route::resource('business', BusinessController::class)->except('show');
    Route::get('/business/{slug}', [BusinessController::class, 'show'])->name('business.show');
    Route::get('/business/{slug}/export', [BusinessController::class, 'export'])->name('business.export');
    Route::get('/business/{slug}/upload', [BusinessController::class, 'uploadForm'])->name('business.uploadForm');
    Route::post('/business/{slug}/upload', [BusinessController::class, 'upload'])->name('business.upload');
    Route::post('/ad/{id}/favorite', [AdController::class, 'favorite'])->name('ad.favorite');
    Route::post('/ad/{id}/unfavorite', [AdController::class, 'unfavorite'])->name('ad.unfavorite');
    Route::get('/my-favorites', [AdController::class, 'myFavorites'])->name('ad.myFavorites');
    Route::resource('order', OrderController::class)->except('create');
    Route::get('/ad/{id}/create-order', [OrderController::class, 'create'])->name('order.create');
    Route::resource('review', ReviewController::class)->except('create');
    Route::get('/ad/{id}/create-review', [ReviewController::class, 'create'])->name('review.create');
    Route::get('/my-ads', [AdController::class, 'myAdvertisements'])->name('ad.my');
    Route::post('/ad-update-status/{id}', [AdController::class, 'updateExpiredStatus'])->name('ad.updateExpiredStatus');
    Route::get('/account/{id}', [AccountController::class, 'index'])->name('account.index');
    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
        $user = $request->user();
        return view('account.index', compact('user'));
    })->name('token.create');
    Route::get('/my-orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/my-advertiser-orders', [OrderController::class, 'advertiserOrders'])->name('order.advertiserOrders');
    Route::get('/advertiser/{id}', [AdvertiserController::class, 'show'])->name('advertiser.show');
    Route::post('/advertiser/{id}/favorite', [AdvertiserController::class, 'favorite_advertiser'])->name('advertiser.favorite');
    Route::post('/advertiser/{id}/unfavorite', [AdvertiserController::class, 'unfavorite_advertiser'])->name('advertiser.unfavorite');
    Route::get('/advertiser/list/{id}', [AdvertiserController::class, 'list'])->name('advertiser.list');
});

// Everyone can see these pages
Route::get('/ad', [AdController::class, 'index'])->name('ad.index');
Route::get('/ad/{id}', [AdController::class, 'show'])->name('ad.show');
Route::get('/all-ads', [AdController::class, 'all'])->name('ad.all');
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');



require __DIR__.'/auth.php';
