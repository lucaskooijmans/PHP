<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Create Advertisement</title>
</head>
<body>
<x-nav/>
@if($ad->user->id == Auth::id())
<main class="container">
    <section>
        <form method="POST" action="{{route('ad.store')}}">
            @csrf
            @method('PUT')
            <div class="grid">
                <div class="column">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required value="{{$ad->title}}">
                </div>
                <div class="column">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required>{{$ad->description}}</textarea>
                </div>
                <div class="column">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" required value="{{$ad->price}}">
                </div>
                <div class="column">
                    <label for="postalcode">Postal Code</label>
                    <input type="text" id="postalcode" name="postalcode" required value="{{$ad->postalcode}}">
                </div>
                <div class="column">
                    <fieldset>
                        <legend>Category</legend>
                        @foreach($categories as $category)
                            <label><input type="radio" name="category" value="{{$category->id}}" required> {{$category->name}}</label>
                        @endforeach
                    </fieldset>
                </div>
                <div class="column">
                    <fieldset>
                        <legend>Type</legend>
                        @foreach($types as $type)
                            <label><input type="radio" name="type" value="{{$type->id}}" required> {{$type->name}}</label>
                        @endforeach
                    </fieldset>
                </div>
            </div>
            <button type="submit">Submit Ad</button>
        </form>
    </section>
</main>
@else
    <h1>Not your ad</h1>
    <p>This is not your ad!</p>
    <a href="{{route('ad.index')}}"class="btn btn-primary">Go Back</a>
@endif
<x-footer/>
</body>
</html>
