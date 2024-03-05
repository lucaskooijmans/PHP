<x-header/>

<body>
    <form method="POST" action="{{route('ad.store')}}">
        @csrf

        <label for="title">Title</label>
        <input id="title" type="text" name="title">
        <br/>

        <label for="description">Description</label>
        <input id="description" type="text" name="description">
        <br/>

        <label for="price">Price</label>
        <input id="price" type="number" name="price">
        <br/>

        <label for="postalcode">Postalcode</label>
        <input id="postalcode" type="text" name="postalcode">
        <br/>

        <label for="category">Categories</label>
        <br/>
        @foreach($categories as $category)
            <label>
                <input id="category" type="radio" name="category" value="{{ $category->id }}">
                {{ $category->name }}
            </label>
            <br/>
        @endforeach
        <br/>
        <label for="type">Types</label>
        <br/>
        @foreach($types as $type)
            <label>
                <input id="type" type="radio" name="type" value="{{ $type->id }}">
                {{ $type->name }}
            </label>
            <br/>
        @endforeach



        <button type="submit">Submit</button>

    </form>
</body>
</html>
