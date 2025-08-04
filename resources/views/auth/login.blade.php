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
    <link href="{{ url('/') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ url('/') }}/assets/js/head.js"></script>


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

                                                <div class="auth-title-section mb-4 text-lg-start text-center">
                                                    <h3 class="text-dark fw-semibold mb-0">
                                                        Welcome Back
                                                    </h3>
                                                    <p class="text-muted fs-14 mb-0">
                                                        Sign in to continue to {{ config('app.name') }}.
                                                    </p>
                                                </div>

                                                <div class="pt-0">
                                                    <form action="index.html" class="my-4">
                                                        <div class="form-group mb-3">
                                                            <label for="emailaddress" class="form-label">Email
                                                                address</label>
                                                            <input class="form-control" type="email" id="emailaddress"
                                                                required="" placeholder="Enter your email">
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input class="form-control" type="password" required=""
                                                                id="password" placeholder="Enter your password">
                                                        </div>

                                                        <div class="form-group d-flex mb-3">
                                                            <div class="col-sm-6">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="checkbox-signin" checked>
                                                                    <label class="form-check-label"
                                                                        for="checkbox-signin">Remember me</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 text-end">
                                                                <a class='text-muted fs-14'
                                                                    href='auth-recoverpw.html'>Forgot password?</a>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-0 row">
                                                            <div class="col-12">
                                                                <div class="d-grid">
                                                                    <button class="btn btn-primary fw-semibold"
                                                                        type="submit"> Log In </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <div class="text-center text-muted">
                                                        <p class="mb-0">Don't have an account ?<a
                                                                class='text-primary ms-2 fw-medium'
                                                                href='auth-register.html'>Sing up</a></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-none d-lg-block">
                                            <img src="{{ url('/') }}/assets/images/promosi-hosting-1.png"
                                                alt="Hosting Batuah" class="img-fluid h-100">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-7 d-none d-xl-inline-block">
                    <div class="account-page-bg rounded-4">
                        <div class="auth-user-review text-center">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <p class="prelead mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179m10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179" />
                                            </svg>
                                            With Untitled, your support process can be as enjoyable as your product.
                                            With it's this easy, customers keep coming back.
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M19.417 6.679C20.447 7.773 21 9 21 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.248-5.621c-.537.278-1.24.375-1.93.311c-1.804-.167-3.226-1.648-3.226-3.489a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179m-10 0C10.447 7.773 11 9 11 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621c-.537.278-1.24.375-1.929.311C4.591 12.323 3.17 10.842 3.17 9a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179" />
                                            </svg>
                                        </p>
                                        <h4 class="mb-1">Camilla Johnson</h4>
                                        <p class="mb-0">Software Developer</p>
                                    </div>

                                    <div class="carousel-item">
                                        <p class="prelead mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179m10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179" />
                                            </svg>
                                            Pretty nice theme, hoping you guys could add more features to this. Keep up
                                            the good work.
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M19.417 6.679C20.447 7.773 21 9 21 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.248-5.621c-.537.278-1.24.375-1.93.311c-1.804-.167-3.226-1.648-3.226-3.489a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179m-10 0C10.447 7.773 11 9 11 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621c-.537.278-1.24.375-1.929.311C4.591 12.323 3.17 10.842 3.17 9a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179" />
                                            </svg>
                                        </p>
                                        <h4 class="mb-1">Palak Awoo</h4>
                                        <p class="mb-0">Lead Designer</p>
                                    </div>

                                    <div class="carousel-item">
                                        <p class="prelead mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179m10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179" />
                                            </svg>
                                            This is a great product, helped us a lot and very quick to work with and
                                            implement.
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M19.417 6.679C20.447 7.773 21 9 21 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.248-5.621c-.537.278-1.24.375-1.93.311c-1.804-.167-3.226-1.648-3.226-3.489a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179m-10 0C10.447 7.773 11 9 11 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621c-.537.278-1.24.375-1.929.311C4.591 12.323 3.17 10.842 3.17 9a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179" />
                                            </svg>
                                        </p>
                                        <h4 class="mb-1">Laurent Smith</h4>
                                        <p class="mb-0">Product designer</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
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

    <!-- App js-->
    <script src="{{ url('/') }}/assets/js/app.js"></script>

</body>

</html>
