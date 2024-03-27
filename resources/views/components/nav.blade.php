<html lang="en">
<head>
    <link rel="stylesheet" href="{{ URL::asset('css/nav.css') }}">
</head>

<nav class="container-fluid">
    <ul>
        <li><strong>Marketplace</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}" role="button">Home</a></li>
        <li><a href="{{route('ad.all')}}" role="button">All advertisements</a></li>

        <li class="dropdown">
            <a href="{{route('account.index', Auth::id())}}" role="button">My profile</a>
            <ul class="dropdown-content">
                <li><a href="{{route('ad.create')}}" role="button">Create advertisement</a></li>
                <li><a href="{{route('ad.my')}}" role="button">My advertisements</a></li>
                <li><a href="{{route('ad.myFavorites')}}" role="button">My favorites</a></li>
                <li><a href="{{route('order.index')}}" role="button">My orders</a></li>
            </ul>
        </li>

        <li><a href="#" role="button">Contact</a></li>
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
            <li><a href="{{route('account.index', Auth::id())}}" role="button">Account</a></li>
        @endif
    </ul>
</nav>