<nav class="container-fluid">
    <ul>
        <li><strong>Marketplace</strong></li>
    </ul>
    <ul>
        <li><a href="{{route('ad.index')}}">Home</a></li>
        <li><a href="{{route('ad.create')}}">Create Ad</a></li>
        <li><a href="#" role="button">Contact Us</a></li>
        @if(!Auth::check())
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
        @else
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button role="button" type="submit">Log out</button>
                </form>
            </li>
        @endif
    </ul>
</nav>