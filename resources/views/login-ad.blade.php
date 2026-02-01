<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SiLaras</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
        }

        .login-header {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1a1f71;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1a1f71;
        }

        .admin-badge {
            background: linear-gradient(135deg, #a41e1e 0%, #c92a2a 100%);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
            background: #fafafa;
        }

        input[type="email"]:focus,
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #a41e1e;
            background: white;
            box-shadow: 0 0 0 3px rgba(164, 30, 30, 0.1);
        }

        input::placeholder {
            color: #999;
        }

        .login-btn {
            width: 100%;
            background: #1a1f71;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }

        .login-btn:hover {
            background: #2d3699;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(26, 31, 113, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .forgot-password {
            text-align: center;
            margin-top: 1.5rem;
        }

        .forgot-password a {
            color: #5b4cdb;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .forgot-password a:hover {
            color: #4a3bb8;
            text-decoration: underline;
        }

        .register-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e0e0e0;
            color: #666;
        }

        .register-link a {
            color: #5b4cdb;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .register-link a:hover {
            color: #4a3bb8;
            text-decoration: underline;
        }

        .admin-notice {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 8px;
        }

        .admin-notice p {
            color: #856404;
            font-size: 0.9rem;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .login-container {
                padding: 2rem 1.5rem;
            }

            .login-header {
                gap: 1rem;
                flex-wrap: wrap;
            }

            .logo,
            .login-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">SiLaras!</div>
            <div class="login-title">Login</div>
            <div class="admin-badge">ADMIN</div>
        </div>

        <div class="admin-notice">
            <p>⚠️ Halaman ini khusus untuk Administrator. Akses tidak sah akan dicatat.</p>
        </div>

        <form id="adminLoginForm">
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Masukkan email admin"
                    required
                >
            </div>

            <div class="form-group">
                <label for="adminId">ID Admin</label>
                <input 
                    type="text" 
                    id="adminId" 
                    name="adminId" 
                    placeholder="Masukkan ID admin"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan password admin"
                    required
                >
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="forgot-password">
            <a href="/login">Login sebagai Siswa</a>
        </div>

        <div class="register-link">
            Kembali ke <a href="/">Halaman Utama</a>
        </div>
    </div>

    <script>
        // Admin login validation
        document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const adminId = document.getElementById('adminId').value;
            const password = document.getElementById('password').value;

            if (email && adminId && password) {
                alert('Login Admin berhasil! (Demo)');
                // Di sini nanti akan diproses ke backend untuk verifikasi admin
                window.location.href = '/admin';
            }
        });
    </script>
</body>
</html>