<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>{{$business->user->name}}'s business page</title>
</head>
<body>
<x-nav/>
<main class="container">
    <section>
        <h1>{{$business->name}}</h1>
        <h2>Welcome to {{$business->user->name}}'s business page</h2>
        <p>{{$business->description}}</p>
        <img src="https://source.unsplash.com/random/400x300?company" alt="Business Picture" />
        <h3>Featured advertisement</h3>
        @if($business->featuredAd)
            <p><strong>Title:</strong> {{$business->featuredAd->title}}</p>
            <img src="https://source.unsplash.com/random/300x200?product" alt="Featured Ad" />
            <p><strong>Price:</strong> {{$business->featuredAd->price}}</p>
        @else
            <p>No featured advertisement available</p>
        @endif
        <br>
        @if(Auth::check() && $business->user_id == Auth::id())
            <a href="{{route('business.edit', $business)}}" role="button">Edit</a>

            {{-- Only business can see contract--}}
            @if($business->pdf_path)
                <h3>Contract</h3>
                <p><a href="{{ asset('storage/' . $business->pdf_path) }}" target="_blank">Download</a></p>
            @endif
        @endif

        @if(Auth::check() && auth()->user()->isOwner())
            <a href="{{ route('business.export', $business->slug) }}" role="button">Export to PDF</a>
            <br>
            <br>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form action="{{ route('business.upload', $business->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="pdf_file">
                <button type="submit">Upload</button>
            </form>

        @endif

    </section>
</main>
<x-footer/>
</body>
</html>
