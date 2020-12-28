<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="http://www.sketchupjapan.com/podium/images/placeholder-04.png">
            </div>
            <a href="#!user"><img class="circle" src="{{ asset('images/Blissbox Logo.png') }}"></a>
            <a href="#!name"><span class="white-text name">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span></a>
            <a href="#!email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div>
    </li>
    @if(Auth::user()->role === 'C')
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    @else
    <li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header">Company<i class="material-icons">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#!">List All Company</a></li>
                            <li><a href="{{ url('/company/create') }}">Create New Company</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a href="#!">Second Link</a></li>
    <li>
        <div class="divider"></div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>