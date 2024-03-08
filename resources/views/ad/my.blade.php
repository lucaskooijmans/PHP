<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My advertisements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="{{ asset('css/ads.css')}}">
    <script>
        // Get the expiration time for each advertisement and update the countdown
        @foreach($myAds as $adv)
        var expiresAt{{ $adv->id }} = new Date('{{ $adv->expires_at }}').getTime();

        // Update the countdown every second
        var x{{ $adv->id }} = setInterval(function () {
            var now = new Date().getTime();
            var distance = expiresAt{{ $adv->id }} - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the countdown
            document.getElementById("expires-in-{{ $adv->id }}").innerHTML = "Expires in: " + days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the countdown is over, display expired
            if (distance < 0) {
                clearInterval(x{{ $adv->id }});
                document.getElementById("expires-in-{{ $adv->id }}").innerHTML = "EXPIRED";


                // Send AJAX request to update is_expired status
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "{{ route('ad.updateExpiredStatus', $adv->id) }}", true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(JSON.stringify({ is_expired: 1 })); // Set is_expired to true
            }
        }, 1000);
        @endforeach
    </script>
</head>
<body>

<x-nav/>

<main class="container">
    <h1>My advertisements</h1>

    <div class="row">
        @foreach($myAds as $ad)
            <div class="advertisement" onclick="location.href='{{ route('ad.show', $ad->id) }}';">
                <h3>{{ $ad->title }}</h3>
                <img src="https://picsum.photos/300/200" alt="Advertisement Image"/>
                <p><strong>Description:</strong> {{ $ad->description }}</p>
                <p><strong>Price:</strong> {{ $ad->price }}</p>
                <p><strong>Category:</strong> {{ $ad->category->name }}</p>
                <p><strong>Type:</strong> {{ $ad->adType->name }}</p>
                <p id="expires-in-{{ $ad->id }}"></p>
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
</main>

<x-footer/>

</body>
</html>
