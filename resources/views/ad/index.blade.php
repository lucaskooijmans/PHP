<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Marketplace Home</title>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>Marketplace</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.create')}}">Create Ad</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
        @if(!Auth::check())
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
        @else
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button role="button" type="submit">Log out</button>
                </form>
            </li>
        @endif
    </ul>
</nav>
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
                            <img src="https://source.unsplash.com/random/200x150" alt="Item Image" />
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
<footer class="container">
    <small>
        <a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a>
    </small>
</footer>
</body>
</html>



