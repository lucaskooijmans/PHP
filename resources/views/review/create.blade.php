<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Create review</title>
</head>
<body>
<x-nav/>
<main class="container">
    <h1 id="page_title">Create review</h1>
    @if($ad->id === Auth::id())
        <h1>You can't review yourself</h1>
        <a href="{{route('ad.index')}}"class="btn btn-primary">Go Back</a>
    @else
    <section>
        <form method="POST" action="{{route('review.store')}}">
            @csrf
            <input type="hidden" for="ad_id" name="ad_id" value="{{$ad->id}}">
            <label for="title">Title</label>
            <input type="text" id="title_input" name="title" required maxlength="20">
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
            <button id="submit-button" type="submit">Submit Review</button>
        </form>
    </section>
    @endif
</main>
<x-footer/>
</body>
</html>
