<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
<!-- <a class="navbar-brand brand-logo" href="{{url('components/dashboard')}}"><img src="{{asset('assets/images/caa.png')}}" alt="logo" style="height:80px" /></a> -->
<br><br>
</div>
<div class="navbar-menu-wrapper d-flex align-items-stretch">
<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
<span class="mdi mdi-menu"></span>
</button>

<ul class="navbar-nav navbar-nav-right">
<li class="nav-item  dropdown d-none d-md-block">
    <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Reportsss </a>
    <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
    <a class="dropdown-item" href="#">
        <i class="mdi mdi-file-pdf mr-2"></i>PDF </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
        <i class="mdi mdi-file-excel mr-2"></i>Excel </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
        <i class="mdi mdi-file-word mr-2"></i>doc </a>
    </div>
</li>
<li class="nav-item  dropdown d-none d-md-block">
    <a class="nav-link dropdown-toggle" id="projectDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Projects </a>
    <div class="dropdown-menu navbar-dropdown" aria-labelledby="projectDropdown">
    <a class="dropdown-item" href="#">
        <i class="mdi mdi-eye-outline mr-2"></i>View Project </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
        <i class="mdi mdi-pencil-outline mr-2"></i>Edit Project </a>
    </div>
</li>

<li class="nav-item nav-profile dropdown">
    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
    <div class="nav-profile-img">
        <img src="{{asset('assets/images/faces/face28.png')}}" alt="image">
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