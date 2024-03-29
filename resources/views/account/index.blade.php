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
                <h2>Welcome to Your Account</h2>
                <h3>Your Details</h3>
            </hgroup>
            <p>Here you can view and manage your account details.</p>
            <figure>
                <img src="https://unsplash.it/400/300" alt="Account Details Image" />
                <figcaption><a href="https://unsplash.it" target="_blank">Image Source</a></figcaption>
            </figure>
            <h3>Name</h3>
            <p>{{$user->name}}</p>
            <h3>Email</h3>
            <p>{{$user->email}}</p>
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
