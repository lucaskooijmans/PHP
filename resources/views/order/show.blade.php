<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>View Order</title>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>View Order</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}">Home</a></li>
        <li><a href="#">All Orders</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
    </ul>
</nav>
<main class="container">
    <section>
        <form>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required disabled value="{{$order->name}}">
            <label for="city">City</label>
            <input type="text" id="city" name="city" required disabled value="{{$order->city}}">
            <label for="postalcode">Postalcode</label>
            <input type="text" id="postalcode" name="postalcode" required disabled value="{{$order->postalcode}}">
            <label for="housenumber">Housenumber</label>
            <input type="text" id="housenumber" name="housenumber" required disabled value="{{$order->house_number}}">
            <label for="street">Street</label>
            <input type="text" id="street" name="street" required disabled value="{{$order->street}}">
            <label for="shipping">Shipping</label>
            <select id="shipping" name="shipping" required disabled>
                @if($order->shipping_method_id == 1)
                    <option value="shipping" selected>Shipping</option>
                @else
                    <option value="pickup" selected>Pickup</option>
                @endif
            </select>
        </form>
    </section>
</main>
<footer class="container">
    <small>
        <a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a>
    </small>
</footer>
</body>
</html>
