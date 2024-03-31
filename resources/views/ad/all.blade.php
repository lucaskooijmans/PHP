<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Advertisements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="{{ asset('css/ads.css')}}">
</head>
<body>
<x-nav/>

<main class="container">
    <h1 id="all_ads">All advertisements</h1>

    <div class="row">
        @foreach($allAds as $ad)
            <div class="advertisement" onclick="location.href='{{ route('ad.show', $ad->id) }}';">
                <h3>{{ $ad->title }}</h3>
                <img src="https://picsum.photos/300/200" alt="Advertisement Image"/>
                <p><strong>Advertiser:</strong> {{ $ad->user->name }}</p>
                <p><strong>Description:</strong> {{ $ad->description }}</p>
                <p><strong>Price:</strong> {{ $ad->price }}</p>
                <p><strong>Category:</strong> {{ $ad->category->name }}</p>
                <p><strong>Type:</strong> {{ $ad->adType->name }}</p>
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
</main>

<x-footer/>
</body>
</html>
