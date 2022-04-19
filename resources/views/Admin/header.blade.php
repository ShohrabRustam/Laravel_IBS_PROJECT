<nav class="navbar">
    <a href="{{ url('/adminHome') }}">
    <img src="https://static.wixstatic.com/media/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png/v1/fit/w_2500,h_1330,al_c/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png"
        alt="Company Logo"></a>
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="nav no-search">
        @if(!Session::has('user'))
        <li class="nav-item"><a href="{{ url('/adminLogin') }}">Login</a></li>
        @else
        <li class="nav-item"><a href="{{ url('/adminHome') }}">Home</a></li>
        <li class="nav-item"><a href="{{ url('/requestPage') }}">Request</a></li>
        <li class="nav-item"><a href="{{ url('/claimPage') }}">Claim</a></li>
        <li class="nav-item"><a href="{{ url('/addCompany') }}">Add Company</a></li>
        @endif
    </ul>
</nav>
