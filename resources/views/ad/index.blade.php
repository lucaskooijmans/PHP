<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Marketplace Home</title>
</head>
<body>
<x-nav/>
<main class="container">
    <div class="grid">
        <section>
            <hgroup>
                <h2>Welcome to Marketplace</h2>
                <h3>Your one-stop shop for buying and selling!</h3>
            </hgroup>
            <p>Discover the latest advertisements from people and businesses. Find everything you need or post your own ad with ease.</p>
            <h3>Latest Advertisements</h3>
            <div class="grid">
                @foreach($ads as $ad)
                    <a href="{{route('ad.show', $ad)}}">
                        <article class="column" style="padding:20px;">
                            <h4>{{$ad->title}}</h4>
                            <img src="https://picsum.photos/300/200" alt="Item Image" />
                            <p>{{$ad->price}}</p>
                        </article>
                    </a>
                @endforeach
            </div>
            <h3>Post Your Advertisement</h3>
            <p>Reach a wide audience by posting your advertisement today. It's simple and fast!</p>
            <a href="{{route('ad.create')}}">
                <button>Create Ad</button>
            </a>
        </section>
    </div>
</main>
<x-footer/>
</body>
</html>



