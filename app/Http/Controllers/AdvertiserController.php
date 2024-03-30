<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdvertiserController
{
    public function show(string $id)
    {
        $ads = User::findOrFail($id)->ads;
        return view('advertiser.show', compact('ads'));
    }
    public function favorite_advertiser(string $id)
    {
        $user = Auth::user();
        $user->favorite_advertisers()->attach($id);
        $ads = User::findOrFail($id)->ads;
        return view('advertiser.show', compact('ads'));
    }
    public function unfavorite_advertiser(string $id)
    {
        $user = Auth::user();
        $user->favorite_advertisers()->detach($id);
        $ads = User::findOrFail($id)->ads;
        return view('advertiser.show', compact('ads'));
    }
}