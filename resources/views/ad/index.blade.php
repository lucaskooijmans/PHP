<x-header/>
<body>
    <ul>
        @foreach($ads as $ad)
            <li>
                <ul>
                    <li><h3>Title: </h3>{{$ad->title}}</li>
                    <li><h3>Description: </h3>{{$ad->description}}</li>
                    <li><h3>Price: </h3>{{$ad->price}}</li>
                    <li><h3>Postalcode: </h3>{{$ad->postalcode}}</li>
                    <li><h3>Category: </h3>{{$ad->category->name}}</li>
                    <li><h3>Type: </h3>{{ $ad->adType->name }}</li>
                </ul>
            </li>
            @if($ad->user->id == $user->id)
            <a href="{{ route('ad.edit', $ad->id) }}" class="btn btn-primary">Edit</a>
            @endif
        @endforeach
    </ul>
</body>
</html>


