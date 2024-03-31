<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Advertisements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="{{ asset('css/ads.css')}}">
</head>
<body>
<x-nav/>

<main class="container">
    <h1>All advertisements</h1>

    <form action="{{ route('ad.all') }}" method="GET" class="filter-form">
        <div class="filter-group">
            <label for="category">Filter by Category:</label>
            <select name="category" id="category">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-group">
            <label for="sortBy">Sort By:</label>
            <select name="sortBy" id="sortBy">
                <option value="created_at">Created At</option>
                <option value="price">Price</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="filter-group">
            <label for="sortDirection">Sort Direction:</label>
            <select name="sortDirection" id="sortDirection">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
        </div>
        <div class="filter-group">
            <button type="submit">Apply Filters</button>
        </div>
    </form>

    <div class="row">
        @foreach($allAds as $ad)
            <div class="advertisement" onclick="location.href='{{ route('ad.show', $ad->id) }}';">
                <h3>{{ $ad->title }}</h3>
                <img src="https://picsum.photos/300/200" alt="Advertisement Image"/>
                <p><strong>Advertiser:</strong> {{ $ad->user->name }}</p>
                <p><strong>Description:</strong> {{ $ad->description }}</p>
                <p><strong>Price:</strong> {{ $ad->price }}</p>
                <p><strong>Category:</strong> {{ $ad->category->name }}</p>
                <p><strong>Type:</strong> {{ $ad->adType->name }}</p>
            </div>
        @endforeach
    </div>

    <div class="clearfix"></div>

    {{ $allAds->links() }}
</main>

<x-footer/>
</body>
</html>
