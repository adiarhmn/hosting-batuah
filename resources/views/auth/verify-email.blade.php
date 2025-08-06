<!DOCTYPE html>
<html lang="id">

<head>
    {{-- Verify Email Page | Hosting Batuah | Layanan ShareHosting --}}
    <meta charset="utf-8" />
    <title>Verify Email | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Verify your email address for {{ config('app.name') }} - Complete your account setup to access your hosting dashboard and manage your websites securely." />
    <meta name="author" content="{{ config('app.name') }}" />
    <meta name="keywords"
        content="email verification, account verification, hosting account, web hosting, {{ config('app.name') }}, email confirm" />
    <meta name="robots" content="noindex, nofollow" />
    <meta property="og:title" content="Verify Email | {{ config('app.name') }}" />
    <meta property="og:description"
        content="Complete your {{ config('app.name') }} account verification by confirming your email address." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Verify Email | {{ config('app.name') }}" />
    <meta name="twitter:description"
        content="Verify your email to activate your {{ config('app.name') }} hosting account." />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ url('/') }}/assets/css/app.css" rel="stylesheet" type="text/css" id="app-style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Icons -->
    <script src="{{ url('/') }}/assets/js/head.js"></script>
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

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

        /* div.border-2.border-success {
            border: 3px solid #18b169 !important;
        } */

        /* Avatar Gradient Styles */
        .avatar-gradient {
            background: linear-gradient(135deg, #18b169 0%, #0d6efd 100%);
            border-radius: 50%;
            padding: 3px;
            position: relative;
            animation: gradientShift 3s ease-in-out infinite;
        }

        .avatar-gradient .avatar-title {
            background: white !important;
            position: relative;
            z-index: 1;
        }

        @keyframes gradientShift {
            0%, 100% {
                background: linear-gradient(135deg, #18b169 0%, #0d6efd 100%);
            }
            50% {
                background: linear-gradient(135deg, #0d6efd 0%, #18b169 100%);
            }
        }

        /* Icon Gradient Animation */
        .avatar-gradient .mdi-email-check {
            background: linear-gradient(135deg, #18b169 0%, #0d6efd 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: iconGradientShift 3s ease-in-out infinite;
        }

        @keyframes iconGradientShift {
            0%, 100% {
                background: linear-gradient(135deg, #18b169 0%, #0d6efd 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            50% {
                background: linear-gradient(135deg, #0d6efd 0%, #18b169 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
        }

        /* Button Gradient */
        button.btn.btn-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);
            border-color: #0d6efd;
            border-radius: 0.5rem;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        button.btn.btn-primary:hover {
            background: linear-gradient(135deg, #0056b3 0%, #003d82 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        button.btn.btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border-color: #6c757d;
            border-radius: 0.5rem;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        button.btn.btn-secondary:hover {
            background: linear-gradient(135deg, #495057 0%, #343a40 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
        }


        /* SweetAlert2 Custom Styles */
        div.swal2-popup.swal2-modal.swal2-show {
            border-radius: 1rem;
            font-family: 'Poppins', sans-serif;
            border: 2px solid #0d6efd;
        }

        div.swal2-popup.swal2-modal.swal2-show .swal2-title {
            color: #2c3e50;
            font-weight: 600;
            margin: 0;
        }

        div.swal2-popup.swal2-modal.swal2-show .swal2-html-container {
            color: #5a6c7d;
            padding: 0.5rem 0;
        }

        div.swal2-popup.swal2-modal.swal2-show button {
            background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);
            border-color: #0d6efd;
            border-radius: 0.5rem;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        div.swal2-popup.swal2-modal.swal2-show button:hover {
            background: linear-gradient(135deg, #0056b3 0%, #003d82 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        div.swal2-popup.swal2-modal.swal2-show .swal2-icon.swal2-success {
            border-color: #18b169;
            color: #18b169;
        }

        div.swal2-popup.swal2-modal.swal2-show .swal2-icon.swal2-success [class^="swal2-success-line"] {
            background-color: #18b169;
        }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('/') }}/assets/images/logo-light.png" alt="{{ config('app.name') }}"
                                height="65" class="mx-auto mb-3">
                        </a>
                    </div>

                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="avatar-lg mx-auto avatar-gradient">
                                    <div class="avatar-title rounded-circle bg-light border-2 border-success">
                                        <i class="mdi mdi-email-check h2 mb-0 text-success"></i>
                                    </div>
                                </div>
                                <h4 class="text-dark-50 text-center mt-3 fw-bold">Verify Your Email</h4>
                                <p class="text-muted mb-4">
                                    We have sent a verification link to your email address.
                                    Please check your email and click the verification link to activate your account.
                                </p>
                            </div>

                            <div class="mb-3">
                                <p class="text-muted small text-center">
                                    <i class="mdi mdi-clock-outline me-1"></i>
                                    Didn't receive the email? Check your spam folder.
                                </p>
                            </div>

                            <div class="d-grid gap-2">
                                <form method="POST">
                                    @csrf
                                    <button id="resend-verification" type="button" class="btn btn-primary w-100"
                                        tabindex="1">
                                        <i class="mdi mdi-send me-1"></i> Resend Verification Email
                                    </button>
                                </form>

                                <form>
                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                    <button type="submit" class="btn btn-secondary w-100">
                                        <i class="mdi mdi-arrow-left me-1"></i> Already verified? Go back
                                    </button>
                                </form>
                            </div>

                            @if (session('message'))
                                <div class="alert alert-success mt-3" role="alert">
                                    <i class="mdi mdi-check-circle me-2"></i>
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END wrapper -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resendBtn = document.getElementById('resend-verification');
            let timeLeft = 60;
            let countdownTimer;

            function startCountdown() {
                resendBtn.disabled = true;
                resendBtn.innerHTML = '<i class="mdi mdi-timer me-1"></i> Wait ' + timeLeft +
                    ' seconds to resend again';

                countdownTimer = setInterval(function() {
                    timeLeft--;
                    resendBtn.innerHTML = '<i class="mdi mdi-timer me-1"></i> Wait ' + timeLeft +
                        ' seconds to resend again';

                    if (timeLeft <= 0) {
                        clearInterval(countdownTimer);
                        resendBtn.disabled = false;
                        resendBtn.innerHTML =
                            '<i class="mdi mdi-send me-1"></i> Resend Verification Email';
                        timeLeft = 60;
                    }
                }, 1000);
            }

            function sendVerificationEmail() {
                // You can replace this with an actual AJAX request to your backend
                fetch('/api/send-verification-email', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            email: '{{ auth()->user()->email }}'
                        })
                    })
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        Swal.fire({
                            icon: 'success',
                            title: "Success",
                            text: data.message,
                        });
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: "Error",
                            text: error.message,
                        });
                    });
            }

            // Start countdown immediately when page loads
            startCountdown();
            // sendVerificationEmail();

            // Start countdown when button is clicked
            resendBtn.addEventListener('click', function() {
                setTimeout(startCountdown, 100);
                setTimeout(function() {
                    sendVerificationEmail();
                }, 1000);
            });
        });
    </script>

    <!-- Vendor -->
    <script src="{{ url('/') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/feather-icons/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
