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
    public function index() // User (not advertiser) -> My Orders
    {
        $orders = Order::where('user_id', Auth::id())->paginate(3); // Paginate orders

        return view('order.index', compact('orders'));
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
            'start_date' =>$request->start_date,
            'end_date' => $request->end_date,
            'house_number' => $request->house_number,
            'street' => $request->street,
            'city' => $request->city,
            'shipping_method_id' => $request->shipping_method_id,
        ]);
        return view('order.show', compact('order'));
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

    public function advertiserOrders()
    {
        $advertiserId = auth()->id();
        $orders = Order::whereHas('ad', function ($query) use ($advertiserId) {
            $query->where('user_id', $advertiserId);
        })->paginate(3); // Paginate orders

        return view('order.advertiser_orders', compact('orders'));
    }
}
