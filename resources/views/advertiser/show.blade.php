<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Advertiser Showcase</title>
</head>
<body>
<x-nav/>
<main class="container">
    <div class="grid">
        <section>
            <hgroup>
                <h2>Advertiser's Name Here</h2>
                <h3>Our Latest Advertisements</h3>
            </hgroup>
            <p>Welcome to our exclusive page where we showcase our innovative advertisements. Dive into our creative world.</p>
            <ul>
                @foreach($ads as $ad)
                    <li>
                        <h3>{{$ad->title}}</h3>
                        <p>{{$ad->description}}</p>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</main>
<a href={{route('ad.show', $ad)}}></a>
<footer class="container">
    <small>
        <a href="#privacy">Privacy Policy</a> • <a href="#terms">Terms & Conditions</a>
    </small>
</footer>
</body>
</html>
