<div class="left-side-menu" style="background-color: #1DAAE2">

    <div class="slimscroll-menu" >

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
                        <i class="mdi mdi-home text-white"></i>
                        <span class="text-white"> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('rapid.flow.view')}}" class="waves-effect">
                        <i class="mdi mdi-home text-white"></i>
                        <span class="text-white"> Rapid Pro Flow </span>
                    </a>
                </li>
              @endcan


               @can('rapid_pro')
                {{-- <li>
                    <a href="{{route('rapid.pro.flow') }}" class="waves-effect">
                        <i class="mdi mdi-box-shadow"></i>
                        <span> RapidPro Flow </span>
                    </a>
                </li> --}}
               @endcan



               @can('iogt')
                <li>
                    <a href="{{route('iogt.index') }}" class="waves-effect">
                        <i class="mdi mdi-translate  text-white"></i>
                        <span class="text-white"> IoGT </span>
                    </a>
                </li>
                @endcan

               @can('user')
                  <li>
                <a href="javascript: void(0);" class="waves-effect">
                    <i class="mdi mdi-widgets text-white"></i>
                    <span class="text-white"> User </span>
                    <span class="menu-arrow text-white"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('admins.view') }}" class="text-white">Admin</a></li>
                    <li><a href="{{route('users.index')}}" class="text-white">Editor </a></li>
                </ul>
            </li>

             @endcan

               {{-- @can('role')
               <li>
                    <a href="{{route('roles.index')}}" class="waves-effect">
                        <i class="fas fa-user  text-white"></i>
                        <span class="text-white"> Role & Permission </span>
                    </a>
                </li>
                @endcan --}}

                @can('settings')

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-widgets text-white"></i>
                        <span class="text-white"> Settings </span>
                        <span class="menu-arrow text-white"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('user.profile.view')}}" class="text-white">User Profile</a></li>
                        {{-- <li><a href="{{route('rapid.pro.create')}}">Rapid Pro(Old)</a></li> --}}
                        <li><a href="{{ route('offices.view') }}" class="text-white">Country Office</a></li>
                        <li><a href="{{ route('regions.view') }}" class="text-white">Region</a></li>
                        <li><a href="{{ route('themefic-area.view') }}" class="text-white">Themefic Area</a></li>

                    </ul>
                </li>
                    
                @endcan
             



            </ul>
            <hr>
            <ul class="metismenu align-bottom" id="side-menu">
                <li>
                    <a href="{{route('logout')}}" class="waves-effect">
                        <i class="mdi mdi-power-settings  text-white"></i>
                        <span class="text-white"> Logout </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>


    </div>
    <!-- Sidebar -left -->

</div>
