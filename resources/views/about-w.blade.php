<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>About Us - SiLaras</title>
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

        nav a:hover,
        nav a.active {
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
        .hero-about {
            background: linear-gradient(135deg, #1a1f71 0%, #5b4cdb 100%);
            color: white;
            padding: 5rem 8%;
            text-align: center;
        }

        .hero-about h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-about p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.95;
        }

        /* Content Section */
        .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 5%;
        }

        .about-section {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .about-section h2 {
            color: #1a1f71;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .about-section h2::before {
            content: '';
            width: 5px;
            height: 40px;
            background: linear-gradient(135deg, #5b4cdb 0%, #7c6fe0 100%);
            border-radius: 3px;
        }

        .about-section p {
            color: #555;
            line-height: 1.8;
            font-size: 1.05rem;
            margin-bottom: 1rem;
        }

        .about-section ul {
            color: #555;
            line-height: 1.8;
            font-size: 1.05rem;
            margin-left: 2rem;
            margin-bottom: 1rem;
        }

        .about-section li {
            margin-bottom: 0.8rem;
        }

        /* Mission & Vision Grid */
        .mission-vision {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .mission-card,
        .vision-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .mission-card:hover,
        .vision-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        .mission-card h3,
        .vision-card h3 {
            color: #1a1f71;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .icon {
            font-size: 2.5rem;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .team-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .team-card:hover {
            transform: translateY(-5px);
        }

        .team-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #5b4cdb 0%, #7c6fe0 100%);
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
        }

        .team-card h4 {
            color: #1a1f71;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .team-card p {
            color: #666;
            font-size: 0.95rem;
        }

        /* Values Section */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .value-item {
            text-align: center;
            padding: 2rem;
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #5b4cdb 0%, #7c6fe0 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
        }

        .value-item h4 {
            color: #1a1f71;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .value-item p {
            color: #666;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            background-color: #111827;
            color: #d1d5db;
            padding: 1.5rem 0;
            margin-top: 3rem;
            text-align: center;
        }

        footer .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .hero-about h1 {
                font-size: 2.5rem;
            }

            .about-section {
                padding: 2rem;
            }

            nav {
                gap: 1rem;
            }
        }

        @media (max-width: 640px) {
            .hero-about h1 {
                font-size: 2rem;
            }

            .hero-about p {
                font-size: 1rem;
            }

            .about-section h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">SiLaras!</div>
        <nav>
            <a href="/">Kembali</a>
            <a href="/about-w" class="active">About us</a>
            <a href="/login" class="login-btn">Login</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-about">
        <h1>Tentang SiLaras!</h1>
        <p>Sistem Laporan Sarana Sekolah yang memudahkan siswa untuk melaporkan masalah infrastruktur dan sarana sekolah</p>
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
                Platform ini hadir sebagai solusi modern untuk meningkatkan komunikasi antara siswa dan pihak sekolah dalam hal pemeliharaan dan perbaikan fasilitas. Dengan sistem yang terstruktur dan transparan, setiap laporan dapat ditindaklanjuti dengan lebih cepat dan efisien.
            </p>
        </div>

        <!-- Mission & Vision -->
        <div class="mission-vision">
            <div class="mission-card">
                <h3><span class="icon">🎯</span> Misi Kami</h3>
                <p>
                    Menyediakan platform yang mudah digunakan untuk melaporkan masalah sarana sekolah, memastikan setiap laporan ditangani dengan cepat dan transparan, serta menciptakan lingkungan sekolah yang lebih baik dan nyaman untuk semua.
                </p>
            </div>
            <div class="vision-card">
                <h3><span class="icon">👁️</span> Visi Kami</h3>
                <p>
                    Menjadi sistem pelaporan sarana sekolah terdepan yang membantu menciptakan lingkungan belajar yang kondusif, aman, dan nyaman bagi seluruh siswa.
                </p>
            </div>
        </div>

        <!-- Features -->
        <div class="about-section" style="margin-top: 3rem;">
            <h2>Fitur Unggulan</h2>
            <ul>
                <li><strong>Pelaporan Mudah:</strong> Interface yang intuitif memudahkan siswa untuk membuat laporan dalam hitungan detik.</li>
                <li><strong>Tracking Real-time:</strong> Pantau status laporan Anda dari mulai diajukan hingga selesai ditangani.</li>
                <li><strong>Upload Foto:</strong> Sertakan foto sebagai bukti untuk memperjelas masalah yang dilaporkan.</li>
                <li><strong>Riwayat & Status Laporan:</strong> Lihat riwayat dan status laporan yang pernah Anda buat.</li>
                <li><strong>Sistem Prioritas:</strong> Laporan diprioritaskan berdasarkan tingkat urgensi.</li>
            </ul>
        </div>

        <!-- Values -->
        <div class="about-section" style="margin-top: 3rem;">
            <h2>Nilai-nilai Kami</h2>
            <div class="values-grid">
                <div class="value-item">
                    <div class="value-icon">🤝</div>
                    <h4>Transparansi</h4>
                    <p>Semua proses pelaporan bersifat terbuka dan dapat dilacak oleh pelapor</p>
                </div>
                <div class="value-item">
                    <div class="value-icon">⚡</div>
                    <h4>Responsif</h4>
                    <p>Komitmen untuk merespons setiap laporan dengan cepat dan tepat</p>
                </div>
                <div class="value-item">
                    <div class="value-icon">✨</div>
                    <h4>Kemudahan</h4>
                    <p>Antarmuka yang user-friendly untuk pengalaman terbaik</p>
                </div>
                <div class="value-item">
                    <div class="value-icon">🔒</div>
                    <h4>Keamanan</h4>
                    <p>Data dan privasi pengguna terjaga dengan sistem keamanan terbaik</p>
                </div>
            </div>
        </div>

        <!-- How it Works -->
        <div class="about-section" style="margin-top: 3rem;">
            <h2>Cara Kerja SiLaras</h2>
            <ul>
                <li><strong>1. Login:</strong> Login menggunakan email, NISN, serta password yg telah diberikan pihak sekolah</li>
                <li><strong>2. Buat Laporan:</strong> Klik tombol "Buat Laporan", isi detail masalah, dan upload foto jika diperlukan</li>
                <li><strong>3. Submit:</strong> Kirim laporan yang telah anda buat</li>
                <li><strong>4. Tracking:</strong> Pantau status laporan - apakah sedang diproses, ditolak, atau sudah selesai</li>
                <li><strong>5. Feedback:</strong> Setelah masalah selesai, Anda dapat memberikan feedback tentang penanganan yang dilakukan</li>
            </ul>
        </div>

        <!-- Team -->
        <div class="about-section" style="margin-top: 3rem;">
            <h2>Tim Pengembang</h2>
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-avatar">👨‍💻</div>
                    <h4>Tim Developer</h4>
                    <p>Mengembangkan platform dengan teknologi terkini</p>
                </div>
                <div class="team-card">
                    <div class="team-avatar">🎨</div>
                    <h4>Tim Designer</h4>
                    <p>Menciptakan pengalaman pengguna yang menarik</p>
                </div>
                <div class="team-card">
                    <div class="team-avatar">📊</div>
                    <h4>Tim Analyst</h4>
                    <p>Menganalisis dan meningkatkan sistem</p>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="about-section" style="margin-top: 3rem;">
            <h2>Hubungi Kami</h2>
            <p>
                Memiliki pertanyaan atau saran? Kami siap membantu! Hubungi kami melalui:
            </p>
            <p style="margin-top: 1rem;">
                📧 Email: support@silaras.sch.id<br>
                📱 WhatsApp: +62 812-3456-7890<br>
                🏫 Alamat: Gedung Administrasi Sekolah, Ruang IT
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="max-w-7xl mx-auto px-6 text-center">
            © {{ date('Y') }} SiLaras!. All rights reserved.
        </div>
    </footer>
</body>
</html>