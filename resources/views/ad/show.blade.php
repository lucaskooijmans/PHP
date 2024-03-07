<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Ad Details</title>
</head>
<body>
<x-nav/>
<main class="container">
    <section>
        @if(auth()->check() && auth()->user()->favorites->contains($ad->id))
            <form action="{{ route('ad.unfavorite', $ad->id) }}" method="post">
                @csrf
                <input type="image" alt="unfavorite" src="/images/star-solid.svg" />
            </form>
        @else
            <form action="{{ route('ad.favorite', $ad->id) }}" method="post">
                @csrf
                <input type="image" alt="favorite" src="/images/star-regular.svg" />
            </form>
        @endif
        <h2>{{$ad->title}}</h2>
        <p><strong>Description:</strong> {{$ad->description}}</p>
        <p><strong>Price:</strong> {{$ad->price}}</p>
        <p><strong>Category:</strong> {{$ad->category->name}}</p>
        <p><strong>Type:</strong> {{$ad->adType->name}}</p>
        <figure>
            <img src="https://picsum.photos/300/200" alt="Apartment Image" />
        </figure>
        @if($ad->user->id == Auth::id())
            <a href="{{route('ad.edit', $ad)}}" role="button">Edit</a>
        @endif
    </section>
</main>
<x-footer/>
</body>
</html>
