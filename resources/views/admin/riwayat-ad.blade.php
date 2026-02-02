<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat - SiLaras</title>
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

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .search-box {
            flex: 1;
            max-width: 350px;
        }

        .search-box input {
            width: 100%;
            padding: 0.8rem 1rem;
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

        .filter-box {
            flex: 0 0 250px;
        }

        .filter-box select {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }

        .filter-box select:focus {
            outline: none;
            border-color: #5b4cdb;
            box-shadow: 0 0 0 3px rgba(91, 76, 219, 0.1);
        }

        /* Reports Section */
        .reports-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1a1f71;
            margin-bottom: 1.5rem;
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

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .btn-detail {
            background: #e8e8e8;
            color: #1a1f71;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-detail:hover {
            background: #d8d8d8;
            transform: translateY(-1px);
        }

        .btn-edit {
            background: #e8e8e8;
            color: #1a1f71;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-edit:hover {
            background: #d8d8d8;
            transform: translateY(-1px);
        }

        .btn-icon {
            background: transparent;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.3rem 0.5rem;
            transition: all 0.3s;
            color: #666;
        }

        .btn-icon:hover {
            color: #1a1f71;
            transform: scale(1.1);
        }

        .btn-delete {
            color: #a41e1e;
        }

        .btn-delete:hover {
            color: #8b1a1a;
        }

        /* Status Badge */
        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-selesai {
            background: #d4edda;
            color: #155724;
        }

        .status-dibatalkan {
            background: #f8d7da;
            color: #721c24;
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

            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box,
            .filter-box {
                max-width: 100%;
            }

            .reports-table {
                font-size: 0.85rem;
            }

            .reports-table th,
            .reports-table td {
                padding: 0.7rem 0.5rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.3rem;
            }

            .btn-detail,
            .btn-edit {
                width: 100%;
                padding: 0.4rem 0.8rem;
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
            <div class="menu-item" onclick="window.location.href='/admin'">DASHBOARD</div>
            <div class="menu-item" onclick="window.location.href='/admin.report-ad'">REPORT</div>
            <div class="menu-item active">RIWAYAT</div>
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
            <h1>RIWAYAT</h1>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="search-box">
                <input type="text" placeholder="Search..." id="searchInput">
            </div>
            <div class="filter-box">
                <select id="filterStatus">
                    <option value="">Filter Status</option>
                    <option value="selesai">Selesai</option>
                    <option value="dibatalkan">Dibatalkan</option>
                </select>
            </div>
        </div>

        <!-- Reports Section -->
        <div class="reports-section">
            <h2 class="section-title">Laporan Terkirim</h2>

            <table class="reports-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Laporan</th>
                        <th>Deskripsi</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="reportsTableBody">
                    <tr data-status="selesai">
                        <td>User1</td>
                        <td>Laporan#001</td>
                        <td>Kerusakan Meja</td>
                        <td>
                            <button class="btn-detail" onclick="viewDetail('001')">Detail</button>
                        </td>
                        <td class="action-buttons">
                            <button class="btn-icon" onclick="printReport('001')" title="Print">🖨️</button>
                            <button class="btn-icon btn-delete" onclick="deleteReport('001')" title="Delete">🗑️</button>
                        </td>
                    </tr>
                    <tr data-status="selesai">
                        <td>User1</td>
                        <td>Laporan#001</td>
                        <td>Kerusakan Meja</td>
                        <td>
                            <button class="btn-detail" onclick="viewDetail('001')">Detail</button>
                        </td>
                        <td class="action-buttons">
                            <button class="btn-icon" onclick="printReport('001')" title="Print">🖨️</button>
                            <button class="btn-icon btn-delete" onclick="deleteReport('001')" title="Delete">🗑️</button>
                        </td>
                    </tr>
                    <tr data-status="dibatalkan">
                        <td>User1</td>
                        <td>Laporan#001</td>
                        <td>Kerusakan Meja</td>
                        <td>
                            <button class="btn-detail" onclick="viewDetail('001')">Detail</button>
                        </td>
                        <td class="action-buttons">
                            <button class="btn-icon" onclick="printReport('001')" title="Print">🖨️</button>
                            <button class="btn-icon btn-delete" onclick="deleteReport('001')" title="Delete">🗑️</button>
                        </td>
                    </tr>
                    <tr data-status="selesai">
                        <td>User1</td>
                        <td>Laporan#001</td>
                        <td>Kerusakan Meja</td>
                        <td>
                            <button class="btn-detail" onclick="viewDetail('001')">Detail</button>
                        </td>
                        <td class="action-buttons">
                            <button class="btn-icon" onclick="printReport('001')" title="Print">🖨️</button>
                            <button class="btn-icon btn-delete" onclick="deleteReport('001')" title="Delete">🗑️</button>
                        </td>
                    </tr>
                    <tr data-status="selesai">
                        <td>User2</td>
                        <td>Laporan#002</td>
                        <td>AC Rusak</td>
                        <td>
                            <button class="btn-detail" onclick="viewDetail('002')">Detail</button>
                        </td>
                        <td class="action-buttons">
                            <button class="btn-icon" onclick="printReport('002')" title="Print">🖨️</button>
                            <button class="btn-icon btn-delete" onclick="deleteReport('002')" title="Delete">🗑️</button>
                        </td>
                    </tr>
                    <tr data-status="dibatalkan">
                        <td>User3</td>
                        <td>Laporan#003</td>
                        <td>Toilet Kotor</td>
                        <td>
                            <button class="btn-detail" onclick="viewDetail('003')">Detail</button>
                        </td>
                        <td class="action-buttons">
                            <button class="btn-icon" onclick="printReport('003')" title="Print">🖨️</button>
                            <button class="btn-icon btn-delete" onclick="deleteReport('003')" title="Delete">🗑️</button>
                        </td>
                    </tr>
                    <tr data-status="selesai">
                        <td>User4</td>
                        <td>Laporan#004</td>
                        <td>Lampu Mati</td>
                        <td>
                            <button class="btn-detail" onclick="viewDetail('004')">Detail</button>
                        </td>
                        <td class="action-buttons">
                            <button class="btn-icon" onclick="printReport('004')" title="Print">🖨️</button>
                            <button class="btn-icon btn-delete" onclick="deleteReport('004')" title="Delete">🗑️</button>
                        </td>
                    </tr>
                </tbody>
            </table>
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


        // Navigation
        function navigate(page) {
            window.location.href = page;
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            filterTable();
        });

        // Filter by status
        document.getElementById('filterStatus').addEventListener('change', function() {
            filterTable();
        });

        function filterTable() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('filterStatus').value.toLowerCase();
            const tableRows = document.querySelectorAll('#reportsTableBody tr');

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const status = row.getAttribute('data-status');
                
                const matchesSearch = text.includes(searchValue);
                const matchesStatus = !statusFilter || status === statusFilter;

                if (matchesSearch && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // View detail
        function viewDetail(reportId) {
            alert(`Membuka detail Laporan #${reportId}`);
            // window.location.href = `report-detail.html?id=${reportId}`;
        }

        // Print report
        function printReport(reportId) {
            alert(`Mencetak Laporan #${reportId}`);
            // Implement print functionality
        }

        // Delete report
        function deleteReport(reportId) {
            if (confirm(`Apakah Anda yakin ingin menghapus Laporan #${reportId}?`)) {
                alert(`Laporan #${reportId} berhasil dihapus dari riwayat!`);
                // Implement delete functionality
            }
        }

        // Menu navigation
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function() {
                if (this.textContent.trim() === 'RIWAYAT') return;
                
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                const menuText = this.textContent.trim();
                document.querySelector('.header h1').textContent = menuText;

                if (window.innerWidth <= 968) {
                    toggleSidebar();
                }
            });
        });
    </script>
</body>
</html>