<nav class="navbar navbar-expand-lg navbar-light navbar-announcement">
    <p>
        We create a gifting experience that is second to none
    </p>
</nav>
<nav class="navbar navbar-expand-lg navbar-light navbar-logo">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Blissbox Logo" width="350">
    </a>
</nav>
<nav class="navbar navbar-expand-lg navbar-light navbar-menu" id="nav">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container">
            <ul class="navbar-nav mr-auto float-left">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/about') }}">About Us <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/how-it-works') }}">How It Works <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catalog
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/universe/giftboxes/1') }}">Multi-theme</a>
                        <a class="dropdown-item" href="{{ url('/indulge') }}">Indulge</a>
                        <a class="dropdown-item" href="{{ url('/relax') }}">Relax</a>
                        <a class="dropdown-item" href="{{ url('/energize') }}">Energize</a>
                        <a class="dropdown-item" href="{{ url('/escape') }}">Escape</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto float-right">
                @if (!Request::is('/'))

                    <li class="nav-item" style="margin-left: 10px;">
                        <form class="form-inline" method="POST" action="{{ url('/search') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                            <button class="btn my-2 my-sm-0" type="submit"><i class="material-icons">search</i>
                            </button>
                        </form>
                    </li>

                @endif
                <li class="nav-item">
                    <a class="nav-link btn-profile text-center" href="{{ url('/login') }}">
                        I HAVE A BLISSBOX
                    </a>
                </li>
                <div class="flexrow">
                    <li class="nav-item">
                        <a class="nav-link cart" href="{{ url('/cart') }}">
                            <cart-count></cart-count>
                            <i class="material-icons">shopping_cart</i>
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<i class="material-icons">favorite_border</i>--}}
                        {{--</a>--}}
                    {{--</li>--}}

                </div>
            </ul>
        </div>
    </div>

</nav>