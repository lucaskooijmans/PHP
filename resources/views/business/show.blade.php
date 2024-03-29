<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>{{$user->name}}'s business page</title>
</head>
<body>
<x-nav/>
<main class="container">
    <section>
        <h2>Welcome to {{$user->name}}'s business page</h2>
        <p>{{$business->description}}</p>
        <img src="https://source.unsplash.com/random/400x300?company" alt="Business Picture" />
        @if($business->featuredAd)
            <p>{{$business->featuredAd->title}}</p>
            <img src="https://source.unsplash.com/random/300x200?product" alt="Featured Ad" />
            <p>Price: {{$business->featuredAd->price}}</p>
        @else
            <p>No featured advertisement available</p>
        @endif
        <br>
        @if(Auth::check() && $business->user_id == Auth::id())
            <a href="{{route('business.edit', $business)}}" role="button">Edit</a>
        @endif
    </section>
</main>
<x-footer/>
</body>
</html>
