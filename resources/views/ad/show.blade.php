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
        @if(Auth::check())
            @if(!auth()->user()->isAdvertiser())
                <div>
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
                </div>
            @endif
        @endif

        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(128)->generate('http://php.test/ad/' . $ad->id)) !!} ">
        <h2>{{$ad->title}}</h2>
        <p><strong>Advertiser:</strong> {{ $ad->user->name }}
            <br>
            @if(Auth::check() && $ad->user->isBusiness())
                <a href="{{route('business.show', $business)}}" role="button">Go to my business page!</a>
            @endif
        </p>
        <p><strong>Description:</strong> {{$ad->description}}</p>
        <p><strong>Price:</strong> {{$ad->price}}</p>
        <p><strong>Category:</strong> {{$ad->category->name}}</p>
        <p><strong>Type:</strong> {{$ad->adType->name}}</p>
        <figure>
            <img src="https://picsum.photos/300/200" alt="Apartment Image" />
        </figure>
        <ul>
            @if(!$ad->reviews->where('writer_user_id', '===', Auth::id())->count() > 0)
                <a href="{{route('review.create', $ad->id)}}" role="button">Leave a review</a>
            @endif
                @foreach($ad->reviews as $review)
                    <li>
                        <article class="column" style="padding:20px;">
                            <h4>{{$review->title}}</h4>
                            <p>{{$review->description}}</p>
                            <h5>Score: {{$review->score}}</h5>
                            <p>By {{$review->writer->name}}</p>
                        </article>
                    </li>
                @endforeach

        </ul>
        @if($ad->user->id == Auth::id())
            <a href="{{route('ad.edit', $ad)}}" role="button">Edit</a>
        @else
            @if($ad->adType->id === 1)
                <a href="{{route('order.create', $ad->id)}}" role="button">Buy</a>
            @else
                <a href="{{route('order.create', $ad->id)}}" role="button">Rent</a>
            @endif
        @endif
    </section>
</main>
<x-footer/>
</body>
</html>
