<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Learn More - SiLaras</title>
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
        .hero-learn {
            background: linear-gradient(135deg, #5b4cdb 0%, #7c6fe0 100%);
            color: white;
            padding: 5rem 8%;
            text-align: center;
        }

        .hero-learn h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-learn p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.95;
        }

        /* Content */
        .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 5%;
        }

        /* Guide Steps */
        .guide-section {
            margin-bottom: 4rem;
        }

        .guide-section h2 {
            color: #1a1f71;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            text-align: center;
        }

        .steps-container {
            display: grid;
            gap: 2rem;
        }

        .step-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            display: flex;
            gap: 2rem;
            align-items: flex-start;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .step-number {
            min-width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #5b4cdb 0%, #7c6fe0 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            color: white;
            box-shadow: 0 5px 15px rgba(91, 76, 219, 0.3);
        }

        .step-content {
            flex: 1;
        }

        .step-content h3 {
            color: #1a1f71;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .step-content p {
            color: #555;
            line-height: 1.8;
            font-size: 1.05rem;
            margin-bottom: 1rem;
        }

        .step-content ul {
            color: #666;
            line-height: 1.8;
            margin-left: 1.5rem;
        }

        .step-content li {
            margin-bottom: 0.5rem;
        }

        /* Features Showcase */
        .features-showcase {
            margin-bottom: 4rem;
        }

        .features-showcase h2 {
            color: #1a1f71;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-box {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #5b4cdb 0%, #7c6fe0 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 3rem;
        }

        .feature-box h3 {
            color: #1a1f71;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .feature-box p {
            color: #666;
            line-height: 1.7;
        }

        /* Tips Section */
        .tips-section {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 4rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .tips-section h2 {
            color: #1a1f71;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .tip-item {
            padding: 1.5rem;
            border-left: 4px solid #5b4cdb;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .tip-item h4 {
            color: #1a1f71;
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tip-item p {
            color: #666;
            line-height: 1.7;
        }

        /* FAQ Section */
        .faq-section {
            margin-bottom: 4rem;
        }

        .faq-section h2 {
            color: #1a1f71;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            text-align: center;
        }

        .faq-container {
            display: grid;
            gap: 1.5rem;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            transition: box-shadow 0.3s;
        }

        .faq-item:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }

        .faq-question {
            color: #1a1f71;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .faq-answer {
            color: #555;
            line-height: 1.8;
            font-size: 1.05rem;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #1a1f71 0%, #5b4cdb 100%);
            color: white;
            border-radius: 20px;
            padding: 4rem 3rem;
            text-align: center;
            margin-bottom: 4rem;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: white;
            color: #5b4cdb;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255,255,255,0.3);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            padding: 1rem 2.5rem;
            border: 2px solid white;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: white;
            color: #5b4cdb;
            transform: translateY(-3px);
        }

        /* Footer */
        footer {
            background-color: #111827;
            color: #d1d5db;
            padding: 1.5rem 0;
            text-align: center;
        }

        footer .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .hero-learn h1 {
                font-size: 2.5rem;
            }

            .step-card {
                flex-direction: column;
                text-align: center;
            }

            .step-number {
                margin: 0 auto;
            }

            .guide-section h2,
            .features-showcase h2,
            .tips-section h2,
            .faq-section h2,
            .cta-section h2 {
                font-size: 2rem;
            }

            nav {
                gap: 1rem;
            }
        }

        @media (max-width: 640px) {
            .hero-learn h1 {
                font-size: 2rem;
            }
        }

            .cta-buttons {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
            }

            .back {
            color: black;
            padding: 1rem 2.5rem;
            border: 2px solid white;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .back:hover {
            color: #5b4cdb;
        }
        
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">SiLaras!</div>
            <a href="/" class="back">Kembali</a>
            <a href="/login" class="login-btn">Login</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-learn">
        <h1>Pelajari Lebih Lanjut</h1>
        <p>Panduan lengkap menggunakan SiLaras untuk melaporkan masalah sarana sekolah dengan mudah dan efektif</p>
    </section>

    <!-- Content -->
    <div class="content">
        <!-- Step by Step Guide -->
        <section class="guide-section">
            <h2>🚀 Cara Menggunakan SiLaras</h2>
            <div class="steps-container">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Login</h3>
                        <p>Langkah pertama untuk menggunakan SiLaras adalah Login terlebih dahulu.</p>
                        <ul>
                            <li>Klik tombol "Login" di pojok kanan atas</li>
                            <li>Isi data: Email, NISN, dan Password sesuai dengan data yg sudah dibuat oleh pihak sekolah</li>
                            <li>Submit: Submit data yg sudah dimasukan di login lalu anda bisa menggunakan fitur website SiLaras!</li>
                        </ul>
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Buat Laporan Baru</h3>
                        <p>Setelah login, Anda bisa langsung membuat laporan masalah sarana sekolah.</p>
                        <ul>
                            <li>Klik tombol "Buat Laporan"</li>
                            <li>Pilih jenis laporan (Contoh: AC, Meja, Kursi, Kebersihan, dll)</li>
                            <li>Tulis judul laporan yang jelas dan singkat</li>
                            <li>Deskripsikan masalah dengan detail</li>
                            <li>Upload foto sebagai bukti (opsional tapi sangat direkomendasikan)</li>
                            <li>Pilih lokasi/ruangan yang bermasalah</li>
                        </ul>
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Submit</h3>
                        <p>Setelah mengisi semua informasi, kirim laporan Anda.</p>
                        <ul>
                            <li>Review kembali informasi yang sudah diisi</li>
                            <li>Klik tombol "Kirim Laporan"</li>
                        </ul>
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Pantau Status Laporan</h3>
                        <p>Gunakan dashboard untuk melihat perkembangan laporan Anda.</p>
                        <ul>
                            <li>Masuk ke Halaman Utama atau Home</li>
                            <li>Lihat total semua laporan yang pernah dibuat</li>
                            <li>Status laporan: Menunggu, Disetujui, Selesai, atau Ditolak</li>
                        </ul>
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Lihat riwayat Laporan</h3>
                        <p>Anda bisa melihat riwayat laporan yg telah dibuat.</p>
                        <ul>
                            <li>Masuk ke Halaman Utama atau Home</li>
                            <li>Lihat dibagian bawah halaman dan cari Laporan Terakhir</li>
                            <li>Anda bisa cek laporan laporan yg telah anda buat sebelumnya</li>
                        </ul>
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h3>Berikan Feedback</h3>
                        <p>Setelah masalah selesai ditangani, bantu kami meningkatkan layanan.</p>
                        <ul>
                            <li>Buka laporan yang sudah berstatus "Selesai"</li>
                            <li>Klik tombol "Berikan Feedback"</li>
                            <li>Beri rating (1-5 bintang) untuk kecepatan dan kualitas penanganan</li>
                            <li>Tulis komentar atau saran (opsional)</li>
                            <li>Submit feedback untuk membantu peningkatan sistem</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Showcase -->
        <section class="features-showcase">
            <h2>✨ Fitur-fitur Unggulan</h2>
            <div class="features-grid">
                <div class="feature-box">
                    <div class="feature-icon">📸</div>
                    <h3>Upload Foto</h3>
                    <p>Lampirkan foto untuk memberikan bukti visual yang jelas tentang masalah yang dilaporkan. Mendukung format JPG, PNG, dan GIF hingga 5MB.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-icon">📸</div>
                    <h3>Status Laporan</h3>
                    <p>Anda bisa melihat status dari laporan yg telah anda buat.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-icon">🔍</div>
                    <h3>Pencarian & Filter</h3>
                    <p>Cari laporan dengan mudah menggunakan nomor tracking, tanggal, kategori, atau status laporan.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-icon">📱</div>
                    <h3>Mobile Friendly</h3>
                    <p>Akses dari smartphone, tablet, atau komputer. Interface yang responsif untuk semua perangkat.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-icon">⚡</div>
                    <h3>Proses Cepat</h3>
                    <p>Laporan Anda akan langsung masuk ke sistem dan diteruskan ke pihak terkait untuk penanganan segera.</p>
                </div>
            </div>
        </section>

        <!-- Tips Section -->
        <section class="tips-section">
            <h2>💡 Tips Membuat Laporan Efektif</h2>
            <div class="tips-grid">
                <div class="tip-item">
                    <h4>✍️ Judul yang Jelas</h4>
                    <p>Gunakan judul yang spesifik dan mudah dipahami. Contoh: "AC Rusak di Kelas 12A" lebih baik daripada "AC Rusak".</p>
                </div>
                <div class="tip-item">
                    <h4>📝 Deskripsi Detail</h4>
                    <p>Jelaskan masalah dengan lengkap: kapan terjadi, seberapa parah, dan dampaknya terhadap kegiatan belajar.</p>
                </div>
                <div class="tip-item">
                    <h4>📷 Sertakan Foto</h4>
                    <p>Foto membuat laporan lebih kredibel dan membantu tim maintenance memahami masalah dengan lebih baik.</p>
                </div>
                <div class="tip-item">
                    <h4>📍 Lokasi Spesifik</h4>
                    <p>Cantumkan lokasi dengan jelas: nama ruangan, lantai, dan gedung untuk mempercepat proses perbaikan.</p>
                </div>
                <div class="tip-item">
                    <h4>⏰ Lapor Segera</h4>
                    <p>Jangan tunda melaporkan masalah. Semakin cepat dilaporkan, semakin cepat dapat ditangani.</p>
                </div>
                <div class="tip-item">
                    <h4>🤝 Tetap Sopan</h4>
                    <p>Gunakan bahasa yang sopan dan profesional dalam setiap laporan yang Anda buat.</p>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <h2>❓ Pertanyaan yang Sering Ditanyakan</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">Q: Berapa lama laporan saya akan diproses?</div>
                    <div class="faq-answer">A: Laporan biasanya diproses dalam 1-2 hari kerja. Untuk masalah urgent, sistem akan otomatis memprioritaskan dan bisa lebih cepat ditangani.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Q: Apakah saya bisa mengedit laporan setelah dikirim?</div>
                    <div class="faq-answer">A: Ya, Anda bisa mengedit laporan selama statusnya masih "Pending". Setelah diproses, laporan tidak bisa diedit tapi Anda bisa menambahkan komentar.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Q: Bagaimana jika laporan saya ditolak?</div>
                    <div class="faq-answer">A: Jika ditolak, Anda akan menerima notifikasi dengan alasan penolakan. Anda bisa membuat laporan baru dengan informasi yang lebih lengkap atau menghubungi admin jika ada pertanyaan.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Q: Apakah identitas saya aman?</div>
                    <div class="faq-answer">A: Ya, sangat aman. Data pribadi Anda dilindungi dengan enkripsi dan hanya admin yang berwenang yang bisa melihat detail pelapor.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Q: Bisa melaporkan untuk orang lain?</div>
                    <div class="faq-answer">A: Ya, Anda bisa melaporkan masalah yang ditemukan meskipun Anda bukan korban langsung. Yang penting informasi yang diberikan akurat.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Q: Ada batasan jumlah laporan?</div>
                    <div class="faq-answer">A: Tidak ada batasan. Anda bisa membuat laporan sebanyak yang diperlukan, selama laporan tersebut valid dan tidak spam.</div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <h2>Siap Membuat Laporan?</h2>
            <p>Mulai gunakan SiLaras sekarang dan bantu ciptakan lingkungan sekolah yang lebih baik!</p>
            <div class="cta-buttons">
                <a href="/login" class="btn-primary">Login Sekarang</a>
                <a href="/about-w" class="btn-secondary">Tentang Kami</a>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="max-w-7xl mx-auto px-6 text-center">
            © {{ date('Y') }} SiLaras!. All rights reserved.
        </div>
    </footer>
</body>
</html>