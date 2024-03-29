<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My favorites</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="{{ asset('css/ads.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

<x-nav/>

<main class="container">
    <h1>My favorites</h1>

    <div class="row">
        @forelse($myFavorites as $myFavs)
            <div class="advertisement" onclick="location.href='{{ route('ad.show', $myFavs->id) }}';">
                <h3>{{ $myFavs->title }}</h3>
                <img src="https://picsum.photos/300/200" alt="Advertisement Image"/>
                <p><strong>Advertiser:</strong> {{ $myFavs->user->name }}</p>
                <p><strong>Description:</strong> {{ $myFavs->description }}</p>
                <p><strong>Price:</strong> {{ $myFavs->price }}</p>
                <p><strong>Category:</strong> {{ $myFavs->category->name }}</p>
                <p><strong>Type:</strong> {{ $myFavs->adType->name }}</p>
                <p id="expires-in-{{ $myFavs->id }}"></p>
            </div>
        @empty
            <p>You currently have no favorites...</p>
        @endforelse
    </div>
    <div class="clearfix"></div>
</main>

<x-footer/>

</body>
</html>
