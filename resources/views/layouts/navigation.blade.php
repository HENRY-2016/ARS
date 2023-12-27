<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
<span style="color: #22D226; font-size:25px"><b>{{trans_choice('general.appName',0)}}</b></span>
<br><br>
</div>
<div class="navbar-menu-wrapper d-flex align-items-stretch">
<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
<span class="mdi mdi-menu"></span>
</button>


<ul class="navbar-nav navbar-nav-right">

<li class="nav-item nav-profile dropdown">
    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
    <div class="nav-profile-img">
        <img src="{{asset('assets/images/faces/user.png')}}" alt="image">
    </div>
    <div class="nav-profile-text">
        <p class="mb-1 text-black">{{Auth::User()->name}}</p>
    </div>
    </a>
    <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
    <div class="p-3 text-center bg-primary">
        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('assets/images/faces/face28.png')}}" alt="">
    </div>
    <div class="p-2">
        <div role="separator" class="dropdown-divider"></div>
        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between">
        <span>{{Auth::User()->name}}</span>
        </a>
        <div role="separator" class="dropdown-divider"></div>
        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between">
        <span>{{Auth::User()->email}}</span>
        </a>
        
        <div role="separator" class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                <i class="mdi mdi-logout ml-1"></i>
                {{ __('Log Out') }}
            </a>
        </form>
    </div>
    </div>
</li>

</ul>
<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
<span class="mdi mdi-menu"></span>
</button>
</div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
<div style="margin-left: 50px;">
<img src="{{asset('assets/images/faces/user.png')}}" style="width: 100px; height:100px" alt="image">
<br>
<span>{{Auth::User()->name}}</span>
</div>
<div class="dropdown-divider"></div>
<br><br>
<li class="nav-item">
    <a class="nav-link" href="{{url('components/dashboard')}}">
    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
    <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('components/roster')}}">
    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
    <span class="menu-title">Roster</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('components/check-Points')}}">
    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
    <span class="menu-title">Check Points</span>
    </a>
</li>
<!-- <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
    <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
    <span class="menu-title">UI Elements</span>
    <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
    <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
    </ul>
    </div>
</li> -->

</ul>
</nav>
