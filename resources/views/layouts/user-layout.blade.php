<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Hando - Responsive Admin Dashboard Template</title>
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
                            <h5 class="mb-0">Selamat Datang Admin</h5>
                        </li>
                    </ul>

                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <li class="d-none d-lg-block">
                            <form class="app-search d-none d-md-block me-auto">
                                <div class="position-relative topbar-search">
                                    <input type="text" class="form-control ps-4" placeholder="Search..." />
                                    <i
                                        class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                                </div>
                            </form>
                        </li>

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

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i data-feather="bell" class="noti-icon"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end"><a href="" class="text-dark"><small>Clear
                                                    All</small></a></span>Notification
                                    </h5>
                                </div>

                                <div class="noti-scroll" data-simplebar>
                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary active">
                                        <div class="notify-icon">
                                            <img src="{{ url('/') }}/assets/images/users/user-12.jpg"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Carl Steadham</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Improve workflow in
                                                    Figma</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ url('/') }}/assets/images/users/user-2.jpg"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Olivia McGuire</p>
                                                <small class="text-muted">1 min ago</small>
                                            </div>

                                            <div class="d-flex mt-2 align-items-center">
                                                <div class="notify-sub-icon">
                                                    <i class="mdi mdi-download-box text-dark"></i>
                                                </div>

                                                <div>
                                                    <p class="notify-details mb-0">dark-themes.zip</p>
                                                    <small class="text-muted">2.4 MB</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ url('/') }}/assets/images/users/user-3.jpg"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Travis Williams</p>
                                                <small class="text-muted">7 min ago</small>
                                            </div>
                                            <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2">
                                                <span class="text-primary">@Patryk</span> Please make sure that
                                                you're....
                                            </p>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ url('/') }}/assets/images/users/user-8.jpg"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Violette Lasky</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Create new
                                                    components</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ url('/') }}/assets/images/users/user-5.jpg"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Ralph Edwards</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed<span class="text-reset">Improve workflow
                                                    in React</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ url('/') }}/assets/images/users/user-6.jpg"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Jocab jones</p>
                                                <small class="text-muted">7 min ago</small>
                                            </div>
                                            <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2">
                                                <span class="text-reset">@Patryk</span> Please make sure that
                                                you're....
                                            </p>
                                        </div>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary notify-item notify-all">View all
                                    <i class="fe-arrow-right"></i>
                                </a>
                            </div>
                        </li>

                        <!-- User Dropdown -->
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ url('/') }}/assets/images/users/user-13.jpg" alt="user-image"
                                    class="rounded-circle" />
                                <span class="pro-user-name ms-1">Alex <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="pages-profile.html" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="auth-lock-screen.html" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="auth-logout.html" class="dropdown-item notify-item">
                                    <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
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

                        <li class="menu-title mt-2">Menu</li>

                        <li>
                            <a href="{{ url('/') }}" class="tp-link">
                                <i data-feather="home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Data Master</li>

                        {{-- Customer Menu --}}
                        <li>
                            <a href="{{ url('admin/customers') }}" class="tp-link">
                                <i data-feather="users"></i>
                                <span> Customers </span>
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
