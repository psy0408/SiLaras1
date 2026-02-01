<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Home - SiLaras</title>
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
            margin-bottom: 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1a1f71;
        }

        nav {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        nav a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            transition: color 0.3s;
            position: relative;
        }

        nav a.active {
            color: #1a1f71;
        }

        nav a.active::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            right: 0;
            height: 3px;
            background: #1a1f71;
            border-radius: 2px;
        }

        nav a:hover {
            color: #5b4cdb;
        }

        .profile-icon {
            width: 45px;
            height: 45px;
            background: #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .profile-icon:hover {
            background: #d0d0d0;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 5%;
        }

        /* Greeting */
        .greeting {
            margin-bottom: 2.5rem;
        }

        .greeting h1 {
            font-size: 2.5rem;
            color: #1a1f71;
            font-weight: bold;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: #e8e8e8;
            border-radius: 15px;
            padding: 1.8rem 1.5rem;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .stat-label {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.8rem;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #1a1f71;
        }

        /* Create Report Section */
        .create-report-section {
            background: #e8e8e8;
            border-radius: 15px;
            padding: 1.8rem 2rem;
            margin-bottom: 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .create-report-section h2 {
            font-size: 1.5rem;
            color: #1a1f71;
            font-weight: bold;
        }

        .report-btn {
            background: #1a1f71;
            color: white;
            padding: 0.9rem 3rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .report-btn:hover {
            background: #2d3699;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(26, 31, 113, 0.3);
        }

         /* Recent Reports Section */
        .recent-reports {
            margin-bottom: 3rem;
        }

        .recent-reports h2 {
            font-size: 1.5rem;
            color: #1a1f71;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .reports-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .report-item {
            background: white;
            border-radius: 12px;
            padding: 1.5rem 2rem;
            display: grid;
            grid-template-columns: 120px 1fr 150px 120px 50px;
            align-items: center;
            gap: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .report-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .report-number {
            font-weight: bold;
            color: #1a1f71;
            font-size: 1.05rem;
        }

        .report-description {
            font-size: 1.05rem;
            color: #333;
        }

        .report-status {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            text-align: center;
        }

        .status-approved {
            background: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-processing {
            background: #cce5ff;
            color: #004085;
        }

        .report-icon {
            font-size: 1.5rem;
            text-align: center;
        }

        .btn-detail {
            background: #1a1f71;
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-detail:hover {
            background: #2d3699;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 31, 113, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
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
            nav {
                gap: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .report-item {
                grid-template-columns: 1fr;
                gap: 1rem;
                text-align: center;
            }

            .create-report-section {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }

            .greeting h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 640px) {
            .logo {
                font-size: 1.5rem;
            }

            nav {
                gap: 1rem;
                font-size: 0.95rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .greeting h1 {
                font-size: 1.8rem;
            }

            header {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">SiLaras!</div>
        <nav>
            <a href="/home" class="active">Home</a>
            <a href="/report">Report</a>
            <a href="/about">About us</a>
            <div class="profile-icon"><a href="/profil">👤</a></div>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="container">
        <!-- Greeting -->
        <div class="greeting">
            <h1>Halo, [Nama User]</h1>
        </div>

        <!-- Statistics Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Laporan</div>
                <div class="stat-value">42</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Disetujui</div>
                <div class="stat-value">42</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Ditolak</div>
                <div class="stat-value">42</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Menunggu</div>
                <div class="stat-value">42</div>
            </div>
        </div>

        <!-- Create Report Section -->
        <div class="create-report-section">
            <h2>Buat Laporan Baru :</h2>
            <a href="/report" class="report-btn">Report</a>
        </div>

        <!-- Recent Reports -->
        <div class="recent-reports">
            <h2>Laporan Terakhir :</h2>
            <div class="reports-list">
                <div class="report-item">
                    <div class="report-number">Laporan #001</div>
                    <div class="report-description">Kerusakan AC</div>
                    <div class="report-status status-approved">Disetujui</div>
                    <button class="btn-detail" onclick="viewDetail('001')">Detail</button>
                    <div class="report-icon">✓</div>
                </div>
                
                <div class="report-item">
                    <div class="report-number">Laporan #002</div>
                    <div class="report-description">Kerusakan Meja</div>
                    <div class="report-status status-rejected">Ditolak</div>
                    <button class="btn-detail" onclick="viewDetail('002')">Detail</button>
                    <div class="report-icon">✕</div>
                </div>

                <div class="report-item">
                    <div class="report-number">Laporan #003</div>
                    <div class="report-description">Kerusakan Kursi</div>
                    <div class="report-status status-pending">Menunggu</div>
                    <button class="btn-detail" onclick="viewDetail('003')">Detail</button>
                    <div class="report-icon">⏱</div>
                </div>

                <div class="report-item">
                    <div class="report-number">Laporan #004</div>
                    <div class="report-description">Toilet Kotor</div>
                    <div class="report-status status-processing">Diproses</div>
                    <button class="btn-detail" onclick="viewDetail('004')">Detail</button>
                    <div class="report-icon">🔄</div>
                </div>

                <div class="report-item">
                    <div class="report-number">Laporan #005</div>
                    <div class="report-description">Lampu Mati</div>
                    <div class="report-status status-approved">Disetujui</div>
                    <button class="btn-detail" onclick="viewDetail('005')">Detail</button>
                    <div class="report-icon">✓</div>
                </div>
            </div>
        </div>
    </div>

   <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="max-w-7xl mx-auto px-6 text-center">
            © {{ date('Y') }} SiLaras!. All rights reserved.
        </div>
    </footer>

    <script>
        // Simulate dynamic username (nanti diganti dengan data dari backend)
        document.addEventListener('DOMContentLoaded', function() {
            const userName = localStorage.getItem('userName') || '[Nama User]';
            document.querySelector('.greeting h1').textContent = `Halo, ${userName}`;
        });

        // Add click handlers for report items
        document.querySelectorAll('.report-item').forEach(item => {
            item.addEventListener('click', function() {
                const reportNumber = this.querySelector('.report-number').textContent;
                alert(`Membuka detail ${reportNumber}`);
                // Nanti redirect ke halaman detail laporan
            });
        });
    </script>
</body>
</html>