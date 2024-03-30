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
                <h2>{{$ads->first()->user->name}}</h2>
                <h3>Our Latest Advertisements</h3>
            </hgroup>
            <p>Welcome to our exclusive page where we showcase our innovative advertisements. Dive into our creative world.</p>
            <ul>
                @foreach($ads as $ad)
                    <li>
                        <h3>{{$ad->title}}</h3>
                        <p>{{$ad->description}}</p>
                    </li>
                    <a href={{route('ad.show', $ad)}}>Ad Details</a>
                @endforeach
            </ul>
            <div>
                @if(auth()->check() && Auth::user()->favorite_advertisers()->where('favorite_advertiser_id', Auth::user()->id)->exists())
                    <form action="{{ route('advertiser.unfavorite', $ad->user->id) }}" method="post">
                        @csrf
                        <input type="image" alt="unfavorite" src="/images/star-solid.svg" />
                    </form>
                @else
                    <form action="{{ route('advertiser.favorite', $ad->user->id) }}" method="post">
                        @csrf
                        <input type="image" alt="favorite" src="/images/star-regular.svg" />
                    </form>
                @endif
            </div>
        </section>
    </div>
</main>
<footer class="container">
    <small>
        <a href="#privacy">Privacy Policy</a> • <a href="#terms">Terms & Conditions</a>
    </small>
</footer>
</body>
</html>
