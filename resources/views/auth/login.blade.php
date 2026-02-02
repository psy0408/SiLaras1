<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Login - SiLaras</title>

    <style>
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
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .logo, .login-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1a1f71;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            font-size: 0.9rem;
            color: #555;
            display: block;
            margin-bottom: 0.4rem;
        }

        input {
            width: 100%;
            padding: 0.9rem;
            border: 1.5px solid #ddd;
            border-radius: 8px;
        }

        .login-btn {
            width: 100%;
            background: #1a1f71;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 1rem;
        }

        .error {
            color: #dc2626;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <div class="logo">SiLaras!</div>
        <div class="login-title">Login</div>
    </div>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Masukkan email Anda"
                value="{{ old('email') }}"
                required
            >
        </div>
         
        <div class="form-group">
            <label for="nisn">NISN</label>
            <input
                type="text"
                id="nisn"
                name="nisn"
                placeholder="Masukkan NISN"
                value="{{ old('nisn') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password"
                required
            >
        </div>

        <button type="submit" class="login-btn">
            Login
        </button>
    </form>
</div>

</body>
</html>
