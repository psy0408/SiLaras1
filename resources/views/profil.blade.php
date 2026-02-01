<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - SiLaras</title>
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

        /* Profile Content Grid */
        .profile-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 3rem 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            text-align: center;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: #d0d0d0;
            border-radius: 50%;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }

        .profile-name {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1a1f71;
            margin-bottom: 0.8rem;
        }

        .profile-email {
            font-size: 1.1rem;
            color: #888;
            margin-bottom: 0.5rem;
        }

        .profile-id {
            font-size: 1.1rem;
            color: #888;
        }

        /* Buttons */
        .buttons-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn-edit {
            background: #e8e8e8;
            color: #1a1f71;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1.15rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit:hover {
            background: #d8d8d8;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .btn-logout {
            background: #a41e1e;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1.15rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-logout:hover {
            background: #8b1a1a;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(164, 30, 30, 0.3);
        }

        /* Additional Info Section */
        .info-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .info-section h3 {
            color: #1a1f71;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #555;
        }

        .info-value {
            color: #888;
        }

        /* Footer */
        footer {
            background-color: #111827;
            color: #d1d5db;
            padding: 1.5rem 0;
            margin-top: 3rem;
            text-align: center;
        }

        footer .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            max-width: 400px;
            width: 90%;
            text-align: center;
        }

        .modal-content h3 {
            color: #1a1f71;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .modal-content p {
            color: #666;
            margin-bottom: 2rem;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn-cancel {
            background: #e8e8e8;
            color: #333;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-cancel:hover {
            background: #d8d8d8;
        }

        .btn-confirm {
            background: #a41e1e;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-confirm:hover {
            background: #8b1a1a;
        }

        /* Responsive */
        @media (max-width: 968px) {
            nav {
                gap: 1.5rem;
            }

            .profile-content {
                grid-template-columns: 1fr;
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

            header {
                flex-direction: column;
                gap: 1rem;
            }

            .profile-card {
                padding: 2rem 1.5rem;
            }

            .profile-name {
                font-size: 1.5rem;
            }

            .profile-email,
            .profile-id {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">SiLaras!</div>
        <nav>
            <a href="/home" >Home</a>
            <a href="/report">Report</a>
            <a href="/about">About us</a>
            <div class="profile-icon"><a href="/profil" class="active">👤</a></div>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="container">
        <!-- Profile Content Grid -->
        <div class="profile-content">
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-avatar">👤</div>
                <div class="profile-name">Nama Pengguna</div>
                <div class="profile-email">email@gmail.com</div>
                <div class="profile-id">00034567</div>
            </div>

            <!-- Additional Info -->
            <div class="info-section">
                <h3>Informasi Akun</h3>
                <div class="info-item">
                    <span class="info-label">Status</span>
                    <span class="info-value">Siswa Aktif</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Bergabung Sejak</span>
                    <span class="info-value">Januari 2026</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Total Laporan</span>
                    <span class="info-value">42 Laporan</span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="buttons-container">
            <button class="btn-logout" onclick="showLogoutModal()">Logout</button>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal" id="logoutModal">
        <div class="modal-content">
            <h3>Konfirmasi Logout</h3>
            <p>Apakah Anda yakin ingin keluar dari akun?</p>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="hideLogoutModal()">Batal</button>
                <button class="btn-confirm" onclick="confirmLogout()">Ya, Logout</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            © 2026 SiLaras!. All rights reserved.
        </div>
    </footer>

    <script>
        // Load user data (nanti dari backend)
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate loading user data
            const userData = {
                name: localStorage.getItem('userName') || 'Nama Pengguna',
                email: localStorage.getItem('userEmail') || 'email@gmail.com',
                id: localStorage.getItem('userId') || '00034567'
            };

            document.querySelector('.profile-name').textContent = userData.name;
            document.querySelector('.profile-email').textContent = userData.email;
            document.querySelector('.profile-id').textContent = userData.id;
        });

        // Logout Modal Functions
        function showLogoutModal() {
            document.getElementById('logoutModal').classList.add('active');
        }

        function hideLogoutModal() {
            document.getElementById('logoutModal').classList.remove('active');
        }

        function confirmLogout() {
            // Clear user data
            localStorage.removeItem('userName');
            localStorage.removeItem('userEmail');
            localStorage.removeItem('userId');
            
            // Redirect to login page
            alert('Logout berhasil!');
            window.location.href = '/';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('logoutModal');
            if (event.target == modal) {
                hideLogoutModal();
            }
        }
    </script>
</body>
</html>