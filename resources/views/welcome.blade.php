<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>SiLaras - Sistem Laporan Sarana Sekolah</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
            min-height: 100vh;
        }

        /* Header */
        header {
            background: white;
            padding: 1.2rem 5%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1a1f71;
        }

        nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #5b4cdb;
        }

        .login-btn {
            background: #1a1f71;
            color: white;
            padding: 0.6rem 1.8rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background: #2d3699;
            color: white;
        }

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4rem 8%;
            max-width: 1400px;
            margin: 0 auto;
            gap: 4rem;
        }

        .hero-content {
            flex: 1;
            max-width: 600px;
        }

        .hero-content h1 {
            font-size: 3rem;
            color: #1a1f71;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-content h1 .highlight {
            color: #5b4cdb;
        }

        .hero-content p {
            font-size: 1.15rem;
            color: #555;
            line-height: 1.7;
            margin-bottom: 2.5rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn-primary {
            background: #5b4cdb;
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 10px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background: #4a3bb8;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(91, 76, 219, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #5b4cdb;
            padding: 1rem 2.5rem;
            border: 2px solid #5b4cdb;
            border-radius: 10px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: #5b4cdb;
            color: white;
            transform: translateY(-2px);
        }

        /* Hero Illustration */
        .hero-illustration {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .illustration-container {
            position: relative;
            width: 500px;
            height: 500px;
        }

        .illustration-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #5b4cdb 0%, #7c6fe0 100%);
            border-radius: 50%;
            opacity: 0.1;
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .illustration-content {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration-svg {
            width: 400px;
            height: 400px;
        }

        /* Features Section */
        .features {
            background: white;
            padding: 4rem 8%;
            margin-top: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            text-align: center;
            padding: 2rem;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #5b4cdb 0%, #7c6fe0 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
        }

        .feature-card h3 {
            color: #1a1f71;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 3rem 5%;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .cta-buttons {
                justify-content: center;
            }

            .illustration-container {
                width: 350px;
                height: 350px;
            }

            .illustration-svg {
                width: 300px;
                height: 300px;
            }

            nav {
                gap: 1rem;
            }
        }

        @media (max-width: 640px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">SiLaras!</div>
        <nav>
            <a href="/about-w">About Us</a>
            <a href="/login" class="login-btn">Login</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Laporkan masalah sarana dengan <span class="highlight">SiLaras!</span></h1>
            <p>Selamat datang di SiLaras! (Sistem Laporan Sarana Sekolah!). Di website ini, kalian bisa memberikan laporan seputar masalah sarana yg terjadi di sekolah.</p>
            <div class="cta-buttons">
                <a href="/login" class="btn-primary">Buat Laporan!</a>
                <a href="/learnmore" class="btn-secondary">Learn More</a>
            </div>
        </div>
        
        <div class="hero-illustration">
            <div class="illustration-container">
                <div class="illustration-bg"></div>
                <div class="illustration-content">
                    <svg class="illustration-svg" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                        <!-- Decorative elements -->
                        <rect x="50" y="80" width="80" height="60" rx="8" fill="#e0e0e0" transform="rotate(-15 90 110)"/>
                        <path d="M 70 95 L 75 100 L 85 88" stroke="#333" stroke-width="3" fill="none" stroke-linecap="round" transform="rotate(-15 90 110)"/>
                        
                        <rect x="270" y="60" width="70" height="55" rx="8" fill="#d0d0d0" transform="rotate(10 305 87.5)"/>
                        <circle cx="285" cy="80" r="8" fill="#5b4cdb" transform="rotate(10 305 87.5)"/>
                        
                        <!-- Main character and laptop -->
                        <ellipse cx="200" cy="320" rx="80" ry="15" fill="#ccc" opacity="0.3"/>
                        
                        <!-- Laptop -->
                        <rect x="120" y="220" width="160" height="100" rx="8" fill="#555"/>
                        <rect x="130" y="230" width="140" height="80" rx="4" fill="#f0f0f0"/>
                        <line x1="200" y1="230" x2="200" y2="310" stroke="#ddd" stroke-width="2"/>
                        
                        <!-- Laptop screen content -->
                        <rect x="145" y="245" width="110" height="50" rx="4" fill="white"/>
                        <rect x="150" y="250" width="30" height="4" rx="2" fill="#5b4cdb"/>
                        <rect x="150" y="260" width="50" height="3" rx="1.5" fill="#ccc"/>
                        <rect x="150" y="267" width="45" height="3" rx="1.5" fill="#ccc"/>
                        
                        <!-- Character -->
                        <circle cx="200" cy="160" r="35" fill="#333"/>
                        <path d="M 185 160 Q 200 170 215 160" stroke="white" stroke-width="3" fill="none" stroke-linecap="round"/>
                        <circle cx="190" cy="150" r="3" fill="white"/>
                        <circle cx="210" cy="150" r="3" fill="white"/>
                        
                        <!-- Body -->
                        <rect x="170" y="190" width="60" height="70" rx="8" fill="#333"/>
                        <rect x="175" y="200" width="50" height="50" rx="6" fill="#5b4cdb"/>
                        
                        <!-- Arms -->
                        <rect x="140" y="200" width="35" height="15" rx="7" fill="#333" transform="rotate(-20 157 207)"/>
                        <rect x="225" y="200" width="35" height="15" rx="7" fill="#333" transform="rotate(20 243 207)"/>
                        
                        <!-- Decorative stars -->
                        <path d="M 100 180 L 105 185 L 110 180 L 105 175 Z" fill="#5b4cdb"/>
                        <path d="M 290 200 L 295 205 L 300 200 L 295 195 Z" fill="#5b4cdb"/>
                        <circle cx="320" cy="150" r="4" fill="#5b4cdb"/>
                        <circle cx="80" cy="250" r="3" fill="#5b4cdb"/>
                        
                        <!-- Plus signs -->
                        <text x="310" y="250" font-size="24" fill="#333">+</text>
                        <text x="340" y="190" font-size="20" fill="#333">×</text>
                        <text x="65" y="140" font-size="20" fill="#333">+</text>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📝</div>
                <h3>Mudah Digunakan</h3>
                <p>Interface yang sederhana dan intuitif memudahkan siapa saja untuk membuat laporan masalah sarana sekolah</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Respon Cepat</h3>
                <p>Laporan langsung diterima oleh pihak terkait untuk penanganan yang lebih cepat dan efisien</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Tracking Status</h3>
                <p>Pantau perkembangan laporan Anda secara real-time hingga masalah terselesaikan</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="max-w-7xl mx-auto px-6 text-center">
            © {{ date('Y') }} SiLaras!. All rights reserved.
        </div>
    </footer>
</body>
</html>