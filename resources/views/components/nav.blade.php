<nav class="container-fluid">
    <ul>
        <li><strong>Marketplace</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}" role="button">HOME</a></li>
        <li><a href="{{route('order.index')}}" role="button">Orders</a></li>
        <li><a href="{{route('ad.all')}}" role="button">ALL</a></li>
        <li><a href="{{route('ad.my')}}" role="button">MY</a></li>
        <li><a href="{{route('ad.create')}}" role="button">CREATE</a></li>
        <li><a href="#" role="button">CONTACT</a></li>
        @if(!Auth::check())
            <li><a href="{{route('login')}}">LOGIN</a></li>
            <li><a href="{{route('register')}}">REGISTER</a></li>
        @else
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"> > LOG OUT</button>
                </form>
            </li>
        @endif
    </ul>
</nav>