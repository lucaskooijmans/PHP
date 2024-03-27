@php use Carbon\Carbon; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Create Order</title>
</head>
<body>
<x-nav/>
<main class="container">
    <h1>Create order</h1>
    <section>
        <h1>{{$ad->title}}</h1>
        <form method="POST" action="{{route('order.store')}}">
            @csrf
            <input type="hidden" id="ad_id" name="ad_id" value="{{$ad->id}}">
            <label for="name">Name</label>
            <input value="{{ auth()->user()->name }}" type="text" id="name" name="name" required>
            <label for="city">City</label>
            <input type="text" id="city" name="city" required>
            <label for="postalcode">Postalcode</label>
            <input type="text" id="postalcode" name="postalcode" required>
            <label for="housenumber">Housenumber</label>
            <input type="text" id="house_number" name="house_number" required>
            <label for="street">Street</label>
            <input type="text" id="street" name="street" required>
            <label for="shipping">Shipping</label>
            <select id="shipping_method_id" name="shipping_method_id" required>
                @foreach($shippingMethods as $shippingMethod)
                    <option value="{{$shippingMethod->id}}">{{$shippingMethod->name}}</option>
                @endforeach
            </select>
            @if($ad->adType->id === 2)
                <label for="start_date">Start date</label>
                <input value="{{Carbon::now()->toDateString()}}" type="date" id="start_date" name="start_date" required>
                <label for="end_date">End date</label>
                <input value="{{Carbon::now()->addDay()->toDateString()}}" type="date" id="end_date" name="end_date" required>
            @endif
            <button type="submit">Submit Order</button>
        </form>
    </section>
</main>
<x-footer/>
</body>
</html>
