<nav class="navbar">
    <a href="{{ url('/superAdminHome') }}">
    <img src="https://static.wixstatic.com/media/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png/v1/fit/w_2500,h_1330,al_c/c69ef5_bda0347e97ef4e4c8fa0119903a7f1c0~mv2.png"
        alt="Company Logo"></a>
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="nav no-search">
        <li class="nav-item"><a href="{{ url('/superAdminHome') }}">Home</a></li>
        <li class="nav-item"><a href="{{ url('/users') }}">Users</a></li>
        <li class="nav-item"><a href="{{ url('/admins') }}">Admins</a></li>
        <li class="nav-item"><a href="{{ url('/adminSignup') }}"> Admin Signup</a></li>
        <li class="nav-item" style="margin-left:30px "><a href="{{ url('/superAdminLogin') }}">Login</a></li>
    </ul>
</nav>
