<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Account Details</title>
</head>
<body>
<x-nav/>
<main class="container">
    <div class="grid">
        <section>
            <hgroup>
                <h2>Welcome to your profile</h2>
                <h3>Your Details</h3>
            </hgroup>
            <figure>
                <img src="https://placebeard.it/320/240" alt="Account Details Image">
            </figure>
            <p><strong>Name:</strong> {{$user->name}}</p>
            <p><strong>Email:</strong> {{$user->email}}</p>

            @if(Auth::check() && auth()->user()->isBusiness())
                <a href="{{route('business.show', $business)}}">Go to my business page</a>
            @endif

        </section>
        @if($user->tokens->count() > 0)
            <label for="api_key">API Key</label>
            <input type="text" for="api_key" disabled name="api_key" value="{{$user->tokens->first->token->token}}">
        @else
            <form method="POST" action="{{route('token.create')}}">
                @csrf
                <label for="api_key">API Key</label>
                <input type="hidden" for="user_id" name="token_name" value="{{$user->id}}">
                <input type="text" for="api_key" disabled name="api_key">
                <button type="submit">Create Token</button>
        @endif
    </div>
</main>
<footer class="container">
    <small><a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a></small>
</footer>
</body>
</html>
