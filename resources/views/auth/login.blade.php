<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Login Page | Hosting Batuah | Layanan ShareHosting --}}
    <meta charset="utf-8" />
    <title>Login | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Login to {{ config('app.name') }} - Secure access to your hosting account dashboard. Manage your websites, domains, and hosting services with our reliable platform." />
    <meta name="author" content="{{ config('app.name') }}" />
    <meta name="keywords"
        content="hosting login, web hosting, domain hosting, shared hosting, hosting panel, website management, {{ config('app.name') }}" />
    <meta name="robots" content="noindex, nofollow" />
    <meta property="og:title" content="Login | {{ config('app.name') }}" />
    <meta property="og:description"
        content="Secure login portal for {{ config('app.name') }} hosting services. Access your hosting dashboard and manage your websites." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Login | {{ config('app.name') }}" />
    <meta name="twitter:description" content="Access your {{ config('app.name') }} hosting account securely." />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ url('/') }}/assets/css/app.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ url('/') }}/assets/js/head.js"></script>


    <style>
        /* Ketika Input Fokut */
        .form-group input.form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
        }

        /* Form Error */
        .form-group input.form-control.is-invalid {
            border-color: #dc3545 !important;
            border-radius: 0.25rem !important;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
        }

        .bg-mesh-gradient {
            background-image: linear-gradient(to right bottom, #ffffff, #e4e4e7, #c9c9cf, #aeb0b8, #9397a2);
        }
    </style>


</head>

<body>
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0 px-3 py-3 vh-100">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="card overflow-hidden rounded-3 shadow-lg">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="mb-0 p-4 p-lg-5 col-lg-6 col-md-12">
                                            <div class="mb-0 border-0 p-md-4 p-lg-0">
                                                <div class="mb-4 p-0 text-lg-center text-center">
                                                    <div class="auth-brand">
                                                        <a href="{{ url('/') }}" class="logo logo-light">
                                                            <span class="logo-lg">
                                                                <img src="{{ url('/') }}/assets/images/logo-light.png"
                                                                    alt="" height="68">
                                                            </span>
                                                        </a>
                                                        <a href="{{ url('/') }}" class="logo logo-dark">
                                                            <span class="logo-lg">
                                                                <img src="{{ url('/') }}/assets/images/logo-light.png"
                                                                    alt="" height="68">
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="auth-title-section mb-4 text-lg-start text-center">
                                                    <h3 class="text-dark fw-bold mb-0">
                                                        Welcome to <span
                                                            class="text-danger">{{ config('app.name') }}</span>
                                                    </h3>
                                                    <p class="text-muted fs-14 mb-0">
                                                        Sign in to continue to {{ config('app.name') }}.
                                                    </p>
                                                </div>

                                                <div class="pt-0">

                                                    {{-- Login Form --}}
                                                    <form action="{{ url('/login') }}" method="POST" class="my-4">
                                                        @csrf

                                                        {{-- Email --}}
                                                        <div class="form-group mb-3">
                                                            <label for="emailaddress" class="form-label">Email
                                                                address</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"
                                                                    id="basic-addon1">@</span>
                                                                <input
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    type="email" id="emailaddress"
                                                                    placeholder="Enter your email" name="email"
                                                                    value="{{ old('email') }}" autofocus
                                                                    tabindex="1">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- Password --}}
                                                        <div class="form-group mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input class="form-control" type="password" id="password"
                                                                placeholder="Enter your password" name="password"
                                                                value="{{ old('password') }}" tabindex="2">
                                                        </div>

                                                        {{-- Remember Me & Forgot Password  --}}
                                                        <div class="form-group d-flex mb-3">
                                                            <div class="col-sm-6">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="checkbox-signin" checked
                                                                        name="remember_me">
                                                                    <label class="form-check-label"
                                                                        for="checkbox-signin">Remember me</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 text-end">
                                                                <a class='text-muted fs-14'
                                                                    href='auth-recoverpw.html'>Forgot password?</a>
                                                            </div>
                                                        </div>

                                                        {{-- Submit Button  --}}
                                                        <div class="form-group mb-0 row">
                                                            <div class="col-12">
                                                                <div class="d-grid">
                                                                    <button class="btn btn-primary fw-semibold"
                                                                        type="submit" tabindex="3"> Log In
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <div class="text-center text-muted">
                                                        <p class="mb-0">Don't have an account ?<a
                                                                class='text-primary ms-1 fw-medium'
                                                                href="{{ route('register') }}">Register</a></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-none d-lg-block p-0"
                                            style="background-color: #a6a6a6;">
                                            <img src="{{ url('/') }}/assets/images/promosi-hosting-1.png"
                                                alt="Hosting Batuah" class="w-100 h-100">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ url('/') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/feather-icons/feather.min.js"></script>

    <script>
        $(document).ready(function() {
            // Remove invalid class when user starts typing
            $('.form-control.is-invalid').on('input', function() {
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').hide();
            });
        });
    </script>
</body>

</html>
