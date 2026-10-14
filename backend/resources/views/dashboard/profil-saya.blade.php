<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - ALIVARE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --navy-dark: #0f172a;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --primary-border: #bfdbfe;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --danger: #dc2626;
            --danger-light: #fef2f2;
            --danger-border: #fecaca;
            --success: #16a34a;
            --success-light: #f0fdf4;
            --success-border: #bbf7d0;
            --radius-md: 10px;
            --radius-lg: 14px;
            --shadow-subtle: 0 1px 3px 0 rgba(15, 23, 42, 0.03);
            --shadow-card: 0 4px 6px -1px rgba(15, 23, 42, 0.04);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--slate-50);
            color: var(--slate-800);
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        .layout-wrapper {
            display: flex !important;
            min-height: 100vh !important;
            width: 100% !important;
        }

       

        /* =========================================================
           2. AREA KONTEN UTAMA & HEADER TOPBAR (DENGAN SEARCH BAR)
           ========================================================= */
        .main-content {
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
            min-width: 0 !important;
        }

        
.topbar {
    width: 100%;
    height: 48px;
    min-height: 48px;
    box-sizing: border-box;
    background: #fff;
    border-bottom: 1px solid var(--slate-200);
    padding: 0 16px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    position: sticky;
    top: 0;
    z-index: 20;
    flex-shrink: 0;
}

.topbar .top-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    margin-left: auto;
    flex-shrink: 0;
}

.topbar .icon-button,
.topbar .avatar {
    flex-shrink: 0;
}


        /* Search Bar di Header */
        .topbar-search {
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            background-color: var(--slate-50) !important;
            border: 1px solid var(--slate-200) !important;
            border-radius: var(--radius-md) !important;
            padding: 8px 14px !important;
            width: 340px !important;
        }

        .topbar-search svg {
            color: var(--slate-400) !important;
            flex-shrink: 0 !important;
        }

        .topbar-search input {
            border: none !important;
            background: transparent !important;
            font-size: 13px !important;
            color: var(--slate-600) !important;
            outline: none !important;
            width: 100% !important;
        }

        .content-body {
            padding: 32px;
            max-width: 960px;
            width: 100%;
            margin: 0 auto;
            box-sizing: border-box;
        }

        /* PAGE HEADER & BREADCRUMB */
        .page-header {
            margin-bottom: 28px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--slate-500);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .breadcrumb a {
            color: var(--slate-500);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb-separator {
            color: var(--slate-300);
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
            color: var(--navy-dark);
            letter-spacing: -0.02em;
            margin: 0 0 6px 0;
        }

        .page-subtitle {
            font-size: 14px;
            color: var(--slate-500);
            margin: 0;
        }

        /* ALERT NOTIFIKASI */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-radius: var(--radius-md);
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 24px;
        }

        .alert-success {
            background-color: var(--success-light);
            color: #14532d;
            border: 1px solid var(--success-border);
        }

        .alert-danger {
            background-color: var(--danger-light);
            color: #7f1d1d;
            border: 1px solid var(--danger-border);
        }

        .alert-icon {
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            margin-top: 1px;
        }

        /* CARD SYSTEM */
        .card {
            background: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            padding: 28px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-subtle);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--slate-100);
        }

        .card-title-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-icon-badge {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-md);
            background: var(--primary-light);
            color: var(--primary);
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--navy-dark);
            margin: 0;
        }

        .card-description {
            font-size: 13px;
            color: var(--slate-500);
            margin: 2px 0 0 0;
        }

        /* RINGKASAN PROFIL AKUN */
        .profile-summary-card {
            display: flex;
            align-items: center;
            gap: 20px;
            background: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-subtle);
        }

        .avatar-circle {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            background: var(--primary-light);
            border: 2px solid var(--primary-border);
            color: var(--primary);
            display: grid;
            place-items: center;
            font-size: 26px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .profile-info {
            flex: 1;
            min-width: 0;
        }

        .profile-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--navy-dark);
            margin: 0 0 4px 0;
        }

        .profile-email {
            font-size: 14px;
            color: var(--slate-500);
            margin: 0 0 10px 0;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background: #e0e7ff;
            color: #3730a3;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 600;
        }

        .role-badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #4f46e5;
        }

        /* FORM INPUTS & FIELD SETS */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--slate-700);
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-control {
            width: 100%;
            height: 42px;
            padding: 0 14px;
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-md);
            font-size: 14px;
            color: var(--slate-800);
            background-color: #ffffff;
            transition: all 0.15s ease-in-out;
            box-sizing: border-box;
        }

        .input-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .input-control.is-invalid {
            border-color: var(--danger);
            background-color: #fff5f5;
        }

        .input-control:disabled,
        .input-control[readonly] {
            background-color: var(--slate-100);
            color: var(--slate-600);
            cursor: not-allowed;
            border-color: var(--slate-200);
        }

        .password-toggle-btn {
            position: absolute;
            right: 12px;
            background: transparent;
            border: none;
            padding: 0;
            color: var(--slate-400);
            cursor: pointer;
            display: grid;
            place-items: center;
        }

        .password-toggle-btn:hover {
            color: var(--slate-600);
        }

        .field-hint {
            font-size: 12px;
            color: var(--slate-500);
            margin-top: 4px;
        }

        .error-message {
            font-size: 12px;
            color: var(--danger);
            font-weight: 500;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* TOMBOL UTAMA */
        .card-actions {
            margin-top: 24px;
            padding-top: 18px;
            border-top: 1px solid var(--slate-100);
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            padding: 0 20px;
            border-radius: var(--radius-md);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s ease-in-out;
            border: 1px solid transparent;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        @media (max-width: 768px) {
            .layout-wrapper {
                flex-direction: column !direction;
            }
            .sidebar-container, aside, .sidebar, [class*="sidebar"] {
                width: 100% !important;
                max-width: 100% !important;
                min-height: auto !important;
            }
            .topbar-search {
                display: none !important;
            }
            .content-body {
                padding: 20px 16px;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
            .form-group.full-width {
                grid-column: span 1;
            }
        }


/* SIDEBAR - mengikuti struktur dashboard ALIVARE */
.sidebar-container {
    width: 154px;
    min-width: 154px;
    max-width: 154px;
    min-height: 100vh;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    padding: 0;
    background: #fff;
    border-right: 1px solid var(--slate-200);
    box-sizing: border-box;
}

.sidebar-brand {
    height: 48px;
    min-height: 48px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 12px;
    margin: 0;
    border-bottom: 1px solid var(--slate-200);
    box-sizing: border-box;
}

.sidebar-brand .brand-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    text-decoration: none;
}

.sidebar-brand img {
    display: block;
    width: 64px;
    height: 38px;
    object-fit: contain;
    object-position: center;
}

.sidebar-nav {
    display: block;
    width: 100%;
    padding: 12px !important;
    box-sizing: border-box;
}

/* Menu utama */
.sidebar-nav .nav-label {
    display: block;
    width: 100%;
    padding: 10px 8px 8px;
    margin: 0;
    color: var(--slate-500);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .05em;
    text-transform: uppercase;
    box-sizing: border-box;
}

.sidebar-nav .nav-link {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    width: 100%;
    height: 36px;
    padding: 0 10px;
    margin: 0 0 4px;
    border-radius: 8px;
    color: var(--slate-600);
    background: transparent;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
    box-sizing: border-box;
}

.sidebar-nav .nav-link:hover {
    background: var(--slate-100);
}

.sidebar-nav .nav-link.active {
    background: var(--primary-light);
    color: var(--primary);
    font-weight: 600;
}

.sidebar-nav .nav-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 16px;
    height: 16px;
    flex: 0 0 16px;
}

.sidebar-nav .nav-icon svg {
    display: block;
    width: 16px;
    height: 16px;
    min-width: 16px;
    min-height: 16px;
    max-width: 16px;
    max-height: 16px;
    stroke: currentColor;
    stroke-width: 2;
    flex-shrink: 0;
}

@media (max-width: 768px) {
    .sidebar-container {
        width: 100%;
        min-width: 0;
        max-width: 100%;
        min-height: auto;
    }

    .sidebar-nav {
        padding: 8px !important;
    }
}


.logout-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 20px 24px;
    margin-bottom: 24px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
}

.logout-card h3 {
    margin: 0 0 6px;
    font-size: 14px;
    color: #0f172a;
}

.logout-card p {
    margin: 0;
    font-size: 13px;
    color: #64748b;
}

.logout-button {
    padding: 10px 20px;
    background: #fff;
    color: #dc2626;
    border: 1px solid #fecaca;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

.logout-button:hover {
    background: #fef2f2;
}


</head>
<body>

<div class="layout-wrapper">
    <!-- Sidebar Container dengan Logo Alivare & Menu Komponen -->
   
    
<aside class="sidebar-container">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard.pemilik') }}" class="brand-link">
            <img
                src="{{ asset('images/alivare-logo.png') }}"
                alt="Logo Alivare"
            >
        </a>
    </div>

    <nav class="sidebar-nav">
        @include('components.sidebar-menu')
    </nav>
</aside>


    <div class="main-content">
        <!-- Topbar Header dengan Search Bar & Profil Actions -->
        <header class="topbar">
            @include('components.topbar-actions')
        </header>

        <!-- Body Profil -->
        <main class="content-body">
            <!-- Header Judul -->
            <div class="page-header">
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('dashboard.pemilik') }}">Dashboard</a>
                    <span class="breadcrumb-separator">/</span>
                    <span style="color: var(--slate-800);">Profil Saya</span>
                </nav>
                <h1 class="page-title">Profil Saya</h1>
                <p class="page-subtitle">Kelola informasi pribadi, identitas akun, dan pengaturan keamanan Anda.</p>
            </div>

            <!-- Feedback Notifikasi -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="22 4 12 14.01 9 11.01" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <div>Terdapat beberapa kesalahan pada inputan Anda. Silakan periksa kembali form di bawah.</div>
                </div>
            @endif

            <!-- Ringkasan Profil Akun -->
            <div class="profile-summary-card">
                <div class="avatar-circle" aria-hidden="true">
                    {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                </div>
                <div class="profile-info">
                    <h2 class="profile-name">{{ auth()->user()->name ?? 'Pengelola ALIVARE' }}</h2>
                    <p class="profile-email">{{ auth()->user()->email }}</p>
                    <div class="role-badge">
                        <span class="role-badge-dot"></span>
                        <span>{{ auth()->user()->role === 'pemilik' ? 'Pemilik Properti' : (auth()->user()->role === 'admin' ? 'Administrator' : 'Penyewa Properti') }}</span>
                    </div>
                </div>
            </div>

            <!-- KARTU 1: Informasi Pribadi -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title-group">
                        <div class="card-icon-badge">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="card-title">Informasi Pribadi</h2>
                            <p class="card-description">Perbarui nama lengkap dan alamat email utama akun Anda.</p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="input-control @error('name') is-invalid @enderror" 
                                value="{{ old('name', auth()->user()->name) }}" 
                                required
                                autocomplete="name"
                            >
                            @error('name')
                                <span class="error-message" role="alert">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Alamat Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="input-control @error('email') is-invalid @enderror" 
                                value="{{ old('email', auth()->user()->email) }}" 
                                required
                                autocomplete="email"
                            >
                            @error('email')
                                <span class="error-message" role="alert">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label" for="role_display">Role Akun</label>
                            <input 
                                type="text" 
                                id="role_display" 
                                class="input-control" 
                                value="{{ auth()->user()->role === 'pemilik' ? 'Pemilik Properti (ALIVARE Owner)' : (auth()->user()->role === 'admin' ? 'Administrator System' : 'Penyewa Properti') }}" 
                                disabled 
                                readonly
                            >
                            <span class="field-hint">Role akun ditentukan oleh sistem dan tidak dapat diubah secara mandiri.</span>
                        </div>
                    </div>

                    <div class="card-actions">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>

            <!-- KARTU 2: Keamanan Akun -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title-group">
                        <div class="card-icon-badge">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="card-title">Keamanan Akun</h2>
                            <p class="card-description">Perbarui kata sandi Anda secara berkala untuk menjaga keamanan akun.</p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label class="form-label" for="current_password">Password Saat Ini</label>
                            <div class="input-wrapper">
                                <input 
                                    type="password" 
                                    id="current_password" 
                                    name="current_password" 
                                    class="input-control @error('current_password') is-invalid @enderror" 
                                    required
                                    autocomplete="current-password"
                                >
                                <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('current_password', this)" aria-label="Tampilkan password">
                                    <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                            @error('current_password')
                                <span class="error-message" role="alert">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">Password Baru</label>
                            <div class="input-wrapper">
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    class="input-control @error('password') is-invalid @enderror" 
                                    required
                                    autocomplete="new-password"
                                >
                                <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('password', this)" aria-label="Tampilkan password">
                                    <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                            <span class="field-hint">Minimal 8 karakter. Kombinasikan huruf, angka, dan simbol.</span>
                            @error('password')
                                <span class="error-message" role="alert">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Konfirmasi Password Baru</label>
                            <div class="input-wrapper">
                                <input 
                                    type="password" 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    class="input-control" 
                                    required
                                    autocomplete="new-password"
                                >
                                <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('password_confirmation', this)" aria-label="Tampilkan password">
                                    <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-actions">
                        <button type="submit" class="btn btn-primary">Perbarui Password</button>
                    </div>
                </form>
            </div>



<!-- Tombol Logout -->
<div class="logout-card">
    <div>
        <h3>Keluar dari Akun</h3>
        <p>Akhiri sesi login Anda di ALIVARE.</p>
    </div>

    <form method="POST" action="{{ route('logout') }}" id="logoutForm">
        @csrf
        <button
            type="button"
            class="logout-button"
            onclick="openLogoutModal()"
        >
            Keluar
        </button>
    </form>
</div>



        </main>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId, button) {
        const input = document.getElementById(inputId);
        if (!input) return;

        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';

        const svg = button.querySelector('svg');
        if (isPassword) {
            svg.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
            button.setAttribute('aria-label', 'Sembunyikan password');
        } else {
            svg.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
            button.setAttribute('aria-label', 'Tampilkan password');
        }
    }
</script>


<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="logout-modal" aria-hidden="true">
    <div class="logout-modal-backdrop" onclick="closeLogoutModal()"></div>

    <div class="logout-modal-card"
         role="dialog"
         aria-modal="true"
         aria-labelledby="logoutModalTitle">

        <div class="logout-modal-icon">
            <svg width="26" height="26" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="M10 17l5-5-5-5"/>
                <path d="M15 12H3"/>
                <path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
            </svg>
        </div>

        <h2 id="logoutModalTitle">Keluar dari Akun?</h2>
        <p>Apakah Anda yakin ingin keluar dari akun ALIVARE?</p>

        <div class="logout-modal-actions">
            <button type="button" class="logout-cancel"
                    onclick="closeLogoutModal()">
                Batal
            </button>

            <button type="button" class="logout-confirm"
                    onclick="document.getElementById('logoutForm').submit()">
                Ya, Keluar
            </button>
        </div>
    </div>
</div>

<style>
.logout-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.logout-modal.show {
    display: flex;
}

.logout-modal-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(15, 23, 42, .5);
    backdrop-filter: blur(3px);
}

.logout-modal-card {
    position: relative;
    width: 100%;
    max-width: 400px;
    padding: 28px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    box-shadow: 0 20px 50px rgba(15, 23, 42, .2);
    text-align: center;
    animation: logoutModalIn .18s ease-out;
}

.logout-modal-icon {
    display: grid;
    place-items: center;
    width: 54px;
    height: 54px;
    margin: 0 auto 16px;
    color: #dc2626;
    background: #fef2f2;
    border-radius: 50%;
}

.logout-modal-card h2 {
    margin: 0 0 10px;
    color: #0f172a;
    font-size: 20px;
    font-weight: 700;
}

.logout-modal-card p {
    margin: 0;
    color: #64748b;
    font-size: 14px;
    line-height: 1.6;
}

.logout-modal-actions {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 26px;
}

.logout-modal-actions button {
    min-height: 40px;
    padding: 0 18px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
}

.logout-cancel {
    color: #334155;
    background: #fff;
    border: 1px solid #cbd5e1;
}

.logout-cancel:hover {
    background: #f8fafc;
}

.logout-confirm {
    color: #fff;
    background: #dc2626;
    border: 1px solid #dc2626;
}

.logout-confirm:hover {
    background: #b91c1c;
}

@keyframes logoutModalIn {
    from {
        opacity: 0;
        transform: translateY(8px) scale(.98);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
</style>

<script>
function openLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.add('show');
    modal.setAttribute('aria-hidden', 'false');
}

function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.remove('show');
    modal.setAttribute('aria-hidden', 'true');
}

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        closeLogoutModal();
    }
});
</script>
</body>
</html>


</body>
</html>