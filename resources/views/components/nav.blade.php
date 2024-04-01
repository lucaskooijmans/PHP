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
        <li><a href="{{ route('ad.all') }}" role="button">All advertisements</a></li>

        <!-- My Profile dropdown (visible only when user is logged in) -->
        @if(Auth::check())
            <li id="dropdown" class="dropdown">
                @if(Auth::check())
                    <a href="{{route('account.index', Auth::id())}}" role="button">My profile</a>
                @endif
                <ul class="dropdown-content">
                    @if(auth()->user()->isAdvertiser())
                        <a id="create_advertisement" href="{{ route('ad.create') }}" role="button">Create advertisement</a>
                        <a href="{{ route('ad.my') }}" role="button">My advertisements</a>
                        <a href="{{ route('order.advertiserOrders') }}" role="button">My advertiser orders</a>
                    @endif
                    @if(!auth()->user()->isAdvertiser())
                        <a href="{{ route('ad.myFavorites') }}" role="button">My favorites</a>
                        <a id="favorite_advertisers" href="{{ route('advertiser.list', \Illuminate\Support\Facades\Auth::user()) }}" role="button">Favorite advertisers</a>
                        <a href="{{ route('order.index') }}" role="button">My orders</a>
                    @endif
                </ul>
            </li>
        @endif

        <li><a href="#" role="button">Contact</a></li>

        <li id="dropdown" class="dropdown">
            <a href="#" role="button">Language</a>
            <ul class="dropdown-content">
                <a href="{{ route('lang.switch', 'en') }}" role="button">English</a>
                <a href="{{ route('lang.switch', 'nl') }}" role="button">Dutch</a>
            </ul>
        </li>

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
