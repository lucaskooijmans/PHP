<html lang="en">
<head>
    <link rel="stylesheet" href="{{ URL::asset('css/nav.css') }}">
</head>

<nav class="container-fluid">
    <ul>
        <li><strong>Marketplace</strong></li>
    </ul>
    <ul>
        <li><a href="{{ route('ad.index') }}" role="button">Home</a></li>
        <li><a id="all_advertisements" href="{{ route('ad.all') }}" role="button">All advertisements</a></li>

        <!-- My Profile dropdown (visible only when user is logged in) -->
        @if(Auth::check())
            <li id="dropdown" class="dropdown">
                @if(Auth::check())
                    <a href="{{route('account.index', Auth::id())}}" role="button">My profile</a>
                @endif
                <ul class="dropdown-content">
                    @if(auth()->user()->isAdvertiser())
                        <li><a id="create_advertisement" href="{{ route('ad.create') }}" role="button">Create advertisement</a></li>
                        <li><a href="{{ route('ad.my') }}" role="button">My advertisements</a></li>
                        <li><a href="{{ route('order.advertiserOrders') }}" role="button">My advertiser orders</a></li>
                    @endif
                    @if(!auth()->user()->isAdvertiser())
                        <li><a href="{{ route('ad.myFavorites') }}" role="button">My favorites</a></li>
                            <li><a id="favorite_advertisers" href="{{ route('advertiser.list', \Illuminate\Support\Facades\Auth::user()) }}" role="button">Favorite advertisers</a></li>
                        <li><a href="{{ route('order.index') }}" role="button">My orders</a></li>
                    @endif
                </ul>
            </li>
        @endif

        <li><a href="#" role="button">Contact</a></li>
        @if(!Auth::check())
            <li><a href="{{ route('login') }}">LOGIN</a></li>
            <li><a href="{{ route('register') }}">REGISTER</a></li>
        @else
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">LOG OUT</button>
                </form>
            </li>
        @endif
    </ul>
</nav>
