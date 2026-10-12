<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login — ALIVARE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Instrument Sans', Arial, sans-serif;
            background: #faf7f2;
            color: #35251d;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 20px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 40px;
            background: #fff;
            border: 1px solid #eee5dc;
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(65, 42, 25, 0.07);
        }

        .brand {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-icon {
            width: 56px;
            height: 56px;
            margin: 0 auto 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: #f3e3d2;
            color: #9a572d;
            font-size: 27px;
            font-weight: 700;
        }

        .brand h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
            font-weight: 800;
        }

        .brand p {
            margin: 8px 0 0;
            color: #82766e;
            font-size: 14px;
        }

        .heading {
            margin-bottom: 24px;
        }

        .heading h2 {
            margin: 0 0 8px;
            font-size: 23px;
        }

        .heading p {
            margin: 0;
            color: #82766e;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #e4d9ce;
            border-radius: 10px;
            background: #fff;
            outline: none;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus {
            border-color: #a65e32;
            box-shadow: 0 0 0 3px rgba(166, 94, 50, 0.12);
        }

        .forgot-password {
            display: block;
            margin-top: -5px;
            margin-bottom: 24px;
            text-align: right;
            font-size: 13px;
            color: #9a572d;
            text-decoration: none;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #8f4e2b;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }

        .login-button:hover {
            background: #713b20;
        }

        .register-link {
            margin-top: 24px;
            text-align: center;
            color: #82766e;
            font-size: 14px;
        }

        .register-link a {
            color: #9a572d;
            font-weight: 700;
            text-decoration: none;
        }

        .footer {
            margin-top: 28px;
            text-align: center;
            color: #a1968e;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 28px 22px;
            }

            .brand h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>
    <main class="login-page">
        <section class="login-card">

            <header class="brand">
                <div class="brand-icon">A</div>
                <h1>ALIVARE</h1>
                <p>Hunian nyaman, pengelolaan lebih mudah.</p>
            </header>

            <div class="heading">
                <h2>Selamat Datang!</h2>
                <p>Masuk ke akun Anda untuk melanjutkan.</p>
            </div>

            <form method="POST" action="{{ route('login.process') }}">
    @csrf

    @if ($errors->any())
        <p style="color: #b91c1c; font-size: 14px; margin-bottom: 16px;">
            {{ $errors->first() }}
        </p>
    @endif
    
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="nama@email.com"
                        autocomplete="email"
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
                        autocomplete="current-password"
                        required
                    >
                </div>

                <a href="#" class="forgot-password">
                    Lupa password?
                </a>

                <button type="submit" class="login-button">
                    Masuk
                </button>
            </form>

            <div class="register-link">
                Belum punya akun?
                <a href="#">Daftar sekarang</a>
            </div>

            <footer class="footer">
                &copy; 2026 ALIVARE. All rights reserved.
            </footer>

        </section>
    </main>
</body>
</html>