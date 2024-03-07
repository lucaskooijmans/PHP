<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Order;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        $shippingMethods = ShippingMethod::all();
        return view('order.create', compact('shippingMethods', 'ad'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();

        $order = Order::create([
            'name' => $request->name,
            'user_id' => $userId,
            'ad_id' => $request->ad_id,
            'postalcode' => $request->postalcode,
            'house_number' => $request->house_number,
            'street' => $request->street,
            'city' => $request->city,
            'shipping_method_id' => $request->shipping_method_id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
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
