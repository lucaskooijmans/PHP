<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Create Review</title>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>Create Review</strong></li>
    </ul>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">View Reviews</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
    </ul>
</nav>
<main class="container">
    @if($ad->id === Auth::id())
        <h1>You can't review yourselve!</h1>
        <a href="{{route('ad.index')}}"class="btn btn-primary">Go Back</a>
    @else
    <section>
        <form method="POST" action="{{route('review.store')}}">
            @csrf
            <input type="hidden" for="ad_id" name="ad_id" value="{{$ad->id}}">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            <label for="score">Score</label>
            <select id="score" name="score" required>
                <option value="">Select a score</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <button type="submit">Submit Review</button>
        </form>
    </section>
    @endif
</main>
<footer class="container">
    <small>
        <a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a>
    </small>
</footer>
</body>
</html>
