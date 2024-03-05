<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdType;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::all();
        return view('ad.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $types = AdType::all();
        return view('ad.create', compact('categories'), compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $ad = Ad::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'postalcode' => $request->postalcode,
            'user_id' => $user_id,
            'category_id' => Category::findOrFail($request->category)->id,
            'type_id' => AdType::findOrFail($request->type)->id,
        ]);
        return view('ad.show', compact('ad'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ad = Ad::findOrFail($id);
        return view('ad.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorFail(Auth::id());
        $ad = Ad::findOrFail($id);
        return view('ad.edit', compact('ad'), compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update($request->all());

        return redirect()->route('ad.index')->with('success', 'Ad has been updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
