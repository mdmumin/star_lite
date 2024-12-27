<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto"> <!--begin::Fullscreen Toggle-->
            <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="/{{ Auth::user()->image }}" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                    <li class="user-header text-bg-primary"> <img src="/{{ Auth::user()->image }}" class="rounded-circle shadow" alt="User Image">
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since Nov. 2023</small>
                        </p>
                    </li> <!--end::User Image--> <!--begin::Menu Body-->
                    <li class="user-body"><!--begin::Row-->
                        <div class="row">
                            <div class="col-12 text-center"> <a href="">Edit profile</a> </div>
                        </div> <!--end::Row-->
                    </li> <!--end::Menu Body--> <!--begin::Menu Footer-->
                    <li class="user-footer"> <a href="" class="btn btn-default btn-flat">Profile</a> 
                        <a class="btn btn-default btn-flat float-end" href="{{ route('logout') }}" onclick="event.preventDefault(); confirmLogout();">
                            Logout
                        </a>
                    </li> <!--end::Menu Footer-->
                </ul>
            </li> <!--end::User Menu Dropdown-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header-->