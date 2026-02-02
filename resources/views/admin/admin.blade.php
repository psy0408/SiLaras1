<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SiLaras</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
        }

        .sidebar-logo {
            padding: 1.5rem;
            background: #e8e8e8;
            font-size: 1.8rem;
            font-weight: bold;
            color: #1a1f71;
            text-align: center;
        }

        .sidebar-menu {
            flex: 1;
            padding: 2rem 0;
        }

        .menu-item {
            padding: 1rem 2rem;
            color: #333;
            font-weight: 600;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .menu-item:hover {
            background: #f8f9fa;
            border-left-color: #5b4cdb;
        }

        .menu-item.active {
            background: #f0f0f0;
            color: #1a1f71;
            border-left-color: #1a1f71;
        }

        .sidebar-logout {
            padding: 1.5rem;
        }

        .logout-btn {
            width: 100%;
            background: #a41e1e;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1.05rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: #8b1a1a;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(164, 30, 30, 0.3);
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 2rem;
            width: calc(100% - 250px);
        }

        /* Header */
        .header {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 2rem;
            color: #1a1f71;
            font-weight: bold;
        }

        /* Statistics Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #e8e8e8;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
        }

        .stat-label {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.8rem;
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: bold;
            color: #1a1f71;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        /* Reports Section */
        .reports-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #1a1f71;
        }

        .search-box {
            flex: 1;
            max-width: 300px;
            margin-left: 2rem;
        }

        .search-box input {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .search-box input:focus {
            outline: none;
            border-color: #5b4cdb;
            box-shadow: 0 0 0 3px rgba(91, 76, 219, 0.1);
        }

        .reports-table {
            width: 100%;
            border-collapse: collapse;
        }

        .reports-table thead {
            background: #f8f9fa;
        }

        .reports-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e0e0e0;
        }

        .reports-table td {
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
            color: #555;
        }

        .reports-table tbody tr:hover {
            background: #f8f9fa;
        }

        /* Info Panel */
        .info-panel {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .user-count-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
        }

        .user-count-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
        }

        .user-count-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #1a1f71;
        }

        .logo-card {
            background: white;
            border-radius: 15px;
            padding: 3rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
        }

        .logo-card .logo-text {
            font-size: 3rem;
            font-weight: bold;
            color: #1a1f71;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 200;
            background: #1a1f71;
            color: white;
            border: none;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2rem;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .section-header {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                margin-left: 0;
                margin-top: 1rem;
                max-width: 100%;
            }
        }

        @media (max-width: 640px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .reports-table {
                font-size: 0.9rem;
            }

            .reports-table th,
            .reports-table td {
                padding: 0.7rem;
            }
        }

        /* Overlay for mobile menu */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 90;
        }

        .overlay.active {
            display: block;
        }

        /* Modal background */
.modal {
    display: none; 
    position: fixed;
    z-index: 9999;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
}


/* Modal box */
.modal-content {
    background: #fff;
    padding: 24px;
    border-radius: 12px;
    width: 90%;
    max-width: 400px;
    text-align: center;
    animation: scaleIn 0.2s ease;
}

.modal-content h3 {
    margin-bottom: 10px;
}

.modal-content p {
    color: #555;
    margin-bottom: 20px;
}

/* Buttons */
.modal-actions {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.btn-cancel {
    padding: 10px 16px;
    background: #e5e7eb;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.btn-logout {
    padding: 10px 16px;
    background: #dc2626;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.btn-logout:hover {
    background: #b91c1c;
}

/* Animation */
@keyframes scaleIn {
    from {
        transform: scale(0.9);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}
    </style>
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" onclick="toggleSidebar()">☰</button>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">SiLaras!</div>
        
        <nav class="sidebar-menu">
            <div class="menu-item active">DASHBOARD</div>
            <div class="menu-item" onclick="window.location.href='/admin.report-ad'">REPORT</div>
            <div class="menu-item" onclick="window.location.href='/admin.riwayat-ad'">RIWAYAT</div>
            <div class="menu-item" onclick="window.location.href='/admin.user-ad'">USER</div>
        </nav>

        <div class="sidebar-logout">
        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
           @csrf
        <button type="button" class="logout-btn" onclick="openLogoutModal()">
           Logout
        </button>
        </div>

        <!-- Modal Logout -->
        <div id="logoutModal" class="modal">
        <div class="modal-content">
        <h3>Konfirmasi Logout</h3>
        <p>Apakah Anda yakin ingin logout?</p>

        <div class="modal-actions">
            <button type="button" class="btn-cancel" onclick="closeLogoutModal()">
        Batal
    </button>

    <button type="button" class="btn-logout" onclick="confirmLogout()">
        Logout
    </button>
        </div>
        </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>DASHBOARD</h1>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Laporan</div>
                <div class="stat-value">42</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Diproses</div>
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
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Reports Section -->
            <div class="reports-section">
                <div class="section-header">
                    <h2 class="section-title">Laporan Terbaru :</h2>
                    <div class="search-box">
                        <input type="text" placeholder="Search...." id="searchInput">
                    </div>
                </div>

                <table class="reports-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Laporan</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody id="reportsTableBody">
                        <tr>
                            <td>User 1</td>
                            <td>Laporan #001</td>
                            <td>Kerusakan AC</td>
                        </tr>
                        <tr>
                            <td>User 1</td>
                            <td>Laporan #002</td>
                            <td>Kerusakan AC</td>
                        </tr>
                        <tr>
                            <td>User 1</td>
                            <td>Laporan #003</td>
                            <td>Kerusakan AC</td>
                        </tr>
                        <tr>
                            <td>User 2</td>
                            <td>Laporan #004</td>
                            <td>Toilet Kotor</td>
                        </tr>
                        <tr>
                            <td>User 3</td>
                            <td>Laporan #005</td>
                            <td>Lampu Mati</td>
                        </tr>
                        <tr>
                            <td>User 1</td>
                            <td>Laporan #006</td>
                            <td>Kerusakan Meja</td>
                        </tr>
                        <tr>
                            <td>User 4</td>
                            <td>Laporan #007</td>
                            <td>Kerusakan Kursi</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Info Panel -->
            <div class="info-panel">
                <!-- Total User Card -->
                <div class="user-count-card">
                    <div class="user-count-label">Total User</div>
                    <div class="user-count-value">42</div>
                </div>

                <!-- Logo Card -->
                <div class="logo-card">
                    <div class="logo-text">SiLaras!</div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Toggle sidebar for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // logout function
       function openLogoutModal() {
    document.getElementById('logoutModal').style.display = 'flex';
}

function closeLogoutModal() {
    document.getElementById('logoutModal').style.display = 'none';
}

function confirmLogout() {
    document.getElementById('logoutForm').submit();
}


        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#reportsTableBody tr');

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Menu navigation
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all items
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                // Add active class to clicked item
                this.classList.add('active');
                
                const menuText = this.textContent.trim();
                document.querySelector('.header h1').textContent = menuText;

                // Close sidebar on mobile after selection
                if (window.innerWidth <= 968) {
                    toggleSidebar();
                }
            });
        });

        // Click table row to view details
        document.querySelectorAll('#reportsTableBody tr').forEach(row => {
            row.style.cursor = 'pointer';
            row.addEventListener('click', function() {
                const laporan = this.cells[1].textContent;
                alert(`Membuka detail ${laporan}`);
                // Nanti redirect ke halaman detail
            });
        });
    </script>
</body>
</html>