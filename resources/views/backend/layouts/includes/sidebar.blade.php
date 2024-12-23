<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
            <!--begin::Brand Image--> <img src="{{ asset('/assets/backend') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                class="brand-text fw-light">Admin StarLite</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div>
    <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open"> <a href="#" class="nav-link active"> <i
                            class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-person-bounding-box"></i>
                    <p>
                        All Data
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"> 
                        <a href="{{ route('user_create') }}" class="nav-link"> <i
                                class="nav-icon bi bi-circle"></i>
                            <p>Create</p>
                        </a>
                     </li>
                    <li class="nav-item"> 
                        <a href="{{ route('user_index') }}" class="nav-link"> <i
                                class="nav-icon bi bi-circle"></i>
                            <p>Index</p>
                        </a>
                     </li>
                </ul>
            </li>         
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-person-bounding-box"></i>
                        <p>
                            User Role
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="{{ route('user_role_index') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Index</p>
                            </a>
                         </li>
                         <li class="nav-item"> 
                            <a href="{{ route('user_role_create') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Create</p>
                            </a>
                         </li>
                    </ul>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i
                            class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Forms
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="./forms/general.html" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>General Elements</p>
                            </a> </li>
                    </ul>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-table"></i>
                        <p>
                            Tables
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="./tables/simple.html" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Simple Tables</p>
                            </a> </li>
                    </ul>
                </li>


                <li class="nav-header">DOCUMENTATIONS</li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i
                            class="nav-icon bi bi-ui-checks-grid"></i>
                        <p>
                            Components
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="./docs/components/main-header.html" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Main Header</p>
                            </a> </li>
                        <li class="nav-item"> <a href="./docs/components/main-sidebar.html" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Main Sidebar</p>
                            </a> </li>
                    </ul>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-filetype-js"></i>
                        <p>
                            Javascript
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="./docs/javascript/treeview.html" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Treeview</p>
                            </a> </li>
                    </ul>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar-->
