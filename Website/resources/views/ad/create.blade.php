<x-header/>

<body>
    <form method="POST" action="create">
        @csrf

        <label for="title">Title</label>
        <input id="title" type="text" name="title">

        <label for="description">Description</label>
        <input id="description" type="text" name="description">

        <label for="price">Price</label>
        <input id="price" type="number" name="price">

        <label for="postalcode">Postalcode</label>
        <input id="postalcode" type="text" name="postalcode">

        @foreach($categories as $category)
            <label>
                <input id="category" type="radio" name="category" value="{{ $category->id }}">
                {{ $category->name }}
            </label>
            <br/>
        @endforeach
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
