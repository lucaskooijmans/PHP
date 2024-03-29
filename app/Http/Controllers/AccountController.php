<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        return view('account.index', compact('user'));
    }
}