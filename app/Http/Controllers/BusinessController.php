<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
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
            'description' => $request->description,
            'featured_ad' => $request->featured_ad,
            'user_id' => Auth::id(),
        ]);
        return view('business.show', compact('business'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail(Auth::id());
        $business = Business::findOrFail($id);
        return view('business.show', compact('business', 'user'));
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

    public function export(Business $business)
    {
        // Load the HTML content
        $html = view('business.pdf', compact('business'))->render();

        // Set options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (inline or attachment)
        return $dompdf->stream($business->user->name . '_business.pdf');
    }
}
