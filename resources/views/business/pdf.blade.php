<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<main class="container">
    <section>
        <h1>----- CONTRACT -----</h1>
        <h2>{{$business->name}}</h2>
        <h2>{{$business->user->name}}'s business</h2>
        <p>{{$business->description}}</p>
{{--        <img src="https://source.unsplash.com/random/400x300?company" alt="Business Picture" />--}}
        <h3>Featured advertisement</h3>
        @if($business->featuredAd)
            <p><strong>Title:</strong> {{$business->featuredAd->title}}</p>
{{--            <img src="https://source.unsplash.com/random/300x200?product" alt="Featured Ad" />--}}
            <p><strong>Price:</strong> {{$business->featuredAd->price}}</p>
        @else
            <p>No featured advertisement available</p>
        @endif

        <h2>Signature:</h2>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h2>Date:</h2>
    </section>
</main>
</body>
</html>