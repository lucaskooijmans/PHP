<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Ad Details</title>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>Ad Details</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}">Home</a></li>
        <li><a href="#">All Ads</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
    </ul>
</nav>
<main class="container">
    <section>
        <h2>{{$ad->title}}</h2>
        <p><strong>Description:</strong> {{$ad->description}}</p>
        <p><strong>Price:</strong> {{$ad->price}}</p>
        <p><strong>Category:</strong> {{$ad->category->name}}</p>
        <p><strong>Type:</strong> {{$ad->adType->name}}</p>
        <figure>
            <img src="https://source.unsplash.com/random/600x400?apartment" alt="Apartment Image" />
        </figure>
        @if($ad->user->id == Auth::id())
            <a href="{{route('ad.edit', $ad)}}" role="button">Edit</a>
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
