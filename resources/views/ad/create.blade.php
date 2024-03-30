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
<main class="container">
    <h1 id="page_title">Create advertisement</h1>
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
                    <input type="number" inputmode="numeric" pattern="[0-9]*" min="0" max="1000000" id="price" name="price" required>
                </div>
                <div class="column">
                    <label for="postalcode">Postal Code</label>
                    <input type="text" id="postalcode" name="postalcode" required>
                </div>
                <div class="column">
                    <fieldset id="category_selector">
                        <legend>Category</legend>
                        @foreach($categories as $category)
                            <label><input type="radio" name="category" value="{{$category->id}}" required> {{$category->name}}</label>
                        @endforeach
                    </fieldset>
                </div>
                <div class="column">
                    <fieldset id="type_selector">
                        <legend>Type</legend>
                        @foreach($types as $type)
                            <label><input type="radio" name="type" value="{{$type->id}}" required> {{$type->name}}</label>
                        @endforeach
                    </fieldset>
                </div>
            </div>
            <button id="submit_button" type="submit">Submit</button>
        </form>
    </section>
</main>
<x-footer/>
</body>
</html>
