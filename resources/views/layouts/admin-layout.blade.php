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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <!-- Icons -->
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="{{ url('/') }}/assets/js/head.js"></script>

    <style>
        table.table-borderless th {
            background-color: rgb(92, 105, 114) !important;
            color: white !important;
        }

        .input-group.is-invalid {
            border-color: #dc3545 !important;
            border-radius: 0.25rem !important;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
        }

        .form-control.is-invalid, .form-select.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
        }

        div.invalid-feedback {
            display: block;
        }

        .code-font {
            font-family: 'Courier New', Courier, monospace;
            font-size: 0.9rem;
            color: #d63384;
        }
    </style>


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
                            <h5 class="mb-0">
                                {{ auth()->user()->name ?? 'Admin' }}
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
        @include('layouts.components.sidebar-admin')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @yield('content')
            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> - Made by <a href="#!" class="fw-semibold text-danger">Batuah
                                Talenta Semesta</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
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
    {{-- <script src="{{ url('/') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script> --}}
    {{-- <script src="{{ url('/') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script> --}}
    <script src="{{ url('/') }}/assets/libs/feather-icons/feather.min.js"></script>

    <!-- Apexcharts JS -->
    {{-- <script src="{{ url('/') }}/assets/libs/apexcharts/apexcharts.min.js"></script> --}}

    <!-- Widgets Init Js -->
    {{-- <script src="{{ url('/') }}/assets/js/pages/crm-dashboard.init.js"></script> --}}


    <!-- App js-->
    <script src="{{ url('/') }}/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @yield('scripts')
    <script>
        $(document).ready(function() {
            // Remove invalid class when user starts typing
            $('.form-control.is-invalid').on('input', function() {
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').hide();
            });
            $('.form-control.is-invalid, .form-select.is-invalid').on('input change', function() {
                $(this).removeClass('is-invalid');
                $(this).closest('.input-group').removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').hide();
                $(this).closest('.input-group').siblings('.invalid-feedback').hide();
            });


        });
    </script>

    {{-- Menampilkan Error dan Success jika ada session --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-danger'
                }
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-success'
                }
            });
        </script>
    @endif

</body>

</html>
