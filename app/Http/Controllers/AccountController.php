<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        $business = $user->business()->first();
        return view('account.index', compact('user', 'business'));
    }
}