<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SiLaras</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a1f71;
            --primary-light: #2d3699;
            --accent: #5b4cdb;
            --accent-light: #7c6fe0;
            --success: #10b981;
            --danger: #ef4444;
            --dark: #1f2937;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9ff 0%, #e8ecff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        /* Animated background circles */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(91, 76, 219, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 20s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(91, 76, 219, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 15s ease-in-out infinite reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(180deg);
            }
        }

        .login-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        /* Left side - Branding */
        .login-brand {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-brand::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .login-brand::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -30%;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
        }

        .brand-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .brand-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .brand-logo img {
            height: 90px;
            width: auto;
            object-fit: contain;
            padding: 10px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);

        }

        .brand-tagline {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .feature-icon {
            font-size: 1.5rem;
        }

        .feature-text {
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Right side - Form */
        .login-form-container {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 100vh;
            overflow-y: auto;
        }

        .form-header {
            margin-bottom: 2rem;
        }

        .form-title {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Error Alert */
        .error-alert {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border: 1px solid #fca5a5;
            border-radius: 12px;
            padding: 1rem 1.2rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-alert i {
            color: #dc2626;
            font-size: 1.2rem;
            margin-top: 0.1rem;
        }

        .error-content {
            flex: 1;
        }

        .error-title {
            font-weight: 700;
            color: #991b1b;
            margin-bottom: 0.3rem;
            font-size: 0.95rem;
        }

        .error-message {
            color: #991b1b;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Forgot Password Alert */
        .forgot-password-alert {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 2px solid #fbbf24;
            border-radius: 12px;
            padding: 1.2rem;
            margin-bottom: 1.5rem;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(251, 191, 36, 0.4);
            }

            50% {
                transform: scale(1.02);
                box-shadow: 0 0 0 8px rgba(251, 191, 36, 0);
            }
        }

        .forgot-password-alert:hover {
            animation: none;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3);
            transition: all 0.3s;
        }

        .forgot-password-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .forgot-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .forgot-text {
            flex: 1;
        }

        .forgot-title {
            font-weight: 700;
            color: #92400e;
            margin-bottom: 0.3rem;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .forgot-message {
            color: #78350f;
            font-size: 0.85rem;
            margin-bottom: 0.8rem;
            line-height: 1.5;
        }

        .contact-admin-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: white;
            text-decoration: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.3);
        }

        .contact-admin-btn:hover {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            transform: translateX(3px);
            box-shadow: 0 6px 16px rgba(251, 191, 36, 0.4);
        }

        .contact-admin-btn i {
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark);
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s;
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(91, 76, 219, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .login-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            margin-top: 0.5rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 8px 20px rgba(91, 76, 219, 0.3);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(91, 76, 219, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #64748b;
        }

        .back-link a {
            color: var(--accent);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .back-link a:hover {
            color: var(--primary);
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }

            .login-brand {
                padding: 2rem;
                min-height: 250px;
            }

            .brand-logo {
                font-size: 2.5rem;
            }

            .brand-features {
                display: none;
            }

            .login-form-container {
                padding: 2rem;
            }

            .form-title {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }

            .login-form-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <!-- Left Side - Branding -->
        <div class="login-brand">
            <div class="brand-content">
                <div class="brand-logo">
                    <img src="{{ asset('images/logo-silaras-putih.png') }}" alt="SiLaras Logo">
                </div>
                <p class="brand-tagline">Sistem Laporan Sarana Sekolah yang memudahkan siswa melaporkan kerusakan
                    fasilitas dengan cepat dan efisien</p>

                <div class="brand-features">
                    <div class="feature-item">
                        <i class="fas fa-bolt"></i>
                        <div class="feature-text">Respon Cepat 24 Jam</div>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-broadcast-tower"></i>
                        <div class="feature-text">Tracking Real-time</div>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-square"></i>
                        <div class="feature-text">Proses Transparan</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="login-form-container">
            <div class="form-header">
                <h1 class="form-title">Selamat Datang!</h1>
                <p class="form-subtitle">Masuk ke akun Anda untuk melanjutkan</p>
            </div>

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="error-alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="error-content">
                        <div class="error-title">Login Gagal!</div>
                        <div class="error-message">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                            @if (session('login_attempts'))
                                <br><small>Percobaan ke-{{ session('login_attempts') }} dari 3</small>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Forgot Password Alert (Show after 3 failed attempts) -->
            @if (session('show_forgot_password'))
                <div class="forgot-password-alert">
                    <div class="forgot-password-content">
                        <div class="forgot-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="forgot-text">
                            <div class="forgot-title">
                                <i class="fas fa-info-circle"></i>
                                Lupa Password?
                            </div>
                            <div class="forgot-message">
                                Anda telah gagal login 3 kali. Jika lupa password, silakan hubungi admin untuk bantuan
                                reset password.
                            </div>
                            <a href="{{ route('contact.admin') }}" class="contact-admin-btn">
                                <i class="fas fa-headset"></i>
                                Hubungi Admin
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="nama@google.com"
                        value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-input"
                        placeholder="Masukkan username" value="{{ old('username') }}" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="••••••••"
                        required>
                </div>

                <button type="submit" class="login-btn">
                    Masuk ke Dashboard
                </button>

                <div class="back-link">
                    Tidak jadi Login? <a href="/">Kembali ke Halaman Utama</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
