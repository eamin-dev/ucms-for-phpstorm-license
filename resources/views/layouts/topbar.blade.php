<div class="navbar-custom" style="box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.12);">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li  class="dropdown notification-list d-none d-md-inline-block" >
            <strong class="nav-link waves-effect waves-light text-dark"> {{Auth::user()->name}}</strong>
        </li>

        <li class="dropdown notification-list">

            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ !empty(Auth::user()->image)?url(Auth::user()->image):url('upload/user_image/no-image.png')}}" alt="user-image" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                <!-- item-->
                <a href="{{route('logout')}}" class="dropdown-item notify-item">
                    <i class="mdi mdi-power-settings"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class=" logo-box">


        <a href="#" class="logo text-center logo-light">
                            <span class="logo-lg">
                               <img src="{{ asset('assets/images/ulogo.png') }} " style="height: 100%"  alt="" height="40">
                                {{-- <span class="logo-lg-text-light">UCMS</span> --}}
                            </span>

        </a>
    </div>

    <!-- LOGO -->

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
    </ul>
</div>
