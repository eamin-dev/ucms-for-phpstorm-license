<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

{{--            <div class="user-box">--}}

{{--                <div class="float-left">--}}
{{--                    <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">--}}
{{--                </div>--}}
{{--                <div class="user-info">--}}
{{--                    <div class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            John Doe <i class="mdi mdi-chevron-down"></i>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">--}}
{{--                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-face-profile mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>--}}
{{--                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Settings</a></li>--}}
{{--                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-lock mr-2"></i> Lock screen</a></li>--}}
{{--                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-power-settings mr-2"></i> Logout</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <p class="font-13 text-muted m-0">Administrator</p>--}}
{{--                </div>--}}
{{--            </div>--}}

            <ul class="metismenu" id="side-menu">
                @can('dashboard')
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @endcan

                @can('rapid_pro')
                <li>
                    <a href="{{route('rapid.pro.create') }}" class="waves-effect">
                        <i class="mdi mdi-box-shadow"></i>
                        <span> RapidPro </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('rapid.pro.flow') }}" class="waves-effect">
                        <i class="mdi mdi-box-shadow"></i>
                        <span> RapidPro Flow </span>
                    </a>
                </li>
               @endcan


               @can('iogt')
                <li>
                    <a href="{{route('iogt.index') }}" class="waves-effect">
                        <i class="mdi mdi-translate"></i>
                        <span> IoGT </span>
                    </a>
                </li>
                @endcan

                @can('user')
                <li>
                    <a href="{{route('users.index')}}" class="waves-effect">
                        <i class="fas fa-user"></i>
                        <span> User </span>
                    </a>
                </li>
                @endcan

                @can('role')
                <li>
                    <a href="{{route('roles.index')}}" class="waves-effect">
                        <i class="fas fa-user"></i>
                        <span> Role & Permission </span>
                    </a>
                </li>
                @endcan

                <li>
                    <a href="{{route('user.settings',Auth::id())}}" class="waves-effect">
                        <i class="fas fa-wrench"></i>
                        <span> Settings </span>
                    </a>
                </li>



            </ul>
            <hr>
            <ul class="metismenu align-bottom" id="side-menu">
                <li>
                    <a href="{{route('logout')}}" class="waves-effect">
                        <i class="mdi mdi-power-settings"></i>
                        <span> Logout </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>


    </div>
    <!-- Sidebar -left -->

</div>
