<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;

class AdvertiserController
{
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $ads = $user->ads;
        return view('advertiser.show', compact('ads'));
    }
}