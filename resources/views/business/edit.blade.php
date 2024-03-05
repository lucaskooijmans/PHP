<x-header/>
<body>
    <form action="{{route('business.update', $business->id)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="description">Description</label>
        <input id="description" type="text" name="description">
        <br/>

        @foreach($ads as $ad)
            <label>
                <input id="featured_ad" type="radio" name="featured_ad" value="{{ $ad->id }}">
                {{ $ad->title }}
            </label>
            <br/>
        @endforeach

        <button type="submit">Submit</button>
    </form>
</body>
</html>
