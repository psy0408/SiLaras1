<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - SiLaras</title>
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

        /* Top Bar */
        .top-bar {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .btn-add-user {
            background: #e8e8e8;
            color: #1a1f71;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .btn-add-user:hover {
            background: #d8d8d8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .search-box {
            flex: 1;
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

        /* User List */
        .user-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table thead {
            background: #f8f9fa;
        }

        .user-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e0e0e0;
        }

        .user-table td {
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
            color: #555;
        }

        .user-table tbody tr:hover {
            background: #f8f9fa;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
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

        .btn-reset {
            background: #e8e8e8;
            color: #1a1f71;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .btn-reset:hover {
            background: #d8d8d8;
            transform: translateY(-1px);
        }

        .btn-delete {
            background: transparent;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.3rem 0.5rem;
            transition: all 0.3s;
            color: #a41e1e;
        }

        .btn-delete:hover {
            color: #8b1a1a;
            transform: scale(1.1);
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
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .modal-content h3 {
            color: #1a1f71;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .modal-content .form-group {
            margin-bottom: 1.2rem;
        }

        .modal-content label {
            display: block;
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 0.4rem;
            font-weight: 500;
        }

        .modal-content input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .modal-content input:focus {
            outline: none;
            border-color: #5b4cdb;
            box-shadow: 0 0 0 3px rgba(91, 76, 219, 0.1);
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: flex-end;
        }

        .btn-cancel {
            background: #e8e8e8;
            color: #333;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-cancel:hover {
            background: #d8d8d8;
        }

        .btn-save {
            background: #1a1f71;
            color: white;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-save:hover {
            background: #2d3699;
        }

        .btn-confirm-delete {
            background: #a41e1e;
            color: white;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-confirm-delete:hover {
            background: #8b1a1a;
        }

        .modal-content .confirm-text {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
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

        /* Overlay */
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

            .top-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-add-user {
                width: 100%;
            }

            .user-table {
                font-size: 0.85rem;
            }

            .user-table th,
            .user-table td {
                padding: 0.7rem 0.5rem;
            }

            .action-buttons {
                flex-wrap: wrap;
                gap: 0.3rem;
            }

            .btn-edit,
            .btn-reset {
                padding: 0.4rem 0.7rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 640px) {
            .user-table th,
            .user-table td {
                padding: 0.5rem 0.3rem;
                font-size: 0.8rem;
            }

            .btn-reset {
                font-size: 0.75rem;
                padding: 0.3rem 0.5rem;
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
            <div class="menu-item" onclick="window.location.href='/report-ad'">REPORT</div>
            <div class="menu-item" onclick="window.location.href='/riwayat-ad'">RIWAYAT</div>
            <div class="menu-item active">USER</div>
        </nav>

        <div class="sidebar-logout">
            <button class="logout-btn" onclick="logout()">LOGOUT</button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>USER</h1>
        </div>

        <!-- Top Bar -->
        <div class="top-bar">
            <button class="btn-add-user" onclick="openAddModal()">Tambah User</button>
            <div class="search-box">
                <input type="text" placeholder="Search..." id="searchInput">
            </div>
        </div>

        <!-- User List -->
        <div class="user-section">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>NISN</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <tr>
                        <td>USER1</td>
                        <td>email1@gmail.com</td>
                        <td>00012345</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="openEditModal('USER1','email1@gmail.com','00012345')">Edit</button>
                                <button class="btn-reset" onclick="openResetModal('USER1')">Reset Password</button>
                                <button class="btn-delete" onclick="openDeleteModal('USER1')" title="Hapus">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>USER2</td>
                        <td>email2@gmail.com</td>
                        <td>00023456</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="openEditModal('USER2','email2@gmail.com','00023456')">Edit</button>
                                <button class="btn-reset" onclick="openResetModal('USER2')">Reset Password</button>
                                <button class="btn-delete" onclick="openDeleteModal('USER2')" title="Hapus">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>USER3</td>
                        <td>email3@gmail.com</td>
                        <td>00034567</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="openEditModal('USER3','email3@gmail.com','00034567')">Edit</button>
                                <button class="btn-reset" onclick="openResetModal('USER3')">Reset Password</button>
                                <button class="btn-delete" onclick="openDeleteModal('USER3')" title="Hapus">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>USER4</td>
                        <td>email4@gmail.com</td>
                        <td>00045678</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="openEditModal('USER4','email4@gmail.com','00045678')">Edit</button>
                                <button class="btn-reset" onclick="openResetModal('USER4')">Reset Password</button>
                                <button class="btn-delete" onclick="openDeleteModal('USER4')" title="Hapus">🗑️</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Add User Modal -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <h3>Tambah User Baru</h3>
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" id="addName" placeholder="Masukkan nama user">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="addEmail" placeholder="Masukkan email">
            </div>
            <div class="form-group">
                <label>NISN</label>
                <input type="text" id="addNisn" placeholder="Masukkan NISN">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="addPassword" placeholder="Masukkan password">
            </div>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('addModal')">Batal</button>
                <button class="btn-save" onclick="saveNewUser()">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <h3>Edit User</h3>
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" id="editName" disabled>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="editEmail">
            </div>
            <div class="form-group">
                <label>NISN</label>
                <input type="text" id="editNisn">
            </div>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('editModal')">Batal</button>
                <button class="btn-save" onclick="saveEditUser()">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div class="modal" id="resetModal">
        <div class="modal-content">
            <h3>Reset Password</h3>
            <p class="confirm-text" id="resetText"></p>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" id="resetPassword" placeholder="Masukkan password baru">
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" id="resetPasswordConfirm" placeholder="Ulang password baru">
            </div>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('resetModal')">Batal</button>
                <button class="btn-save" onclick="saveResetPassword()">Reset</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <h3>Konfirmasi Hapus</h3>
            <p class="confirm-text" id="deleteText"></p>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('deleteModal')">Batal</button>
                <button class="btn-confirm-delete" onclick="confirmDelete()">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script>
        let selectedUser = null;

        // Toggle sidebar
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }

        // Logout
        function logout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                alert('Logout berhasil!');
                window.location.href = '/login';
            }
        }

        // Open / Close Modal
        function openModal(id) {
            document.getElementById(id).classList.add('active');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
        }

        // Add User
        function openAddModal() {
            document.getElementById('addName').value = '';
            document.getElementById('addEmail').value = '';
            document.getElementById('addNisn').value = '';
            document.getElementById('addPassword').value = '';
            openModal('addModal');
        }

        function saveNewUser() {
            const name = document.getElementById('addName').value;
            const email = document.getElementById('addEmail').value;
            const nisn = document.getElementById('addNisn').value;
            const password = document.getElementById('addPassword').value;

            if (!name || !email || !nisn || !password) {
                alert('Silakan isi semua field terlebih dahulu.');
                return;
            }

            alert(`User baru "${name}" berhasil ditambahkan!`);
            closeModal('addModal');
            // Nanti: kirim data ke backend
        }

        // Edit User
        function openEditModal(name, email, nisn) {
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editNisn').value = nisn;
            selectedUser = name;
            openModal('editModal');
        }

        function saveEditUser() {
            alert(`User "${selectedUser}" berhasil diupdate!`);
            closeModal('editModal');
        }

        // Reset Password
        function openResetModal(name) {
            selectedUser = name;
            document.getElementById('resetText').textContent = `Reset password untuk user "${name}".`;
            document.getElementById('resetPassword').value = '';
            document.getElementById('resetPasswordConfirm').value = '';
            openModal('resetModal');
        }

        function saveResetPassword() {
            const pass = document.getElementById('resetPassword').value;
            const passConfirm = document.getElementById('resetPasswordConfirm').value;

            if (!pass || !passConfirm) {
                alert('Silakan isi kedua field password.');
                return;
            }

            if (pass !== passConfirm) {
                alert('Password tidak cocok. Coba lagi.');
                return;
            }

            alert(`Password "${selectedUser}" berhasil direset!`);
            closeModal('resetModal');
        }

        // Delete User
        function openDeleteModal(name) {
            selectedUser = name;
            document.getElementById('deleteText').textContent = `Apakah Anda yakin ingin menghapus user "${name}"? Aksi ini tidak bisa dibatalkan.`;
            openModal('deleteModal');
        }

        function confirmDelete() {
            alert(`User "${selectedUser}" berhasil dihapus!`);
            closeModal('deleteModal');
            // Nanti: hapus dari backend
        }

        // Search
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#userTableBody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });

        // Close modal on outside click
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function (e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>