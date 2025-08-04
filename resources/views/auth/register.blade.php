<!DOCTYPE html>
<html lang="id">

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
    <script src="{{ url('/') }}/assets/js/head.js"></script>
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        /* Ketika Input Fokut */
        .form-group input.form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
        }

        /* Form Error */
        .form-group input.form-control.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
        }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0 py-3 vh-100">
                <div class="col-md-4 mx-auto">
                    <div class="card overflow-hidden rounded-3 shadow-lg">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="mb-0 p-2 px-lg-5 py-4 col-lg-12 col-md-12">
                                    <div class="mb-0 border-0 p-md-4 p-lg-0">
                                        <div class="mb-4 p-0 text-lg-center text-center">
                                            <div class="auth-brand">
                                                <a href="index.html" class="logo logo-light">
                                                    <span class="logo-lg">
                                                        <img src="{{ url('/') }}/assets/images/logo-light.png"
                                                            alt="" height="68">
                                                    </span>
                                                </a>
                                                <a href="index.html" class="logo logo-dark">
                                                    <span class="logo-lg">
                                                        <img src="{{ url('/') }}/assets/images/logo-light.png"
                                                            alt="" height="68">
                                                    </span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="auth-title-section mb-3 text-lg-start text-center">
                                            <h3 class="text-dark fw-bold mb-0">
                                                Register
                                            </h3>
                                            <p class="text-muted fs-14 mb-0">
                                                Create your account to get started with
                                                {{ config('app.name') }}.
                                            </p>
                                        </div>

                                        <div class="pt-0">

                                            {{-- Registration Form --}}
                                            <form action="{{ url('/register') }}" method="POST" class="my-4">
                                                @csrf

                                                {{-- @dd($errors) --}}
                                                {{-- Name --}}
                                                <div class="form-group mb-2">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                        type="text" id="name" placeholder="Enter your name"
                                                        name="name" value="{{ old('name') }}" tabindex="1"
                                                        autofocus>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- Email --}}
                                                <div class="form-group mb-2">
                                                    <label for="emailaddress" class="form-label">Email
                                                        address</label>
                                                    <input class="form-control @error('email') is-invalid @enderror"
                                                        type="email" id="emailaddress" placeholder="Enter your email"
                                                        name="email" value="{{ old('email') }}" tabindex="2">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- Password --}}
                                                <div class="form-group mb-2">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input class="form-control @error('password') is-invalid @enderror"
                                                        type="password" id="password" placeholder="Enter your password"
                                                        name="password" value="{{ old('password') }}" tabindex="3">
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- Confirm Password --}}
                                                <div class="form-group mb-4">
                                                    <label for="password_confirmation" class="form-label">Confirm
                                                        Password</label>
                                                    <input class="form-control" type="password"
                                                        id="password_confirmation" placeholder="Confirm your password"
                                                        name="password_confirmation"
                                                        value="{{ old('password_confirmation') }}" tabindex="4">
                                                </div>

                                                {{-- Register Button --}}
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary fw-semibold" type="submit"
                                                                tabindex="5"> Register </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="text-center text-muted">
                                                <p class="mb-0">Already have an account? <a
                                                        class='text-primary  fw-medium'
                                                        href="{{ route('login') }}">Login</a></p>
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
    </div>

    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ url('/') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/feather-icons/feather.min.js"></script>


</body>

</html>
