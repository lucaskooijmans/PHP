<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Business Profile</title>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>Business Profile</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}">Home</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
    </ul>
</nav>
<main class="container">
    <section>
        <h2>{{$user->name}}</h2>
        <p>{{$business->description}}</p>
        <h3>Featured Ad</h3>
        <p>{{$business->featuredAd->title}}</p>
        <img src="https://source.unsplash.com/random/300x200?business" alt="Featured Ad" />
        <p>Price: {{$business->featuredAd->price}}</p>
        <img src="https://source.unsplash.com/random/400x300?company" alt="Business Picture" />
        <br>
        @if($business->featuredAd->user->id == Auth::id())
            <a href="{{route('business.edit', $business)}}" role="button">Edit</a>
        @endif
    </section>
</main>
<footer class="container">
    <small>
        <a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a>
    </small>
</footer>
</body>
</html>
