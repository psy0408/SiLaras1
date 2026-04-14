<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Admin - SiLaras</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1e1b4b;
            --secondary: #4f46e5;
            --accent: #8b5cf6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --gray-50: #f9fafb;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .container {
            background: white;
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            width: 100%;
            max-width: 600px;
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            padding: 2.5rem 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            position: relative;
            z-index: 1;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .logo img {
            height: 80px;
            width: auto;
            object-fit: contain;
            padding: 8px 16px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .tagline {
            font-size: 0.95rem;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }

        .body {
            padding: 2.5rem 2rem;
        }

        .page-title {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.8rem;
            text-align: center;
        }

        .page-subtitle {
            color: var(--gray-500);
            text-align: center;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .info-card {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            border: 2px solid rgba(79, 70, 229, 0.2);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-card-title {
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 1rem;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-card-title i {
            font-size: 1.2rem;
        }

        .info-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .info-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            color: var(--gray-700);
            line-height: 1.6;
        }

        .info-list li i {
            color: var(--secondary);
            margin-top: 0.2rem;
            font-size: 0.9rem;
        }

        .contact-methods {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .contact-card {
            background: white;
            border: 2px solid var(--gray-200);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .contact-card:hover {
            border-color: var(--secondary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .contact-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .contact-icon.whatsapp {
            background: linear-gradient(135deg, #25D366, #128C7E);
        }

        .contact-icon.email {
            background: linear-gradient(135deg, #EA4335, #FBBC04);
        }

        .contact-icon.phone {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .contact-info {
            flex: 1;
        }

        .contact-label {
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-bottom: 0.3rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .contact-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gray-800);
            word-break: break-all;
        }

        .contact-arrow {
            color: var(--gray-400);
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .contact-card:hover .contact-arrow {
            color: var(--secondary);
            transform: translateX(5px);
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--gray-100);
            color: var(--gray-700);
            text-decoration: none;
            padding: 0.9rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .back-btn:hover {
            background: var(--gray-200);
            border-color: var(--gray-300);
            transform: translateY(-2px);
        }

        .footer {
            text-align: center;
            padding: 1.5rem 2rem;
            border-top: 1px solid var(--gray-200);
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        .office-hours {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border: 2px solid #86efac;
            border-radius: 16px;
            padding: 1.2rem;
            margin-bottom: 2rem;
        }

        .office-hours-title {
            font-weight: 700;
            color: #065f46;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .office-hours-content {
            color: #047857;
            line-height: 1.8;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .container {
                max-width: 100%;
            }

            .header {
                padding: 2rem 1.5rem;
            }

            .body {
                padding: 2rem 1.5rem;
            }

            .page-title {
                font-size: 1.6rem;
            }

            .contact-card {
                flex-direction: column;
                text-align: center;
            }

            .contact-arrow {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-icon">
                <i class="fas fa-headset"></i>
            </div>
            <div class="logo">
                <img src="{{ asset('images/logo-silaras-putih.png') }}" alt="SiLaras Logo">
            </div>
            <div class="tagline">Sistem Laporan Sarana Sekolah</div>
        </div>

        <div class="body">
            <h1 class="page-title">Hubungi Admin</h1>
            <p class="page-subtitle">
                Butuh bantuan reset password atau ada kendala login? <br>
                Hubungi admin kami melalui salah satu kontak di bawah ini.
            </p>

            <!-- Info Card -->
            <div class="info-card">
                <div class="info-card-title">
                    <i class="fas fa-info-circle"></i>
                    Informasi Penting
                </div>
                <ul class="info-list">
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Siapkan <strong>Nama Lengkap</strong> dan <strong>Email</strong> yang terdaftar</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Jelaskan masalah yang Anda alami dengan detail</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Reset password biasanya diproses dalam 1x24 jam</span>
                    </li>
                </ul>
            </div>

            <!-- Office Hours -->
            <div class="office-hours">
                <div class="office-hours-title">
                    <i class="fas fa-clock"></i>
                    Jam Layanan Admin
                </div>
                <div class="office-hours-content">
                    <strong>Senin - Jumat:</strong> 07:00 - 16:00 WIB<br>
                    <strong>Sabtu - Minggu:</strong> Libur
                </div>
            </div>

            <!-- Contact Methods -->
            <div class="contact-methods">
                <!-- WhatsApp -->
                <a href="https://wa.me/6282211111111?text=Halo%20Admin%20SiLaras,%20saya%20butuh%20bantuan%20reset%20password"
                    class="contact-card" target="_blank">
                    <div class="contact-icon whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div class="contact-info">
                        <div class="contact-label">WhatsApp</div>
                        <div class="contact-value">+62 812-3456-7890</div>
                    </div>
                    <i class="fas fa-arrow-right contact-arrow"></i>
                </a>

                <!-- Email -->
                <a href="mailto:admin@smkn1cisarua.sch.id?subject=Permintaan%20Reset%20Password%20SiLaras"
                    class="contact-card">
                    <div class="contact-icon email">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-info">
                        <div class="contact-label">Email</div>
                        <div class="contact-value">admin@smkn1cisarua.sch.id</div>
                    </div>
                    <i class="fas fa-arrow-right contact-arrow"></i>
                </a>

                <!-- Phone -->
                <a href="tel:+622876678" class="contact-card">
                    <div class="contact-icon phone">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-info">
                        <div class="contact-label">Telepon</div>
                        <div class="contact-value">(022) 876-678</div>
                    </div>
                    <i class="fas fa-arrow-right contact-arrow"></i>
                </a>
            </div>

            <!-- Back to Login -->
            <a href="{{ route('login') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Login
            </a>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} SiLaras - SMK Negeri 1 Cisarua</p>
            <p style="margin-top: 0.5rem; font-size: 0.85rem;">
                <i class="fas fa-map-marker-alt"></i>
                Jl. Kolonel Masturi No.300, Cisarua, Kab. Bandung Barat
            </p>
        </div>
    </div>
</body>

</html>
