<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .header {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20" fill="none"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="0.5"/></pattern></defs><rect width="100" height="20" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .logo-container {
            position: relative;
            z-index: 2;
        }

        .logo {
            max-width: 180px;
            height: auto;
            margin-bottom: 15px;
        }

        .company-name {
            color: #ffffff;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .tagline {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin-top: 8px;
            font-weight: 300;
        }

        .content {
            padding: 40px 30px;
            background-color: #ffffff;
        }

        .title {
            color: #1a1a1a;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .subtitle {
            color: #666;
            font-size: 16px;
            text-align: center;
            margin-bottom: 30px;
        }

        .message {
            color: #444;
            font-size: 16px;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .verification-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid #dc2626;
            border-radius: 10px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .btn-container {
            margin: 25px 0;
        }

        .btn {
            display: inline-block;
            padding: 15px 35px;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .url-section {
            background-color: #f8f9fa;
            border-left: 4px solid #dc2626;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
        }

        .url-text {
            font-size: 12px;
            color: #666;
            margin-bottom: 8px;
        }

        .url-link {
            word-break: break-all;
            color: #dc2626;
            font-family: 'Courier New', monospace;
            font-size: 13px;
            background-color: #ffffff;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #e9ecef;
        }

        .security-notice {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 15px;
            margin: 25px 0;
        }

        .security-notice .icon {
            color: #856404;
            font-weight: bold;
            margin-right: 8px;
        }

        .security-text {
            color: #856404;
            font-size: 14px;
        }

        .footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 20px;
        }

        .footer-links {
            margin: 15px 0;
        }

        .footer-links a {
            color: #dc2626;
            text-decoration: none;
            margin: 0 15px;
            font-size: 14px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .copyright {
            font-size: 12px;
            color: #999;
            border-top: 1px solid #444;
            padding-top: 20px;
            margin-top: 20px;
        }

        .hosting-badge {
            display: inline-block;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
        }

        .logo-container .logo {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="logo-container">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="{{ config('app.name') }} Logo"
                    class="logo">
                <div class="company-name">{{ config('app.name') }}</div>
                <div class="tagline">Professional Hosting Services</div>
                <div class="hosting-badge">Premium Hosting</div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <h1 class="title">Verify Your Email Address</h1>
            <p class="subtitle">Complete your account setup to get started</p>

            <p class="message">Hello <strong>{{ $data->name ?? 'User' }}</strong>,</p>
            <p class="message">Thank you for choosing our hosting services. To ensure the security of your account and
                complete your registration, please verify your email address.</p>

            <div class="verification-section">
                <h3 style="color: #dc2626; margin-bottom: 15px;">🔐 Account Verification Required</h3>
                <p style="margin-bottom: 20px; color: #666;">Click the button below to verify your email address and
                    activate your hosting account:</p>

                <div class="btn-container">
                    <a href="{{ $url }}" class="btn">Verify Email Address</a>
                </div>
            </div>

            <div class="url-section">
                <p class="url-text">If the button doesn't work, copy and paste this link into your browser:</p>
                <div class="url-link">{{ $url }}</div>
            </div>

            <div class="security-notice">
                <p class="security-text">
                    <span class="icon">⚠️</span>
                    <strong>Security Notice:</strong> This verification link will expire in 24 hours. If you didn't
                    create an account with us, please ignore this email.
                </p>
            </div>

            <p class="message">Once verified, you'll have access to our hosting control panel and can start deploying
                your websites immediately.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <h4 style="margin-bottom: 15px;">{{ config('app.name') }}</h4>
                <p style="font-size: 14px; margin-bottom: 15px;">Reliable hosting solutions for your digital presence
                </p>

                <div class="footer-links">
                    <a href="#">Support Center</a>
                    <a href="#">Control Panel</a>
                    <a href="#">Documentation</a>
                    <a href="#">Contact Us</a>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                <p style="margin-top: 8px;">This is an automated message from our hosting platform. Please do not reply
                    to this email.</p>
            </div>
        </div>
    </div>
</body>

</html>
