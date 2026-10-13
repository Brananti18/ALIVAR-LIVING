
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — ALIVARE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #1e40af; /* Navy Blue */
            --primary-hover: #1e3a8a; /* Dark Navy */
            --primary-focus: rgba(30, 64, 175, 0.25);
            --bg-color: #f1f5f9; /* Soft Slate Gray/Blue */
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #cbd5e1;
            --input-focus: #3b82f6; /* Bright Blue */
            --error-bg: #fef2f2;
            --error-text: #b91c1c;
            --error-border: #f87171;
            --radius-md: 8px;
            --radius-lg: 16px;
        }

        * {
            box-sizing: border-box;
        }

        body {
    margin: 0;
    font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
    background-color: #eef5fc;
    background-image:
        linear-gradient(rgba(238, 245, 252, 0.20), rgba(238, 245, 252, 0.20)),
        url('/images/login-background.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: var(--text-main);
    -webkit-font-smoothing: antialiased;
}

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            padding: 48px 40px;
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .brand {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-icon {
            height: 80px; /* Ukuran logo diperbesar */
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-icon img {
            height: 100%;
            width: auto;
            object-fit: contain;
        }

        .heading {
            text-align: center;
            margin-bottom: 32px;
        }

        .heading h2 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 700;
            color: var(--text-main);
        }

        .heading p {
            margin: 0;
            color: var(--text-muted);
            font-size: 15px;
            line-height: 1.5;
        }

        .error-message {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0 0 24px;
            padding: 12px 16px;
            border: 1px solid var(--error-border);
            border-radius: var(--radius-md);
            background: var(--error-bg);
            color: var(--error-text);
            font-size: 14px;
            font-weight: 500;
        }

        .error-message svg {
            flex-shrink: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
        }

        .form-group input.form-control {
            display: block;
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            background: var(--card-bg);
            color: var(--text-main);
            font-size: 15px;
            transition: all 0.2s ease-in-out;
            outline: none;
        }

        .form-group input.form-control::placeholder {
            color: #94a3b8;
        }

        .form-group input.form-control:focus {
            border-color: var(--input-focus);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        .password-wrapper {
            position: relative;
            width: 100%;
        }

        .password-wrapper input {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 8px;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 6px;
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            transition: color 0.2s, background 0.2s;
        }

        .toggle-password:hover {
            color: var(--text-main);
            background: #f1f5f9;
        }

        .toggle-password:focus-visible {
            outline: 2px solid var(--input-focus);
            outline-offset: 1px;
            background: #f1f5f9;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 14px;
            color: var(--text-muted);
            user-select: none;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .forgot-password {
            font-size: 14px;
            font-weight: 600;
            color: var(--primary);
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-password:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: var(--radius-md);
            background: var(--primary);
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 4px 6px -1px rgba(30, 64, 175, 0.2), 0 2px 4px -1px rgba(30, 64, 175, 0.1);
        }

        .login-button:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 10px -1px rgba(30, 64, 175, 0.25), 0 4px 6px -1px rgba(30, 64, 175, 0.15);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button:focus-visible {
            outline: none;
            box-shadow: 0 0 0 4px var(--primary-focus);
        }

        .register-link {
            margin-top: 32px;
            text-align: center;
            color: var(--text-muted);
            font-size: 14px;
        }

        .register-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            margin-left: 4px;
        }

        .register-link a:hover {
            text-decoration: underline;
            color: var(--primary-hover);
        }

        .footer {
            margin-top: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
        }

        /* Responsive Styles */
        @media (max-width: 480px) {
            .login-card {
                padding: 32px 24px;
                border-radius: 12px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            }
            
            .heading h2 {
                font-size: 22px;
            }

            .login-button {
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <main class="login-page">
        <section class="login-card">

            <header class="brand">
                <div class="brand-icon">
                    <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo ALIVARE">
                </div>
            </header>

            <div class="heading">
                <h2>Selamat Datang!</h2>
                <p>Hunian Nyaman, Hidup Lebih Tenang.</p>
            </div>

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                @if ($errors->any())
                    <div class="error-message" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="username"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >
                        <button
                            type="button"
                            id="togglePassword"
                            class="toggle-password"
                            aria-label="Tampilkan password"
                            aria-pressed="false"
                        >
                            <svg
                                id="eyeIcon"
                                xmlns="http://www.w3.org/2000/svg"
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-actions">
                    <label class="remember-me" for="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="forgot-password">Lupa password?</a>
                </div>

                <button type="submit" class="login-button">
                    Masuk
                </button>
            </form>

            <div class="register-link">
                Belum punya akun? <a href="#">Daftar sekarang</a>
            </div>

            <footer class="footer">
                &copy; {{ date('Y') }} ALIVARE. All rights reserved.
            </footer>

        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');

            toggleButton.addEventListener('click', function () {
                const isPasswordHidden = passwordInput.type === 'password';
                
                passwordInput.type = isPasswordHidden ? 'text' : 'password';

                toggleButton.setAttribute('aria-pressed', String(isPasswordHidden));
                toggleButton.setAttribute(
                    'aria-label',
                    isPasswordHidden ? 'Sembunyikan password' : 'Tampilkan password'
                );

                if (isPasswordHidden) {
                    eyeIcon.innerHTML = `
                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                        <line x1="1" y1="1" x2="23" y2="23"></line>
                    `;
                } else {
                    eyeIcon.innerHTML = `
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    `;
                }
            });
        });
    </script>
</body>
</html>

```