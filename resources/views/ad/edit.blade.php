<x-header/>
<body>
@if($ad->user->id == $user->id)
    <form action="{{route('ad.update', $ad->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$ad->title}}">
        </div>
        <div class="form-group">
            <label for="description">Description: </label>
            <input type="text" class="form-control" id="description" name="description" value="{{$ad->description}}">
        </div>
        <div class="form-group">
            <label for="price">Price: </label>
            <input type="number" class="form-control" id="price" name="price" value="{{$ad->price}}">
        </div>
        <div class="form-group">
            <label for="title">Postalcode: </label>
            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{$ad->postalcode}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endif
    <h1>This is not your post!</h1>
    <a href="{{route('ad.index')}}"class="btn btn-primary">Go Back</a>
</body>
</html>
