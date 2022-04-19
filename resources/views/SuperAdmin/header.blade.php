<nav class="navbar">
    <a href="{{ url('/superadminHome') }}">
        <img src="https://static.wixstatic.com/media/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png/v1/fit/w_2500,h_1330,al_c/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png"
        alt="Company Logo"></a>
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="nav no-search">
        @if (Session::has('user') && Session::get('user')['type']=='superadmin')
            <li class="nav-item"><a href="{{ url('/superadminHome') }}" style="margin-left:10px ">Home</a></li>
            <li class="nav-item"><a href="{{ url('/usersList') }}" style="margin-left:10px ">Users</a></li>
            <li class="nav-item"><a href="{{ url('/adminsList') }}" style="margin-left:10px ">Admins</a></li>
            <li class="nav-item"><a href="{{ url('/superadminLogout') }}" style="margin-left:10px "> Logout</a></li>
    @else
        <li class="nav-item" style="margin-left:30px "><a href="{{ url('/superadminLogin') }}">Login</a></li>
        @endif

    </ul>
</nav>
