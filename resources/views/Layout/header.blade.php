<nav class="navbar">
    <a href="{{ URL::to('/') }}">
    <img src="https://static.wixstatic.com/media/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png/v1/fit/w_2500,h_1330,al_c/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png"
        alt="Company Logo"></a>
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="nav no-search">
        <li class="nav-item"><a href="{{URL::to('/') }}">Home</a></li>
        <li class="nav-item"><a href="{{URL::to('/about') }}">About</a></li>
        <li class="nav-item"><a href="{{URL::to('/contact') }}">Contact</a></li>
        <li class="nav-item"><a href="{{URL::to('/help') }}" style="margin-left: 10px">Help</a></li>
        @if(!Session::has('user'))
        <li class="nav-item"><a href="{{URL::to('/login') }}">Login</a></li>
        <li class="nav-item"><a href="{{URL::to('/signup') }}">Signup</a></li>
        @else
        <li class="nav-item"><a href="{{URL::to('/logout') }}">Logout</a></li>
        @endIf

        {{-- <li class="nav-item"><a href="{{ url('/contact') }}">Contact Us</a></li> --}}
        {{-- <i class="fas fa-search" id="search-icon"></i>
        <input class="search-input" type="text" placeholder="Search.."> --}}
    </ul>
</nav>
