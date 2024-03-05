<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Create Advertisement</title>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>Create Ad</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}">Home</a></li>
        <li><a href="#">All Ads</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
    </ul>
</nav>
<main class="container">
    <section>
        <form method="POST" action="{{route('ad.store')}}">
            @csrf
            <div class="grid">
                <div class="column">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="column">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="column">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" required>
                </div>
                <div class="column">
                    <label for="postalcode">Postal Code</label>
                    <input type="text" id="postalcode" name="postalcode" required>
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
<footer class="container">
    <small>
        <a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a>
    </small>
</footer>
</body>
</html>
