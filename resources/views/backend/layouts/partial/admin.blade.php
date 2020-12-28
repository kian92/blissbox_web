<li>
    <li><a href="{{ url('/dashboard/admin') }}">Dashboard</a></li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Company<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ url('/company') }}">List All Company</a></li>
                        <li><a href="{{ url('/company/create') }}">Create New Company</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
     <li>
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Universe<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ url('/universe') }}">List All Universe</a></li>
                        <li><a href="{{ url('/universe/create') }}">Create New Universe</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    {{--<li><a href="{{ url('/universe/create') }}">Universe</a></li>--}}
    <li>
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Giftbox & Voucher<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ url('/giftbox') }}">List All Giftbox</a></li>
                        <li><a href="{{ url('/giftbox/create') }}">Create New Giftbox</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li>
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Experience<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ url('/experience') }}">List All Experience</a></li>
                        <li><a href="{{ url('/experience/create') }}">Create New Experience</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li><a href="{{ url('/purchase/history') }}">My Orders</a></li>
<li><a href="{{ url('/voucher/activate/admin') }}">Activate Voucher</a></li>
</li>