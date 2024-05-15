<aside class="left-sidebar with-vertical">
    <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('index') }}" class="text-nowrap logo-img">
                <h5>PT. Odyca Bangun Pratama</h5>
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>


        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">

                <!-- ---------------------------------- -->
                <!-- Dashboard -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <!-- ---------------------------------- -->
                <!-- Apps -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Apps</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('/project', 'project/*') ? 'active' : '' }}"
                        href="{{ route('project.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">Proyek</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('/task', 'task/create') ? 'active' : '' }}"
                        href="{{ route('task.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-subtask"></i>
                        </span>
                        <span class="hide-menu">Tugas</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('archive') ? 'active' : '' }}" href="{{ route('archive') }}"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-archive"></i>
                        </span>
                        <span class="hide-menu">Archives</span>
                    </a>
                </li> --}}

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Account</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('/user', 'user/*') ? 'active' : '' }}"
                        href="{{ route('user.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>


            </ul>
        </nav>



        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>
