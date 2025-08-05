<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>User | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ url('/') }}/assets/css/app.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="{{ url('/') }}/assets/js/head.js"></script>


</head>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">

        <!-- Topbar Start -->
        <div class="topbar-custom">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <li>
                            <button class="button-toggle-menu nav-link">
                                <i data-feather="menu" class="noti-icon"></i>
                            </button>
                        </li>
                        <li class="d-none d-lg-block">
                            <h5 class="mb-0 fs-6">{{ Auth::user()->name }}
                                {{-- Badge --}}
                                @if (Auth::user()->userDetails->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @elseif(Auth::user()->userDetails->status === 'inactive')
                                    <span class="badge bg-warning">Inactive</span>
                                @elseif(Auth::user()->userDetails->status === 'suspended')
                                    <span class="badge bg-danger">Suspended</span>
                                @else
                                    <span class="badge bg-secondary">Unknown</span>
                                @endif
                            </h5>
                        </li>
                    </ul>

                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                        <!-- Button Trigger Customizer Offcanvas -->
                        <li class="d-none d-sm-flex">
                            <button type="button" class="btn nav-link" data-toggle="fullscreen">
                                <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                            </button>
                        </li>

                        <!-- Light/Dark Mode Button Themes -->
                        <li class="d-none d-sm-flex">
                            <button type="button" class="btn nav-link" id="light-dark-mode">
                                <i data-feather="moon" class="align-middle dark-mode"></i>
                                <i data-feather="sun" class="align-middle light-mode"></i>
                            </button>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        <div class="app-sidebar-menu">
            <div class="h-100" data-simplebar>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <div class="logo-box mt-1">
                        <a href="index.html" class="logo">
                            <span class="logo-sm">
                                <img src="{{ url('/') }}/assets/images/logo-light.png" alt=""
                                    height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ url('/') }}/assets/images/logo-light.png" alt=""
                                    height="68">
                            </span>
                        </a>
                    </div>

                    <ul id="side-menu">

                        @if (auth()->check() && auth()->user()->userDetails->status === 'active')
                            <li>
                                <form id="login-form-admin" action="{{ config('app.hosting.url') . '/CMD_LOGIN' }}"
                                    method="POST" name="form">
                                    <input type=hidden name=referer value="/">
                                    <input type=hidden name=FAIL_URL
                                        value="{{ config('app.hosting.url') }}/login_failed.html">
                                    <input type=hidden name=LOGOUT_URL
                                        value="{{ config('app.hosting.url') }}/logged_out.html">
                                    <input type=hidden name=username value="{{ config('app.hosting.username') }}">
                                    <input type=hidden name=password value="{{ config('app.hosting.password') }}">
                                </form>
                                <button class="btn btn-primary w-100 mt-3" type="submit">
                                    <i data-feather="server" width="16" height="16"></i>
                                    <span class="ms-2">Log In Hosting Panel</span>
                                </button>
                            </li>
                        @endif

                        <li class="menu-title mt-2">Menu</li>

                        <li>
                            <a href="{{ url('user/dashboard') }}" class="tp-link">
                                <i data-feather="home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Hosting</li>

                        {{-- Customer Menu --}}
                        <li>
                            <a href="{{ url('admin/customers') }}" class="tp-link">
                                <i data-feather="users"></i>
                                <span> Information </span>
                            </a>
                        </li>

                        {{-- Packages Menu  --}}
                        <li>
                            <a href="{{ url('packages') }}" class="tp-link">
                                <i data-feather="package"></i>
                                <span> Packages </span>
                            </a>
                        </li>

                        {{-- Layanan Menu --}}
                        <li>
                            <a href="{{ url('services') }}" class="tp-link">
                                <i data-feather="trello"></i>
                                <span> Services </span>
                            </a>
                        </li>

                        {{-- Database --}}
                        <li>
                            <a href="{{ url('databases') }}" class="tp-link">
                                <i data-feather="database"></i>
                                <span> Databases </span>
                            </a>
                        </li>

                        <li>
                            <a href="apps-calendar.html" class="tp-link">
                                <i data-feather="globe"></i>
                                <span> Domains </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Settings</li>
                        <li>
                            <a href="apps-calendar.html" class="tp-link">
                                <i data-feather="settings"></i>
                                <span> Setting </span>
                            </a>
                        </li>
                        <li>
                            <a href="apps-calendar.html" class="tp-link">
                                {{-- <i data-feather="shield"></i> --}}
                                <i data-feather="log-out"></i>
                                <span> Logout </span>
                            </a>
                        </li>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ url('/') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/feather-icons/feather.min.js"></script>

    <!-- Apexcharts JS -->
    <script src="{{ url('/') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Widgets Init Js -->
    <script src="{{ url('/') }}/assets/js/pages/crm-dashboard.init.js"></script>


    <!-- App js-->
    <script src="{{ url('/') }}/assets/js/app.js"></script>

</body>

</html>
