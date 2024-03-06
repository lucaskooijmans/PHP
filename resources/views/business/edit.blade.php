<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Create Business</title>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>Create Business</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}">Home</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
    </ul>
</nav>
<main class="container">
    <section>
        <form method="POST" action="{{route('business.store')}}">
            @csrf
            @method('PUT')
            <div class="grid">
                <div class="column">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required>{{$business->description}}</textarea>
                </div>
                <div class="column">
                    <label for="featuredAd">Featured Ad</label>
                    <select id="featuredAd" name="featuredAd" required>
                        <option value="">Select an Ad</option>
                        @foreach($ads as $ad)
                            <option value="{{$ad->id}}">{{$ad->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="column">
                    <label for="businessPhoto">Upload Photo</label>
                    <input type="file" id="businessPhoto" name="image_path">
                </div>
            </div>
            <button type="submit">Save Business</button>
        </form>
    </section>
</main>
<footer class="container">
    <small>
        <a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a>
    </small>
</footer>
</body>
</html>
