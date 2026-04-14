<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin - SiLaras</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
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
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-colored: 0 4px 20px rgba(79, 70, 229, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f6f7ff 0%, #edf0ff 100%);
            min-height: 100vh;
            display: flex;
            color: var(--gray-800);
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 120%);
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
            transition: all 0.3s;
        }

        .sidebar-logo {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sidebar-logo::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg,
                    transparent 30%,
                    rgba(255, 255, 255, 0.1) 50%,
                    transparent 70%);
            animation: shine 3s infinite;
        }

        .sidebar-logo img {
            height: 50px;
            width: auto;
            object-fit: contain;
            z-index: 1;
            padding: 6px 12px;
            border-radius: 10px;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }

        .sidebar-menu {
            flex: 1;
            padding: 1.5rem 0;
        }

        .menu-item {
            padding: 0.9rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 0.3rem 0;
        }

        .menu-item i {
            width: 24px;
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.15);
            border-left-color: white;
            color: white;
        }

        .menu-item.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-left-color: white;
        }

        .sidebar-logout {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        .logout-btn {
            width: 100%;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.9), #dc2626);
            color: white;
            padding: 0.9rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 1.5rem;
            width: calc(100% - 280px);
        }

        /* Header */
        .header {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header h1 {
            font-family: 'Sora', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .date-badge {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            padding: 0.6rem 1.2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--secondary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.2rem;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .stat-header {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 0.8rem;
        }

        .stat-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
        }

        .stat-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.2;
        }

        /* Layout: 2 Kolom (Laporan Terbaru + Info Panel) */
        .dashboard-two-columns {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Reports Section */
        .reports-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
            display: flex;
            flex-direction: column;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .section-title {
            font-family: 'Sora', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-box {
            flex: 1;
            max-width: 260px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 0.8rem;
        }

        .search-box input {
            width: 100%;
            padding: 0.6rem 0.8rem 0.6rem 2.2rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--secondary);
        }

        .table-container {
            overflow-y: visible;
            border-radius: 12px;
            max-height: 380px;
        }

        .table-container::-webkit-scrollbar {
            width: 5px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: var(--secondary);
            border-radius: 10px;
        }

        .reports-table {
            width: 100%;
            border-collapse: collapse;
        }

        .reports-table th {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            padding: 0.8rem 1rem;
            text-align: left;
            font-weight: 700;
            color: var(--primary);
            font-size: 0.75rem;
            text-transform: uppercase;
            position: sticky;
            top: 0;
        }

        .reports-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--gray-200);
            color: var(--gray-600);
            font-size: 0.85rem;
        }

        .reports-table tbody tr {
            cursor: pointer;
            transition: background 0.2s;
        }

        .reports-table tbody tr:hover {
            background: var(--gray-50);
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-avatar {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .report-id-badge {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            color: var(--secondary);
            padding: 0.2rem 0.6rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.25rem 0.7rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-info {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Info Panel */
        .info-panel {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .user-count-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 20px;
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .user-count-header {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        .user-count-header i {
            font-size: 1.8rem;
            opacity: 0.9;
        }

        .user-count-label {
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .user-count-value {
            font-family: 'Sora', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
        }

        .logo-card {
            background: white;
            border-radius: 20px;
            padding: 1.8rem;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .logo img{
         height: 60px;
            width: auto;
            object-fit: contain;
            z-index: 1;
            padding: 6px 12px;
            border-radius: 10px;
        }

        .quick-actions {
            background: white;
            border-radius: 20px;
            padding: 1.3rem;
            box-shadow: var(--shadow);
        }

        .quick-actions h3 {
            font-size: 1rem;
            color: var(--primary);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .actions-grid {
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
        }

        .action-btn {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            border: none;
            padding: 0.9rem 1rem;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 1rem;
            width: 100%;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .action-btn i:first-child {
            font-size: 1.1rem;
            color: var(--secondary);
            width: 24px;
        }

        .action-btn span {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--primary);
            flex: 1;
            text-align: left;
        }

        .action-btn .arrow {
            color: var(--gray-400);
            font-size: 0.75rem;
        }

        /* Monthly Chart */
        .monthly-chart-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
            margin-top: 0;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .chart-title {
            font-family: 'Sora', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .chart-controls {
            display: flex;
            gap: 0.8rem;
        }

        .chart-select {
            padding: 0.4rem 1rem;
            border-radius: 30px;
            border: 1px solid var(--gray-200);
            background: white;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
        }

        .chart-container {
            position: relative;
            height: 320px;
            background: linear-gradient(135deg, #f9fafb 0%, #f0f3ff 100%);
            border-radius: 20px;
            padding: 0.8rem;
            margin-bottom: 1rem;
        }

        .chart-stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            padding-top: 1rem;
            border-top: 2px dashed var(--gray-200);
        }

        .chart-stat-item {
            text-align: center;
            background: var(--gray-50);
            padding: 0.7rem;
            border-radius: 14px;
        }

        .chart-stat-label {
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--gray-500);
            text-transform: uppercase;
            margin-bottom: 0.3rem;
        }

        .chart-stat-value {
            font-family: 'Sora', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary);
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--gray-500);
        }

        .download-btn {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 1rem;
            border-radius: 30px;
            border: none;
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: white;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .download-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            align-items: center;
            justify-content: center;
            z-index: 1000;
            backdrop-filter: blur(4px);
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 24px;
            max-width: 360px;
            text-align: center;
        }

        .modal-icon {
            width: 60px;
            height: 60px;
            background: #fee2e2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.8rem;
            color: var(--danger);
        }

        .modal-actions {
            display: flex;
            gap: 0.8rem;
            justify-content: center;
            margin-top: 1.5rem;
        }

        .btn-cancel,
        .btn-logout {
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-cancel {
            background: var(--gray-100);
        }

        .btn-logout {
            background: #dc2626;
            color: white;
        }

        /* Mobile */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 200;
            background: var(--secondary);
            color: white;
            border: none;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1.2rem;
        }

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 90;
        }

        @media (max-width: 968px) {
            .sidebar {
                transform: translateX(-100%);
                width: 260px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 1rem;
            }

            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .overlay.active {
                display: block;
            }

            .dashboard-two-columns {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .chart-stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .chart-stats-grid {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body>
    <button class="mobile-menu-toggle" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo-silaras-putih.png') }}" alt="SiLaras Logo">
        </div>
        <nav class="sidebar-menu">
            <a href="/admin" class="menu-item active"><i class="fas fa-chart-pie"></i><span>Dasbor</span></a>
            <a href="/admin/report-ad" class="menu-item"><i class="fas fa-file-alt"></i><span>Laporan</span></a>
            <a href="/admin/riwayat-ad" class="menu-item"><i class="fas fa-history"></i><span>Riwayat</span></a>
            <a href="/admin/user-ad" class="menu-item"><i class="fas fa-users"></i><span>Pengguna</span></a>
        </nav>
        <div class="sidebar-logout">
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">@csrf
                <button type="button" class="logout-btn" onclick="openLogoutModal()"><i
                        class="fas fa-sign-out-alt"></i><span>Logout</span></button>
            </form>
        </div>
    </aside>

    <!-- Modal Logout -->
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <h3>Konfirmasi Logout</h3>
            <p>Apakah Anda yakin ingin keluar?</p>
            <div class="modal-actions">
                <button class="btn-cancel" onclick="closeLogoutModal()">Batal</button>
                <button class="btn-logout" onclick="confirmLogout()">Logout</button>
            </div>
        </div>
    </div>

    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <h1>Dasbor Admin</h1>
                <div class="date-badge"><i class="far fa-calendar-alt"></i><span>{{ date('d F Y') }}</span></div>
            </div>
        </div>

        <!-- Statistik Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
                    <div class="stat-label">Total Laporan</div>
                </div>
                <div class="stat-value">{{ $totalReports }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                    <div class="stat-label">Pending</div>
                </div>
                <div class="stat-value">{{ $pendingReports }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i class="fas fa-sync-alt"></i></div>
                    <div class="stat-label">Diproses</div>
                </div>
                <div class="stat-value">{{ $diprosesReports }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-label">Selesai</div>
                </div>
                <div class="stat-value">{{ $selesaiReports }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
                    <div class="stat-label">Ditolak</div>
                </div>
                <div class="stat-value">{{ $ditolakReports }}</div>
            </div>
        </div>

        <!-- Laporan Terbaru -->
        <div class="dashboard-two-columns">
            <div class="reports-section">
                <div class="section-header">
                    <div class="section-title"><i class="fas fa-history"></i><span>Laporan Terbaru</span></div>
                    <div class="search-box"><i class="fas fa-search"></i><input type="text" id="searchInput"
                            placeholder="Cari laporan..."></div>
                </div>
                @if ($recentReports->count() > 0)
                    <div class="table-container">
                        <table class="reports-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>ID Laporan</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="reportsTableBody">
                                @foreach ($recentReports as $report)
                                    <tr onclick="viewReportDetail({{ $report->id }})">
                                        <td>
                                            <div class="user-badge">
                                                <div class="user-avatar">
                                                    {{ strtoupper(substr($report->user->name, 0, 1)) }}</div>
                                                <span>{{ $report->user->name }}</span>
                                            </div>
                                        </td>
                                        <td><span
                                                class="report-id-badge">#{{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}</span>
                                        </td>
                                        <td><i
                                                class="fas fa-{{ $report->kategori === 'sarana' ? 'chair' : 'school' }}"></i>
                                            {{ $report->jenis_sarana }}</td>
                                        <td>@php
                                            $statusMap = [
                                                'Pending' => 'warning',
                                                'Diproses' => 'info',
                                                'Selesai' => 'success',
                                                'Ditolak' => 'danger',
                                            ];
                                            $iconMap = [
                                                'Pending' => 'clock',
                                                'Diproses' => 'sync-alt',
                                                'Selesai' => 'check-circle',
                                                'Ditolak' => 'times-circle',
                                            ];
                                        @endphp
                                            <span class="badge badge-{{ $statusMap[$report->status] }}"><i
                                                    class="fas fa-{{ $iconMap[$report->status] }}"></i>
                                                {{ $report->status }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state"><i class="fas fa-inbox fa-2x"></i>
                        <p>Belum ada laporan</p>
                    </div>
                @endif
            </div>

            <!-- Info Panel -->
            <div class="info-panel">
                <div class="user-count-card">
                    <div class="user-count-header"><i class="fas fa-users"></i><span class="user-count-label">Total
                            User Terdaftar</span></div>
                    <div class="user-count-value">{{ $totalUsers }}</div>
                </div>
                <div class="logo-card">
                    <div class="logo">
                        <img src="{{ asset('images/logo-silaras.png') }}" alt="SiLaras Logo">
                    </div>
                </div>
                <div class="quick-actions">
                    <h3><i class="fas fa-bolt"></i> Akses Cepat</h3>
                    <div class="actions-grid">
                        <button class="action-btn" onclick="location.href='/admin/report-ad'">
                            <i class="fas fa-file-alt"></i><span>Reports</span>
                            <i class="fas fa-chevron-right arrow"></i></button>
                        <button class="action-btn" onclick="location.href='/admin/riwayat-ad'">
                            <i class="fas fa-history"></i><span>History</span>
                            <i class="fas fa-chevron-right arrow"></i></button>
                        <button class="action-btn" onclick="location.href='/admin/user-ad'">
                            <i class="fas fa-users"></i><span>Users</span>
                            <i class="fas fa-chevron-right arrow"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="monthly-chart-section">
            <div class="chart-header">
                <div class="chart-title"><i class="fas fa-chart-line"></i><span>Ringkasan Laporan Per Bulan</span>
                </div>
                <div class="chart-controls">
                    <select class="chart-select" id="chartYear">
                        <option value="2026" selected>2026</option>
                        <option value="2025">2025</option>
                    </select>
                    <select class="chart-select" id="chartType">
                        <option value="bar">Bar Chart</option>
                        <option value="line">Line Chart</option>
                        <option value="area">Area Chart</option>
                    </select>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="monthlyReportChart"></canvas>
            </div>
            <div class="chart-stats-grid">
                <div class="chart-stat-item">
                    <div class="chart-stat-label">Bulan Ini</div>
                    <div class="chart-stat-value">{{ $currentMonthTotal }}</div>
                </div>
                <div class="chart-stat-item">
                    <div class="chart-stat-label">Rata-rata</div>
                    <div class="chart-stat-value">{{ $averagePerMonth }}</div>
                </div>
                <div class="chart-stat-item">
                    <div class="chart-stat-label">Bulan Tertinggi</div>
                    <div class="chart-stat-value">{{ $highestMonth }}</div>
                </div>
                <div class="chart-stat-item">
                    <div class="chart-stat-label">Total Tahun Ini</div>
                    <div class="chart-stat-value">{{ $yearlyTotal }}</div>
                </div>
            </div>
            <select class="chart-select" id="chartMonth">
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">Mei</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Agu</option>
                <option value="9">Sep</option>
                <option value="10">Okt</option>
                <option value="11">Nov</option>
                <option value="12">Des</option>
            </select>

            <button onclick="downloadPDF()" class="download-btn">
                <i class="fas fa-download"></i>
                <span>PDF</span>
            </button>
        </div>
    </main>

    <script>
        let monthlyChart;
        const monthlyData = @json($monthlyReports);

        function initChart() {
            const ctx = document.getElementById('monthlyReportChart').getContext('2d');
            const months = monthlyData.map(item => item.month);
            const pending = monthlyData.map(item => item.pending);
            const diproses = monthlyData.map(item => item.diproses);
            const selesai = monthlyData.map(item => item.selesai);
            const ditolak = monthlyData.map(item => item.ditolak);

            monthlyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                            label: 'Pending',
                            data: pending,
                            backgroundColor: 'rgba(245, 158, 11, 0.65)',
                            borderColor: '#f59e0b',
                            borderWidth: 1.5,
                            borderRadius: 6
                        },
                        {
                            label: 'Diproses',
                            data: diproses,
                            backgroundColor: 'rgba(59, 130, 246, 0.65)',
                            borderColor: '#3b82f6',
                            borderWidth: 1.5,
                            borderRadius: 6
                        },
                        {
                            label: 'Selesai',
                            data: selesai,
                            backgroundColor: 'rgba(16, 185, 129, 0.65)',
                            borderColor: '#10b981',
                            borderWidth: 1.5,
                            borderRadius: 6
                        },
                        {
                            label: 'Ditolak',
                            data: ditolak,
                            backgroundColor: 'rgba(239, 68, 68, 0.65)',
                            borderColor: '#ef4444',
                            borderWidth: 1.5,
                            borderRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: {
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });
        }

        function updateChartType() {
            if (!monthlyChart) return;
            const type = document.getElementById('chartType').value;
            let chartType = type === 'area' ? 'line' : type;
            monthlyChart.config.type = chartType;
            if (type === 'area') {
                monthlyChart.data.datasets.forEach(ds => ds.fill = true);
            } else {
                monthlyChart.data.datasets.forEach(ds => ds.fill = false);
            }
            monthlyChart.update();
        }

        function downloadPDF() {
            const year = document.getElementById('chartYear').value;
            const month = document.getElementById('chartMonth').value;

            window.location.href = `/admin/admin/pdf-dash-report?month=${month}&year=${year}`;
        }

        // Mobile & utilities
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }

        function openLogoutModal() {
            document.getElementById('logoutModal').classList.add('active');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.remove('active');
        }

        function confirmLogout() {
            document.getElementById('logoutForm').submit();
        }

        function viewReportDetail(id) {
            window.location.href = '/admin/report-ad';
        }

        document.addEventListener('DOMContentLoaded', function() {
            initChart();
            document.getElementById('chartType').addEventListener('change', updateChartType);

            // Search filter
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    const val = this.value.toLowerCase();
                    document.querySelectorAll('#reportsTableBody tr').forEach(row => {
                        row.style.display = row.innerText.toLowerCase().includes(val) ? '' : 'none';
                    });
                });
            }

            // Close sidebar on mobile after menu click
            document.querySelectorAll('.menu-item').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 968) toggleSidebar();
                });
            });
        });
    </script>
</body>

</html>
