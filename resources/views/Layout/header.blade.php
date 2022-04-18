<nav class="navbar">
    <a href="{{ url('/') }}">
    <img src="https://static.wixstatic.com/media/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png/v1/fit/w_2500,h_1330,al_c/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png"
        alt="Company Logo"></a>
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="nav no-search">
        <li class="nav-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="nav-item"><a href="{{ url('/about') }}">About</a></li>
        <li class="nav-item"><a href="{{ url('/contact') }}">Contact</a></li>
        <li class="nav-item"><a href="{{ url('/help') }}" style="margin-left: 10px">Help</a></li>
        <li class="nav-item"><a href="{{ url('/login') }}">Login</a></li>
        <li class="nav-item"><a href="{{ url('/login') }}">Signup</a></li>
        {{-- <li class="nav-item"><a href="{{ url('/contact') }}">Contact Us</a></li> --}}
        {{-- <i class="fas fa-search" id="search-icon"></i>
        <input class="search-input" type="text" placeholder="Search.."> --}}
    </ul>
</nav>
