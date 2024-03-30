<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Favorite Advertisers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>

<x-nav/>

<main class="container">
    <div class="grid">
        <section id="advertisers">
            <hgroup>
                <h2>Your Favorite Advertisers</h2>
                <h3>A curated list of top-notch advertising partners</h3>
            </hgroup>
            <p>Discover our preferred advertisers renowned for their creative campaigns and exceptional service.</p>
            <ul>
                @foreach($advertisers as $advertiser)
                    <li>
                        <h4>{{$advertiser->name}}</h4>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</main>

<section aria-label="Subscribe example" id="subscribe">
    <div class="container">
        <article>
            <hgroup>
                <h2>Stay Updated</h2>
                <h3>Subscribe to receive the latest news about our advertisers</h3>
            </hgroup>
            <form class="grid">
                <input type="text" id="firstname" name="firstname" placeholder="Your Name" aria-label="Your Name" required>
                <input type="email" id="email" name="email" placeholder="Your Email" aria-label="Your Email" required>
                <button type="submit" onclick="event.preventDefault()">Subscribe</button>
            </form>
        </article>
    </div>
</section>

<footer class="container">
    <small><a href="#">Privacy Policy</a> • <a href="#">Terms of Use</a></small>
</footer>

</body>
</html>
