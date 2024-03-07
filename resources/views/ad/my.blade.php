<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My advertisements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <style>
        /* Custom styles */
        .advertisement {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s;
            width: calc(33.333% - 20px);
            margin-right: 20px;
            float: left;
        }

        .advertisement:nth-child(3n) {
            margin-right: 0;
        }

        .advertisement:hover {
            transform: scale(1.05);
        }

        .advertisement img {
            max-width: 100%;
            height: auto;
        }

        .advertisement-title {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>

</head>
<body>
<x-nav/>

<main class="container">
    <h1>My advertisements</h1>

    <div class="row">
        @foreach($myAds as $ad)
            <div class="advertisement" onclick="location.href='{{ route('ad.show', $ad->id) }}';">
                <h2 class="advertisement-title">{{ $ad->title }}</h2>
                <img src="https://picsum.photos/300/200" alt="Advertisement Image"/>
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
