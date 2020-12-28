<a href="#" data-activates="slide-out" class="button-collapse fixed-action-btn btn-floating btn-large"><i class="material-icons">menu</i></a>
<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="user-view">
            <div class="background">
                {{--<img src="https://i.ytimg.com/vi/8exK6fyGtrc/maxresdefault.jpg" alt="Profile Background" class="responsive-img">--}}
            </div>
            <a href="#!user"><img class="circle profile-img" src="{{ asset('images/logo_mark.png') }}"></a>
            <a href="#!name"><span class="black-text name">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span></a>
            <a href="#!email"><span class="black-text email">{{ Auth::user()->email }}</span></a>
        </div>
    </li>
    @if(Auth::user()->role_id === 1)
        @include('backend.layouts.partial.user')
    @elseif(Auth::user()->role_id === 2)
        @include('backend.layouts.partial.merchant')
    @else
        @include('backend.layouts.partial.admin')
    @endif
    <li><div class="divider"></div></li>
    @if(Auth::user()->role_id != 2)
    <!-- <li><a href="{{ url('/') }}">Back To Shopping</a></li> -->
    @endif
    <li><a href="{{ url('/password/change') }}">Change Password</a></li>
    <li class="nav-item">
        <a class="nav-link logout" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {!! csrf_field() !!}
        </form>
    </li>
</ul>