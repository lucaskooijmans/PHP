<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::findorFail(Auth::id());
        $ads = $user->ads()->get();
        return view('business.create', compact('ads'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $business = Business::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'featured_ad' => $request->featured_ad,
            'user_id' => Auth::id(),
        ]);
        return view('business.show', compact('business'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $business = Business::where('slug', $slug)->firstOrFail();
        return view('business.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorFail(Auth::id());
        $ads = $user->ads()->get();
        $business = Business::findOrFail($id);
        return view('business.edit', compact('business'), compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $business = Business::findOrFail($id);
        $business->update($request->all());
        return view('business.show', compact('business'))->with('success', 'Business has been updated succesfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
