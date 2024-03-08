<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $ad = Ad::findOrFail($id);
        return view('review.create', compact('ad'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $writer = Auth::id();
        $ad = Ad::findOrFail($request->ad_id);
        $review = Review::create([
            'title' => $request->title,
            'description' => $request->description,
            'score' => $request->score,
            'writer_user_id' => $writer,
            'reciever_user_id' => $ad->user->id,
            'ad_id' => $request->ad_id,
        ]);

        return Redirect::route('ad.show', $ad->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
