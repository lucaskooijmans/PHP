<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Create Business</title>
</head>
<body>
<x-nav/>
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
                    <label for="slug">Slug</label>
                    <textarea id="slug" name="slug" rows="4" required>{{$business->slug}}</textarea>
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
<x-footer/>
</body>
</html>
