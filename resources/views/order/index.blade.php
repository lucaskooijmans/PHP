<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>View Orders</title>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>View Orders</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}">Home</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
    </ul>
</nav>
<main class="container">
    <section>
        <h2>Your Orders</h2>
        @foreach($orders as $order)
            <div style="border-bottom: 1px solid #ccc; margin-bottom: 20px;">
                <h3>Order #{{$order->id}}</h3>
                <p>Name: {{$order->name}}</p>
                <p>Postal Code: {{$order->postalcode}}</p>
                <p>City: {{$order->city}}</p>
                <p>Street: {{$order->street}}</p>
                <p>House Number: {{$order->house_number}}</p>
                <p>Shipping Choice: {{$order->shippingMethod->name}}</p>
            </div>
        @endforeach
    </section>
</main>
<footer class="container">
    <small>
        <a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a>
    </small>
</footer>
</body>
</html>
