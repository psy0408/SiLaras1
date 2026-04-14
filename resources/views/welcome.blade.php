<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiLaras - Sistem Laporan Sarana Sekolah</title>
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
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Header */
        header {
            position: sticky;
            top: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.2rem 5%;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            z-index: 1000;
            animation: slideDown 0.6s ease;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            height: 40px;
        }

        nav {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        nav a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s;
        }

        nav a:hover::after {
            width: 100%;
        }

        .login-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white !important;
            padding: 0.7rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(91, 76, 219, 0.3);
        }

        .login-btn::after {
            display: none;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(91, 76, 219, 0.4);
        }

        /* Hero Section */
        .hero {
            min-height: 75vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #f8f9ff 0%, #e8ecff 100%);
            padding: 3rem 5%;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
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

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(180deg);
            }
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            animation: fadeInLeft 0.8s ease;
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-badge {
            display: inline-block;
            background: linear-gradient(135deg, #fff 0%, #f0f9ff 100%);
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--accent);
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(91, 76, 219, 0.15);
        }

        .hero-content h1 {
            font-family: 'Sora', sans-serif;
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.2rem;
            color: var(--primary);
        }

        .hero-content h1 .highlight {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 1.05rem;
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 2rem;
            max-width: 520px;
        }

        .cta-buttons {
            display: flex;
            gap: 1.2rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 8px 25px rgba(91, 76, 219, 0.35);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(91, 76, 219, 0.45);
        }

        .btn-secondary {
            background: white;
            color: var(--accent);
            padding: 1rem 2.5rem;
            border: 2px solid var(--accent);
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-3px);
        }

        /* Hero Illustration */
        .hero-visual {
            position: relative;
            animation: fadeInRight 0.8s ease;
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-image {
            position: relative;
            background: linear-gradient(135deg, rgba(91, 76, 219, 0.1) 0%, rgba(124, 111, 224, 0.1) 100%);
            border-radius: 30px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(91, 76, 219, 0.2);
        }

        .floating-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: absolute;
            animation: cardFloat 3s ease-in-out infinite;
        }

        @keyframes cardFloat {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .card-1 {
            top: 10%;
            right: -10%;
            animation-delay: 0s;
        }

        .card-2 {
            bottom: 15%;
            left: -10%;
            animation-delay: 1s;
        }

        /* Process Flow Section */
        .process-section {
            padding: 4rem 5%;
            background: white;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-family: 'Sora', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.8rem;
        }

        .section-subtitle {
            font-size: 1.05rem;
            color: #64748b;
        }

        .process-flow {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            position: relative;
            padding: 1.5rem 0;
        }

        /* Horizontal line connecting all steps */
        .process-flow::before {
            content: '';
            position: absolute;
            top: 60px;
            left: 12.5%;
            width: 75%;
            height: 2px;
            background: var(--accent);
            z-index: 0;
        }

        .process-step {
            text-align: center;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .process-step:nth-child(1) {
            animation-delay: 0.1s;
        }

        .process-step:nth-child(2) {
            animation-delay: 0.2s;
        }

        .process-step:nth-child(3) {
            animation-delay: 0.3s;
        }

        .process-step:nth-child(4) {
            animation-delay: 0.4s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .process-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 1.2rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            box-shadow: 0 15px 40px rgba(91, 76, 219, 0.3);
            position: relative;
            transition: transform 0.3s;
        }

        /* Dual result icon - split background */
        .process-icon.dual-result {
            background: linear-gradient(90deg, var(--success) 0%, var(--success) 50%, var(--danger) 50%, var(--danger) 100%);
        }

        .process-step:hover .process-icon {
            transform: scale(1.05) rotate(5deg);
        }

        .process-number {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 35px;
            height: 35px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: var(--accent);
            border: 3px solid var(--accent);
            font-family: 'Sora', sans-serif;
            font-size: 0.95rem;
        }

        .process-step h3 {
            font-family: 'Sora', sans-serif;
            font-size: 1.2rem;
            color: var(--primary);
            margin-bottom: 0.6rem;
            font-weight: 700;
        }

        .process-step p {
            color: #64748b;
            line-height: 1.5;
            font-size: 0.9rem;
        }

        /* FAQ Section */
        .faq-section {
            padding: 4rem 5%;
            background: linear-gradient(135deg, #f8f9ff 0%, #e8ecff 100%);
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            margin-bottom: 1.2rem;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .faq-item:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            padding: 1.5rem 1.8rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 1rem;
            color: var(--primary);
            transition: background 0.3s;
        }

        .faq-question:hover {
            background: #f8f9ff;
        }

        .faq-icon {
            font-size: 1.3rem;
            transition: transform 0.3s;
            color: var(--accent);
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
        }

        .faq-answer-content {
            padding: 0 1.8rem 1.5rem;
            color: #64748b;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* Features Section */
        .features-section {
            padding: 4rem 5%;
            background: white;
        }

        .features-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .feature-card {
            background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
            padding: 2rem;
            border-radius: 20px;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .feature-card:hover {
            border-color: var(--accent);
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(91, 76, 219, 0.15);
        }

        .feature-icon {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
            font-size: 2rem;
            box-shadow: 0 10px 30px rgba(91, 76, 219, 0.3);
        }

        .feature-card h3 {
            font-family: 'Sora', sans-serif;
            font-size: 1.2rem;
            color: var(--primary);
            margin-bottom: 0.8rem;
            font-weight: 700;
        }

        .feature-card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark) 0%, #0f172a 100%);
            color: white;
            padding: 3rem 5% 1.5rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-brand h3 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, white 0%, var(--accent-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-brand p {
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 1.3rem;
        }

        .social-link:hover {
            background: var(--accent);
            transform: translateY(-3px);
        }

        .footer-section h4 {
            font-family: 'Sora', sans-serif;
            font-size: 1.05rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.6rem;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--accent-light);
        }

        /* Footer Location */
        .footer-location {
            color: #94a3b8;
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .footer-location strong {
            color: white;
            display: block;
            margin-bottom: 0.5rem;
        }

        /* Footer Contact Info */
        .footer-contact-info {
            color: #94a3b8;
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .footer-contact-info strong {
            color: white;
            display: block;
            margin-bottom: 0.2rem;
            font-size: 0.95rem;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-content h1 {
                font-size: 3rem;
            }

            .hero-content p {
                margin: 0 auto 2.5rem;
            }

            .cta-buttons {
                justify-content: center;
            }

            .process-flow {
                grid-template-columns: 1fr;
                padding: 1rem 0;
            }

            .process-flow::before {
                display: none;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                text-align: center;
            }

            nav {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="nav-container">
            <div class="logo">
                <img src="{{ asset('images/logo-silaras.png') }}" alt="SiLaras Logo">
            </div>
            <nav>
                <a href="#features">Fitur</a>
                <a href="#process">Cara Kerja</a>
                <a href="#faq">FAQ</a>
                <a href="/about-w">Tentang Kami</a>
                <a href="/login" class="login-btn">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">✨ Sistem Laporan Sarana Terpercaya</div>
                <h1>Laporkan Masalah Sarana dengan <span class="highlight">SiLaras!</span></h1>
                <p>Platform digital yang memudahkan siswa melaporkan kerusakan sarana dan prasarana sekolah secara
                    cepat, efisien, dan terpantau.</p>
                <div class="cta-buttons">
                    <a href="/login" class="btn-primary">Buat Laporan Sekarang</a>
                    <a href="#process" class="btn-secondary">Pelajari Cara Kerja</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-image">
                    <svg width="100%" height="400" viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
                        <!-- Laptop -->
                        <rect x="120" y="150" width="260" height="180" rx="10" fill="#1a1f71"
                            opacity="0.9" />
                        <rect x="135" y="165" width="230" height="140" rx="5" fill="white" />

                        <!-- Screen content -->
                        <rect x="150" y="180" width="80" height="6" rx="3" fill="#5b4cdb" />
                        <rect x="150" y="195" width="120" height="4" rx="2" fill="#e5e7eb" />
                        <rect x="150" y="205" width="100" height="4" rx="2" fill="#e5e7eb" />

                        <!-- Checkmarks -->
                        <circle cx="155" cy="230" r="12" fill="#10b981" />
                        <path d="M 150 230 L 153 233 L 160 225" stroke="white" stroke-width="2" fill="none" />

                        <circle cx="155" cy="255" r="12" fill="#10b981" />
                        <path d="M 150 255 L 153 258 L 160 250" stroke="white" stroke-width="2" fill="none" />

                        <!-- Person -->
                        <circle cx="300" cy="110" r="30" fill="#1a1f71" />
                        <circle cx="290" cy="105" r="3" fill="white" />
                        <circle cx="310" cy="105" r="3" fill="white" />
                        <path d="M 290 115 Q 300 122 310 115" stroke="white" stroke-width="2" fill="none" />

                        <!-- Floating icons -->
                        <g opacity="0.6">
                            <circle cx="80" cy="100" r="20" fill="#5b4cdb" />
                            <text x="70" y="110" font-size="20" fill="white"></text>
                        </g>
                        <g opacity="0.6">
                            <circle cx="420" cy="80" r="20" fill="#5b4cdb" />
                            <text x="410" y="90" font-size="20" fill="white"></text>
                        </g>
                    </svg>
                </div>

                <!-- Floating Cards -->
                <div class="floating-card card-1">
                    <i class="fas fa-check-square"></i>
                    <div style="font-weight: 2000; color: var(--primary);">Lapor Mudah</div>
                </div>
                <div class="floating-card card-2">
                    <i class="fas fa-bolt"></i>
                    <div style="font-weight: 600; color: var(--primary);">Respon Cepat</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Flow Section -->
    <section class="process-section" id="process">
        <div class="section-header">
            <h2 class="section-title">Alur Proses Laporan</h2>
            <p class="section-subtitle">4 Langkah mudah dari laporan hingga penyelesaian</p>
        </div>

        <div class="process-flow">
            <div class="process-step">
                <div class="process-icon">
                    <div class="process-number">1</div>
                    <i class="fas fa-file-alt" style="color: white;"></i>
                </div>
                <h3>User Mengirim</h3>
                <p>Siswa membuat laporan melalui form digital dengan detail kerusakan dan foto bukti</p>
            </div>

            <div class="process-step">
                <div class="process-icon">
                    <div class="process-number">2</div>
                    <i class="fas fa-clock" style="color: white;"></i>
                </div>
                <h3>Admin Menerima</h3>
                <p>Tim admin menerima dan memverifikasi laporan yang masuk untuk diproses lebih lanjut</p>
            </div>

            <div class="process-step">
                <div class="process-icon">
                    <div class="process-number">3</div>
                    <i class="fas fa-tools" style="color: white;"></i>
                </div>
                <h3>Tim Memproses</h3>
                <p>Tim sarpras mengerjakan perbaikan sesuai tingkat kerusakan yang dilaporkan</p>
            </div>

            <div class="process-step">
                <div class="process-icon dual-result">
                    <div class="process-number">4</div>
                    <div class="result-icons">
                        <i class="fas fa-check-circle" style="color: white;"></i>
                        <i class="fas fa-times-circle" style="color: white;"></i>
                    </div>
                </div>
                <h3>Selesai / Ditolak</h3>
                <p>Laporan selesai diperbaiki atau ditolak dengan feedback lengkap dari admin</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="section-header">
            <h2 class="section-title">Kenapa Pilih SiLaras?</h2>
            <p class="section-subtitle">Fitur-fitur unggulan untuk kemudahan Anda</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-mobile-alt" style="color: white;"></i></div>
                <h3>Mudah Digunakan</h3>
                <p>Interface sederhana dan intuitif. Buat laporan hanya dalam beberapa menit dari perangkat apapun.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-bolt" style="color: white;"></i></div>
                <h3>Respon Cepat</h3>
                <p>Laporan langsung diterima tim. Proses verifikasi maksimal 24 jam untuk tindakan segera.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-broadcast-tower" style="color: white;"></i></div>
                <h3>Tracking Real-time</h3>
                <p>Pantau status laporan Anda dari pending hingga selesai dengan update transparan.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-comments" style="color: white;"></i></div>
                <h3>Feedback Admin</h3>
                <p>Terima notifikasi dan pesan dari admin tentang perkembangan laporan Anda.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-camera" style="color: white;"></i></div>
                <h3>Upload Foto Bukti</h3>
                <p>Sertakan foto untuk memperjelas kondisi kerusakan dan mempercepat proses.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-clipboard-list" style="color: white;"></i></div>
                <h3>Riwayat Lengkap</h3>
                <p>Akses semua laporan yang pernah dibuat dengan kategori status yang jelas.</p>
            </div>
        </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section" id="faq">
        <div class="section-header">
            <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
            <p class="section-subtitle">Temukan jawaban untuk pertanyaan Anda</p>
        </div>

        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Bagaimana cara membuat laporan yang benar?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Login ke akun Anda → Klik menu "Report" → Pilih kategori (Sarana/Prasarana) → Isi form dengan
                        lengkap (lokasi, jenis kerusakan, deskripsi detail) → Upload foto bukti kerusakan (opsional) →
                        Klik "Kirim Laporan". Pastikan semua informasi akurat untuk mempercepat proses.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Berapa lama laporan saya akan diproses?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Admin akan memverifikasi laporan maksimal 24 jam setelah diterima. Proses perbaikan tergantung
                        tingkat kerusakan: Ringan (1-2 hari), Sedang (3-5 hari), Berat (1-2 minggu). Anda akan menerima
                        update status secara berkala.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Apa perbedaan Sarana dan Prasarana?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <strong>Sarana:</strong> Barang bergerak seperti meja, kursi, AC, proyektor, komputer, printer,
                        lemari, dan peralatan lainnya.<br><br>
                        <strong>Prasarana:</strong> Bangunan dan infrastruktur seperti ruang kelas, toilet, gedung,
                        lantai, dinding, atap, pintu, jendela, dan lapangan.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Apakah saya bisa melihat riwayat laporan saya?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Ya! Klik menu "Riwayat" untuk melihat semua laporan Anda. Laporan dikategorikan berdasarkan
                        status: Diproses, Selesai, dan Ditolak. Anda juga dapat melihat feedback dari admin untuk setiap
                        laporan.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Mengapa laporan saya ditolak?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Laporan dapat ditolak karena: kerusakan masih dalam batas wajar, informasi tidak lengkap,
                        duplikasi laporan, atau bukan termasuk kategori sarana/prasarana. Admin akan memberikan feedback
                        lengkap tentang alasan penolakan di halaman riwayat Anda.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Apakah bisa melaporkan lebih dari satu kerusakan?</span>
                    <span class="faq-icon">▼</span>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Ya, Anda bisa membuat laporan terpisah untuk setiap kerusakan. Ini membantu tim admin memproses
                        setiap masalah dengan lebih fokus dan efisien. Tidak ada batasan jumlah laporan yang dapat
                        dibuat.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Brand -->
                <div class="footer-brand">
                    <div class="logo">
                        <img src="{{ asset('images/logo-silaras.png') }}" alt="SiLaras Logo">
                    </div>
                    <p>Sistem Laporan Sarana Sekolah yang memudahkan siswa melaporkan kerusakan fasilitas dengan cepat
                        dan efisien.</p>
                    <div class="social-links">
                        <a href="#" class="social-link" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="mailto:smkn1cs@gmail.com" class="social-link" title="Email"><i
                                class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h4><i class="fas fa-compass"></i> Navigasi</h4>
                    <ul class="footer-links">
                        <li><a href="/login">→ Masuk</a></li>
                        <li><a href="/about-w">→ Tentang Kami</a></li>
                        <li><a href="#features">→ Fitur</a></li>
                        <li><a href="#process">→ Cara Kerja</a></li>
                        <li><a href="#faq">→ FAQ</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Lokasi</h4>
                    <div class="footer-location">
                        <strong>SMK Negeri 1 Cisarua</strong>
                        Jl. Kolonel Masturi No.300, RT.04/RW.14<br>
                        Jambudipa, Kec. Cisarua<br>
                        Kabupaten Bandung Barat<br>
                        Jawa Barat 40551
                    </div>
                </div>

                <div class="footer-section">
                    <h4><i class="fas fa-headset"></i> Kontak</h4>
                    <div class="footer-contact-info">
                        <strong>Telepon:</strong>
                        (022) 876-678<br><br>
                        <strong>Email:</strong>
                        <a href="mailto:smkn1cs@gmail.com">smkn1cs@gmail.com</a><br><br>
                        <strong>Jam Operasional:</strong>
                        Senin - Jumat<br>
                        07:00 - 16:00 WIB
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© {{ date('Y') }} SiLaras - Sistem Laporan Sarana Sekolah. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const allItems = document.querySelectorAll('.faq-item');

            // Close all other items
            allItems.forEach(item => {
                if (item !== faqItem && item.classList.contains('active')) {
                    item.classList.remove('active');
                }
            });

            // Toggle current item
            faqItem.classList.toggle('active');
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
