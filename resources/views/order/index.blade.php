@php use Carbon\Carbon; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="{{ asset('css/orders.css')}}">
    <title>My orders</title>
</head>
<body>
<x-nav/>
<main class="container">
    <section>
        <h1>My orders</h1>

        <div class="orders-container">
            @forelse($orders as $order)
                <div class="order">
                    <h3>Order #{{$order->id}} | {{$order->ad->title}} | ({{$order->ad->adType->name}})</h3>
                    <p>Name: {{$order->name}}</p>
                    <p>Postal Code: {{$order->postalcode}}</p>
                    <p>City: {{$order->city}}</p>
                    <p>Street: {{$order->street}}</p>
                    <p>House Number: {{$order->house_number}}</p>
                    <p>Shipping Choice: {{$order->shippingMethod->name}}</p>
                    @if($order->ad->adType->name == 'Rent')
                        @if($order->shippingMethod->name == 'Pick Up')
                            <h4>Pick Up: {{Carbon::parse($order->start_date)->format('d-m-Y')}}</h4>
                        @endif
                        <h4>Bring Back: {{Carbon::parse($order->end_date)->format('d-m-Y')}}</h4>
                    @endif
                </div>
            @empty
                <p>You currently have no orders...</p>
            @endforelse
        </div>
    </section>
</main>
<x-footer/>
</body>
</html>
