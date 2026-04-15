<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tentang Kami - SiLaras</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1e1b4b;
            --primary-dark: #0f0b3d;
            --primary-light: #2e2a6b;
            --secondary: #4f46e5;
            --secondary-light: #6366f1;
            --accent: #8b5cf6;
            --success: #10b981;
            --success-light: #d1fae5;
            --warning: #f59e0b;
            --warning-light: #fef3c7;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --info: #3b82f6;
            --info-light: #dbeafe;
            --dark: #0f172a;
            --light: #f8fafc;
            --gray-50: #f9fafb;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --shadow-colored: 0 4px 20px rgba(79, 70, 229, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f6f7ff 0%, #edf0ff 100%);
            min-height: 100vh;
            color: var(--gray-800);
            line-height: 1.6;
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
        .hero-about {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 80%, var(--accent) 100%);
            color: white;
            padding: 6rem 5%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-about::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            animation: float 20s infinite ease-in-out;
        }

        .hero-about::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            animation: float 15s infinite ease-in-out reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .hero-about h1 {
            font-family: 'Sora', sans-serif;
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            font-weight: 800;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.8s ease;
        }

        .hero-about p {
            font-size: 1.3rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.95;
            line-height: 1.8;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.8s ease 0.2s backwards;
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

        /* Content */
        .content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 5rem 5% 4rem;
        }

        .about-section {
            background: white;
            border-radius: 28px;
            padding: 3.5rem;
            margin-bottom: 3rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .about-section h2 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 2.2rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 700;
        }

        .about-section h2::before {
            content: '';
            width: 5px;
            height: 50px;
            background: linear-gradient(180deg, var(--secondary) 0%, var(--accent) 100%);
            border-radius: 3px;
        }

        .about-section p {
            color: var(--gray-600);
            line-height: 1.9;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .about-section ul {
            color: var(--gray-600);
            line-height: 1.9;
            font-size: 1.05rem;
            margin-left: 2rem;
            margin-bottom: 1.5rem;
        }

        .about-section li {
            margin-bottom: 1rem;
            position: relative;
            padding-left: 0.5rem;
        }

        .about-section li strong {
            color: var(--primary);
            font-weight: 700;
        }

        /* Mission & Vision Grid */
        .mission-vision {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2.5rem;
            margin-bottom: 3rem;
        }

        .mission-card,
        .vision-card {
            background: white;
            border-radius: 28px;
            padding: 3rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .mission-card::before,
        .vision-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--secondary), var(--accent));
        }

        .mission-card:hover,
        .vision-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--secondary);
        }

        .mission-card h3,
        .vision-card h3 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 700;
        }

        .icon {
            font-size: 3rem;
        }

        .mission-card p,
        .vision-card p {
            color: var(--gray-600);
            line-height: 1.8;
            font-size: 1.1rem;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            margin-top: 2.5rem;
        }

        .team-card {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
            transition: all 0.3s;
        }

        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--secondary);
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border-radius: 50%;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: white;
            box-shadow: var(--shadow-colored);
            transition: all 0.3s;
        }

        .team-card:hover .team-avatar {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 40px rgba(79, 70, 229, 0.4);
        }

        .team-card h4 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 1.4rem;
            margin-bottom: 0.8rem;
            font-weight: 700;
        }

        .team-card p {
            color: var(--gray-500);
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Values Section */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .value-item {
            background: white;
            text-align: center;
            padding: 2.5rem 2rem;
            border-radius: 24px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
            transition: all 0.3s;
        }

        .value-item:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--secondary);
        }

        .value-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.8rem;
            font-size: 3rem;
            color: white;
            box-shadow: var(--shadow-colored);
            transition: all 0.3s;
        }

        .value-item:hover .value-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 40px rgba(79, 70, 229, 0.4);
        }

        .value-item h4 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 1.4rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .value-item p {
            color: var(--gray-500);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* Contact Section */
        .contact-info {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            padding: 2rem;
            border-radius: 20px;
            margin-top: 2rem;
            border-left: 5px solid var(--secondary);
        }

        .contact-info p {
            color: var(--gray-700);
            font-size: 1.1rem;
            line-height: 2;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .contact-info strong {
            color: var(--primary);
            font-weight: 700;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark) 0%, #1a1b3b 100%);
            color: white;
            padding: 4rem 5% 2rem;
            margin-top: 4rem;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, rgba(79, 70, 229, 0) 70%);
            border-radius: 50%;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1.2fr 1.2fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand h3 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, white 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .footer-brand p {
            color: var(--gray-400);
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 1.2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-link:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }

        .footer-section h4 {
            font-family: 'Sora', sans-serif;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--gray-400);
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--secondary-light);
            transform: translateX(5px);
        }

        .footer-links a i {
            font-size: 0.8rem;
            opacity: 0;
            transition: all 0.3s;
        }

        .footer-links a:hover i {
            opacity: 1;
        }

        .footer-location {
            color: var(--gray-400);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .footer-location strong {
            color: white;
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .footer-contact-info {
            color: var(--gray-400);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .footer-contact-info strong {
            color: white;
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .footer-contact-info a {
            color: var(--secondary-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-contact-info a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            color: white;
            border: none;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: var(--shadow-colored);
        }

        .mobile-nav {
            display: none;
        }

        /* Responsive */
        @media (max-width: 968px) {
            nav {
                display: none;
            }

            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mobile-nav.active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                padding: 1.5rem;
                box-shadow: var(--shadow-lg);
                border-bottom: 1px solid var(--gray-200);
                animation: slideDown 0.3s ease;
                z-index: 1000;
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

            .mobile-nav a {
                padding: 1rem;
                color: var(--gray-700);
                text-decoration: none;
                font-weight: 600;
                border-radius: 12px;
                transition: all 0.3s;
                display: flex;
                align-items: center;
                gap: 0.8rem;
            }

            .mobile-nav a:hover,
            .mobile-nav a.active {
                background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
                color: var(--secondary);
            }

            .hero-about h1 {
                font-size: 2.5rem;
            }

            .hero-about p {
                font-size: 1.1rem;
            }

            .about-section {
                padding: 2.5rem;
            }

            .about-section h2 {
                font-size: 1.8rem;
            }

            .mission-vision {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .social-links {
                justify-content: center;
            }

            .footer-section {
                text-align: center;
            }

            .footer-links a {
                justify-content: center;
            }
        }

        @media (max-width: 640px) {
            .hero-about {
                padding: 4rem 5%;
            }

            .hero-about h1 {
                font-size: 2rem;
            }

            .hero-about p {
                font-size: 1rem;
            }

            .about-section {
                padding: 2rem;
            }

            .about-section h2 {
                font-size: 1.5rem;
            }

            .content {
                padding: 3rem 1rem 2rem;
            }

            .mission-card,
            .vision-card {
                padding: 2rem;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .slide-up {
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="nav-container">
            <div class="logo">
                <img src="{{ asset('images/logo-silaras.png') }}" alt="SiLaras Logo">
            </div>
            <nav>
                <a href="/">Kembali</a>
                <a href="/login" class="login-btn">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-about">
        <h1>Tentang SiLaras</h1>
        <p>Sistem Laporan Sarana Sekolah yang memudahkan siswa untuk melaporkan masalah infrastruktur dan sarana sekolah dengan cepat, mudah, dan transparan</p>
    </section>

    <!-- Content -->
    <div class="content">
        <!-- What is SiLaras -->
        <div class="about-section">
            <h2>Apa itu SiLaras?</h2>
            <p>
                SiLaras (Sistem Laporan Sarana Sekolah) adalah platform digital yang dirancang khusus untuk memfasilitasi pelaporan masalah sarana dan prasarana sekolah. Dengan SiLaras, siswa dapat dengan mudah melaporkan berbagai permasalahan yang ditemui di lingkungan sekolah, mulai dari kerusakan fasilitas kelas, masalah sanitasi, hingga kebutuhan perbaikan infrastruktur lainnya.
            </p>
            <p>
                Platform ini hadir sebagai solusi modern untuk meningkatkan komunikasi antara siswa dan pihak sekolah dalam hal pemeliharaan dan perbaikan fasilitas. Dengan sistem yang terstruktur dan transparan, setiap laporan dapat ditindaklanjuti dengan lebih cepat dan efisien, menciptakan lingkungan belajar yang lebih baik untuk semua.
            </p>
        </div>

        <!-- Mission & Vision -->
        <div class="mission-vision">
            <div class="mission-card">
                <h3><span class="icon">🎯</span> Misi Kami</h3>
                <p>
                    Menyediakan platform yang mudah digunakan untuk melaporkan masalah sarana sekolah, memastikan setiap laporan ditangani dengan cepat dan transparan, serta menciptakan lingkungan sekolah yang lebih baik dan nyaman untuk semua warga sekolah.
                </p>
            </div>
            <div class="vision-card">
                <h3><span class="icon">👁️</span> Visi Kami</h3>
                <p>
                    Menjadi sistem pelaporan sarana sekolah terdepan yang membantu menciptakan lingkungan belajar yang kondusif, aman, dan nyaman bagi seluruh siswa melalui teknologi yang inovatif dan mudah diakses.
                </p>
            </div>
        </div>

        <!-- Features -->
        <div class="about-section">
            <h2>Fitur Unggulan</h2>
            <ul>
                <li><strong>Pelaporan Mudah:</strong> Interface yang intuitif memudahkan siswa untuk membuat laporan dalam hitungan detik tanpa kesulitan.</li>
                <li><strong>Tracking Real-time:</strong> Pantau status laporan Anda dari mulai diajukan hingga selesai ditangani dengan transparansi penuh.</li>
                <li><strong>Upload Foto:</strong> Sertakan foto sebagai bukti untuk memperjelas masalah yang dilaporkan dan mempercepat proses verifikasi.</li>
                <li><strong>Riwayat Lengkap:</strong> Lihat riwayat dan status semua laporan yang pernah Anda buat dalam satu dashboard yang rapi.</li>
                <li><strong>Sistem Prioritas:</strong> Laporan diprioritaskan berdasarkan tingkat urgensi untuk penanganan yang lebih efektif.</li>
                <li><strong>Notifikasi Update:</strong> Dapatkan pemberitahuan setiap ada perubahan status atau feedback dari admin.</li>
            </ul>
        </div>

        <!-- Values -->
        <div class="about-section">
            <h2>Nilai-nilai Kami</h2>
            <div class="values-grid">
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-eye"></i></div>
                    <h4>Transparansi</h4>
                    <p>Semua proses pelaporan bersifat terbuka dan dapat dilacak oleh pelapor untuk akuntabilitas maksimal</p>
                </div>
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-bolt"></i></div>
                    <h4>Responsif</h4>
                    <p>Komitmen untuk merespons setiap laporan dengan cepat dan tepat demi kepuasan pengguna</p>
                </div>
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-smile"></i></div>
                    <h4>Kemudahan</h4>
                    <p>Antarmuka yang user-friendly untuk pengalaman terbaik tanpa perlu pelatihan khusus</p>
                </div>
                <div class="value-item">
                    <div class="value-icon"><i class="fas fa-shield-alt"></i></div>
                    <h4>Keamanan</h4>
                    <p>Data dan privasi pengguna terjaga dengan sistem keamanan terbaik dan enkripsi tingkat tinggi</p>
                </div>
            </div>
        </div>

        <!-- How it Works -->
        <div class="about-section">
            <h2>Cara Kerja SiLaras</h2>
            <ul>
                <li><strong>1. Login:</strong> Masuk menggunakan akun sekolah yang telah diberikan untuk keamanan akun Anda.</li>
                <li><strong>2. Pilih Kategori:</strong> Pilih apakah masalah termasuk kategori Sarana (barang bergerak) atau Prasarana (infrastruktur).</li>
                <li><strong>3. Buat Laporan:</strong> Isi detail lengkap mengenai masalah yang ditemukan, termasuk lokasi, tingkat kerusakan, dan deskripsi.</li>
                <li><strong>4. Upload Foto:</strong> Tambahkan foto bukti kerusakan untuk memperjelas laporan dan mempercepat proses verifikasi.</li>
                <li><strong>5. Submit & Track:</strong> Kirim laporan dan pantau statusnya secara real-time melalui dashboard riwayat laporan.</li>
                <li><strong>6. Feedback Admin:</strong> Terima feedback atau update dari admin mengenai progress penanganan masalah.</li>
            </ul>
        </div>

        <!-- Team -->
        <div class="about-section">
            <h2>Tim Pengembang</h2>
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-avatar"><i class="fas fa-code"></i></div>
                    <h4>Tim Developer</h4>
                    <p>Mengembangkan platform dengan teknologi Laravel, PHP, dan JavaScript terkini untuk performa optimal.</p>
                </div>
                <div class="team-card">
                    <div class="team-avatar"><i class="fas fa-paint-brush"></i></div>
                    <h4>Tim Designer</h4>
                    <p>Menciptakan pengalaman pengguna yang menarik dan user-friendly dengan desain modern dan intuitif.</p>
                </div>
                <div class="team-card">
                    <div class="team-avatar"><i class="fas fa-chart-bar"></i></div>
                    <h4>Tim Analyst</h4>
                    <p>Menganalisis data dan meningkatkan sistem berdasarkan feedback pengguna untuk layanan terbaik.</p>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="about-section">
            <h2>Hubungi Kami</h2>
            <p>
                Memiliki pertanyaan, saran, atau mengalami kendala? Tim kami siap membantu Anda! Jangan ragu untuk menghubungi kami melalui:
            </p>
            <div class="contact-info">
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> smkn1cs@gmail.com</p>
                <p><i class="fab fa-whatsapp"></i> <strong>WhatsApp:</strong> +62 812-3456-7890</p>
                <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> Gedung Administrasi Sekolah, Ruang IT SMKN 1 Cisarua</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Brand -->
                <div class="footer-brand">
                    <h3>SiLaras</h3>
                    <p>Sistem Laporan Sarana Sekolah yang memudahkan siswa melaporkan kerusakan fasilitas dengan cepat, mudah, dan transparan.</p>
                    <div class="social-links">
                        <a href="#" class="social-link" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="mailto:smkn1cs@gmail.com" class="social-link" title="Email"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h4><i class="fas fa-compass"></i> Navigasi</h4>
                    <ul class="footer-links">
                        <li><a href="/home"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                        <li><a href="/report"><i class="fas fa-chevron-right"></i> Buat Laporan</a></li>
                        <li><a href="/riwayat"><i class="fas fa-chevron-right"></i> Riwayat</a></li>
                        <li><a href="/about"><i class="fas fa-chevron-right"></i> Tentang Kami</a></li>
                        <li><a href="/profil"><i class="fas fa-chevron-right"></i> Profil</a></li>
                    </ul>
                </div>

                <!-- Location -->
                <div class="footer-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Lokasi</h4>
                    <div class="footer-location">
                        <strong>SMK Negeri 1 Cisarua</strong>
                        Jl. Kolonel Masturi No.300, RT.04/RW.14,<br>
                        Jambudipa, Kec. Cisarua,<br>
                        Kabupaten Bandung Barat,<br>
                        Jawa Barat 40551
                    </div>
                </div>

                <!-- Contact -->
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
        // Mobile menu toggle
        function toggleMenu() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileNav = document.getElementById('mobileNav');
            const menuToggle = document.querySelector('.mobile-menu-toggle');
            
            if (mobileNav && menuToggle && 
                !mobileNav.contains(event.target) && 
                !menuToggle.contains(event.target)) {
                mobileNav.classList.remove('active');
            }
        });

        // Smooth scroll animation for sections
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.about-section, .mission-card, .vision-card, .team-card, .value-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'all 0.6s ease';
                observer.observe(section);
            });
        });

        // Add active class to current navigation
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            document.querySelectorAll('nav a').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>