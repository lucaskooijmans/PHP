<x-header/>
<body>
    <h1>{{$business->title}}</h1>
    <img src="{{asset($business->image_path)}}">
    <div>
        <ul>
            <li><h2>{{$business->featuredAd->title}}</h2></li>
            <li><p>{{$business->featuredAd->description}}</p></li>
            <li><p>{{$business->featuredAd->price}}</p></li>
        </ul>
    </div>
    <p>{{$business->description}}</p>
</body>
</html>
