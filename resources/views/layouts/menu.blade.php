<nav class="navbar navbar-expand-md navbar-light bg-light"> 

    <img data-zs-logo="" src="{{ asset('/Logo1.gif') }}"  style="padding-left:10px;height:50px;width:60.44px;">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Tuition Centre <span class="sr-only">(current)</span></a>
            </li>            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/events') }}">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users/list') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/payments/list') }}">Donations</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ url('/roles') }}">Roles</a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="{{ url('/import') }}">Import</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Finance </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Reports</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/payments/month-reports') }}">Monthly Report</a></li>
                            <li><a class="dropdown-item" href="{{ url('/payments/year-reports') }}">Yearly Report</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left:1100px;">
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > {{ Auth::user()->username }} </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">    Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </div>
        </ul>
    </div>
</nav>