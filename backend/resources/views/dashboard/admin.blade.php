<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | ALIVARE</title>

    <style>
        :root {
            --navy: #0f172a;
            --navy-light: #1e293b;
            --blue: #2563eb;
            --blue-hover: #1d4ed8;
            --blue-soft: #eff6ff;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-500: #64748b;
            --slate-800: #1e293b;
            --radius-md: 8px;
            --radius-lg: 12px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { margin: 0; font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: var(--bg-body); color: var(--navy); -webkit-font-smoothing: antialiased; }
        a { color: inherit; text-decoration: none; }
        button, input, select, textarea { font: inherit; }

        .app { display: flex; min-height: 100vh; }

        /* ====== SIDEBAR ====== */
        .sidebar { width: 240px; flex-shrink: 0; background: var(--navy); color: #ffffff; padding: 24px 16px; display: flex; flex-direction: column; }
        
        .brand { 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            background: #ffffff; 
            padding: 8px 12px; 
            border-radius: var(--radius-md); 
            margin-bottom: 24px; 
            width: 100%;
        }
        .brand img { 
            height: 44px !important; 
            width: auto !important; 
            max-width: 100% !important; 
            object-fit: contain; 
        }

        .menu-label { color: #64748b; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin: 16px 8px 8px; }
        
        .menu-item { display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 4px; border-radius: var(--radius-md); color: #94a3b8; font-size: 13px; font-weight: 500; transition: all 0.2s ease; }
        .menu-item:hover { background: var(--navy-light); color: #ffffff; }
        .menu-item.active { background: var(--blue); color: #ffffff; font-weight: 600; }
        .menu-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .menu-icon svg { width: 18px; height: 18px; }

        /* ====== MAIN CONTENT & TOPBAR ====== */
        .main { flex: 1; min-width: 0; display: flex; flex-direction: column; }
        
        .topbar { height: 64px; background: var(--card-bg); border-bottom: 1px solid var(--slate-200); padding: 0 32px; display: flex; align-items: center; justify-content: flex-end; position: sticky; top: 0; z-index: 20; }

        .top-actions { display: flex; align-items: center; gap: 16px; }
        .icon-button { 
            width: 38px; height: 38px; display: grid; place-items: center; 
            border: 0; border-radius: 50%; background: transparent; color: var(--slate-500); transition: 0.2s; cursor: pointer;
        }
        .icon-button:hover { background: var(--slate-100); color: var(--navy); }
        .icon-button svg { width: 20px; height: 20px; }

        .avatar { 
            width: 38px; 
            height: 38px; 
            border: 1.5px solid #bfdbfe; 
            border-radius: 50%; 
            background: #dbeafe; 
            color: #1d4ed8; 
            display: grid; 
            place-items: center; 
            font-weight: 700; 
            font-size: 15px; 
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(37, 99, 235, 0.12);
        }
        .avatar:hover { background: #bfdbfe; border-color: #93c5fd; color: #1e40af; }

        /* Menu Akun Dropdown */
        .account-menu { position: relative; }
        .account-dropdown { 
            position: absolute; top: calc(100% + 8px); right: 0; width: 240px; padding: 8px; 
            background: var(--card-bg); border: 1px solid var(--slate-200); 
            border-radius: var(--radius-lg); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); z-index: 100; 
        }
        .account-dropdown[hidden] { display: none; }
        .account-info { padding: 8px 12px; display: flex; flex-direction: column; text-align: left; }
        .account-info strong { font-size: 14px; color: var(--navy); }
        .account-info small { color: var(--slate-500); font-size: 12px; }
        .account-divider { height: 1px; background: var(--slate-200); margin: 6px 0; }
        .account-item { 
            width: 100%; display: flex; align-items: center; gap: 10px; padding: 10px 12px; 
            border: 0; border-radius: var(--radius-md); background: transparent; 
            color: var(--slate-800); font-size: 13px; font-weight: 500; transition: 0.2s; text-decoration: none; cursor: pointer;
        }
        .account-item:hover { background: var(--slate-100); color: var(--blue); }
        .account-icon { color: var(--slate-500); display: flex; }
        .account-item:hover .account-icon { color: var(--blue); }
        .account-icon svg { width: 16px; height: 16px; }
        .account-logout { color: #ef4444; }
        .account-logout:hover { background: #fef2f2; color: #ef4444; }
        .account-logout .account-icon { color: #ef4444; }
        .account-logout:hover .account-icon { color: #ef4444; }

        .content { max-width: 1400px; width: 100%; margin: 0 auto; padding: 32px; flex: 1; }

        .welcome { display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; margin-bottom: 28px; }
        .welcome h1 { font-size: 26px; font-weight: 700; letter-spacing: -0.5px; color: var(--navy); margin-bottom: 4px; }
        .welcome p { color: var(--slate-500); font-size: 14px; margin: 0; }
        .date-badge { padding: 8px 14px; background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-md); font-size: 12px; font-weight: 600; color: var(--slate-800); box-shadow: var(--shadow-sm); }

        .section-title { font-size: 16px; font-weight: 700; color: var(--navy); margin-bottom: 16px; }

        /* ====== STATS GRID ====== */
        .stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 20px; margin-bottom: 28px; }
        .stat-card { background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); padding: 20px; box-shadow: var(--shadow-sm); transition: transform 0.2s, box-shadow 0.2s; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }
        .stat-top { display: flex; align-items: center; justify-content: space-between; gap: 8px; margin-bottom: 16px; }
        .stat-label { color: var(--slate-500); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-icon { width: 38px; height: 38px; border-radius: var(--radius-md); background: var(--blue-soft); color: var(--blue); display: grid; place-items: center; }
        .stat-icon svg { width: 20px; height: 20px; }
        .stat-value { color: var(--navy); font-size: 28px; font-weight: 800; margin-bottom: 4px; letter-spacing: -0.5px; }
        .stat-note { color: var(--slate-500); font-size: 12px; }

        /* ====== PANELS GRID ====== */
        .panels { display: grid; grid-template-columns: 1.2fr 1fr; gap: 20px; margin-bottom: 28px; }
        .panel { background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); padding: 24px; box-shadow: var(--shadow-sm); }
        .panel h2 { color: var(--navy); font-size: 16px; font-weight: 700; margin-bottom: 20px; }

        .role-list { display: flex; flex-direction: column; gap: 16px; }
        .role-row { display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 600; }
        .role-info { display: flex; align-items: center; gap: 8px; }
        .role-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--blue); }
        .role-dot.owner { background: #10b981; }
        .role-dot.user { background: #f59e0b; }
        .role-count { color: var(--navy); font-weight: 700; }
        .role-bar { height: 6px; background: var(--slate-100); border-radius: 99px; overflow: hidden; margin-top: 6px; }
        .role-fill { height: 100%; background: var(--blue); border-radius: 99px; }
        .role-fill.owner { background: #10b981; }
        .role-fill.user { background: #f59e0b; }

        .monitor-list { display: flex; flex-direction: column; gap: 10px; }
        .monitor-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; border: 1px solid var(--slate-200); border-radius: var(--radius-md); color: var(--navy); font-size: 13px; font-weight: 500; transition: 0.2s; background: var(--card-bg); }
        .monitor-link:hover { border-color: var(--blue); background: var(--blue-soft); color: var(--blue); }
        .monitor-val { font-weight: 700; color: var(--blue); }

        .notice { margin-top: 20px; padding: 12px 14px; background: var(--bg-body); border: 1px solid var(--slate-200); border-radius: var(--radius-md); color: var(--slate-500); font-size: 12px; line-height: 1.5; }

        .footer { padding-top: 16px; color: var(--slate-500); font-size: 12px; text-align: center; border-top: 1px solid var(--slate-200); margin-top: auto; }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 1100px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
            .panels { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .app { flex-direction: column; }
            .sidebar { width: 100%; padding: 16px; }
            .topbar { padding: 0 16px; }
            .content { padding: 20px 16px; }
            .welcome { flex-direction: column; gap: 12px; }
            .stats { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
        </div>

        <div class="menu-label">MENU UTAMA</div>
        <a href="{{ route('dashboard.admin') }}" class="menu-item active">
            <span class="menu-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            </span>
            <span>Dashboard</span>
        </a>

        <div class="menu-label">MONITORING</div>
        <a href="{{ route('admin.users') }}" class="menu-item">
            <span class="menu-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </span>
            <span>Ringkasan Pengguna</span>
        </a>

        <a href="{{ route('admin.monitoring') }}" class="menu-item">
            <span class="menu-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V7l9-4 9 4v14"/><path d="M7 21v-4h4v4M7 9h2m6 0h2m-10 4h2m6 0h2"/></svg>
            </span>
            <span>Monitoring Data</span>
        </a>

        <a href="{{ route('admin.announcements') }}" class="menu-item {{ request()->routeIs('admin.announcements*') ? 'active' : '' }}">
            <span class="menu-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            </span>
            <span>Pengumuman</span>
        </a>
    </aside>

    <!-- MAIN -->
    <main class="main">
        <header class="topbar">
            <div class="top-actions">
                <button class="icon-button" type="button" aria-label="Notifikasi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                </button>

                <div class="account-menu">
                    <button class="avatar" id="accountMenuButton" type="button" aria-expanded="false" aria-controls="accountDropdown">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </button>
                    <div class="account-dropdown" id="accountDropdown" hidden>
                        <div class="account-info">
                            <strong>{{ auth()->user()->name ?? 'Administrator' }}</strong>
                            <small>{{ auth()->user()->email ?? 'admin@alivare.com' }}</small>
                        </div>

                        <div class="account-divider"></div>

                        <a href="{{ route('profile.edit') }}" class="account-item">
                            <span class="account-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </span>
                            <span>Profil Saya</span>
                        </a>

                        <div class="account-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="account-item account-logout">
                                <span class="account-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                </span>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <section class="content">

            <div class="welcome">
                <div>
                    <h1>Dashboard Admin</h1>
                    <p>Selamat datang di panel administrasi ALIVARE. Pantau data sistem dan kelola akun pengguna.</p>
                </div>

                <div class="date-badge">
                    {{ now()->translatedFormat('d F Y') }}
                </div>
            </div>

            <h2 class="section-title">Ringkasan Sistem</h2>

            <div class="stats">
                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Total Pengguna</span>
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                    </div>
                    <div class="stat-value">{{ number_format($totalUsers, 0, ',', '.') }}</div>
                    <div class="stat-note">Seluruh akun yang terdaftar di sistem.</div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Total Properti</span>
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V7l9-4 9 4v14"/><path d="M7 21v-4h4v4M7 9h2m6 0h2m-10 4h2m6 0h2"/></svg>
                        </div>
                    </div>
                    <div class="stat-value">{{ number_format($totalProperties, 0, ',', '.') }}</div>
                    <div class="stat-note">Seluruh properti yang tercatat.</div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Total Penyewa</span>
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                    </div>
                    <div class="stat-value">{{ number_format($totalTenants, 0, ',', '.') }}</div>
                    <div class="stat-note">Seluruh data penyewa yang tercatat.</div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Total Kamar</span>
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><circle cx="6" cy="11" r="2"/></svg>
                        </div>
                    </div>
                    <div class="stat-value">{{ number_format($totalRooms, 0, ',', '.') }}</div>
                    <div class="stat-note">Seluruh kamar yang tercatat.</div>
                </article>
            </div>

            <div class="panels">

                <section class="panel" id="statistik-pengguna">
                    <h2>Komposisi Akun Pengguna</h2>

                    @php
                        $accountTotal = max($totalUsers, 1);$adminPercent = ($totalAdmins / $accountTotal) * 100;
                        $ownerPercent = ($totalOwners / $accountTotal) * 100;
                        $userPercent = ($totalRegularUsers / $accountTotal) * 100;
                    @endphp

                    <div class="role-list">
                        <div>
                            <div class="role-row">
                                <div class="role-info">
                                    <span class="role-dot"></span>
                                    <span>Admin</span>
                                </div>
                                <span class="role-count">{{ number_format($totalAdmins, 0, ',', '.') }}</span>
                            </div>
                            <div class="role-bar">
                                <div class="role-fill" style="width: {{ min($adminPercent, 100) }}%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="role-row">
                                <div class="role-info">
                                    <span class="role-dot owner"></span>
                                    <span>Pemilik</span>
                                </div>
                                <span class="role-count">{{ number_format($totalOwners, 0, ',', '.') }}</span>
                            </div>
                            <div class="role-bar">
                                <div class="role-fill owner" style="width: {{ min($ownerPercent, 100) }}%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="role-row">
                                <div class="role-info">
                                    <span class="role-dot user"></span>
                                    <span>User</span>
                                </div>
                                <span class="role-count">{{ number_format($totalRegularUsers, 0, ',', '.') }}</span>
                            </div>
                            <div class="role-bar">
                                <div class="role-fill user" style="width: {{ min($userPercent, 100) }}%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="notice">
                        Statistik ini menampilkan jumlah akun berdasarkan role yang tersimpan di database.
                    </div>
                </section>

                <section class="panel" id="monitoring-data">
                    <h2>Monitoring Sistem</h2>

                    <div class="monitor-list">
                        <a href="{{ route('admin.users') }}" class="monitor-link">
                            <span>Ringkasan akun pengguna</span>
                            <span class="monitor-val">›</span>
                        </a>

                        <a href="{{ route('admin.monitoring') }}" class="monitor-link">
                            <span>Jumlah properti terdaftar</span>
                            <span class="monitor-val">{{ number_format($totalProperties, 0, ',', '.') }}</span>
                        </a>

                        <a href="{{ route('admin.monitoring') }}" class="monitor-link">
                            <span>Jumlah kamar terdaftar</span>
                            <span class="monitor-val">{{ number_format($totalRooms, 0, ',', '.') }}</span>
                        </a>

                        <a href="{{ route('admin.monitoring') }}" class="monitor-link">
                            <span>Jumlah penyewa terdaftar</span>
                            <span class="monitor-val">{{ number_format($totalTenants, 0, ',', '.') }}</span>
                        </a>
                    </div>

                    <div class="notice">
                        Admin hanya memiliki akses pemantauan data properti, kamar, dan penyewa. Perubahan data operasional tetap menjadi kewenangan pemilik.
                    </div>
                </section>

            </div>

            <footer class="footer">
                ALIVARE &copy; {{ now()->year }} — Panel Administrasi
            </footer>

        </section>
    </main>
</div>

<script>
const accBtn = document.getElementById('accountMenuButton');
const accDrop = document.getElementById('accountDropdown');
if (accBtn && accDrop) {
    accBtn.addEventListener('click', e => { 
        e.stopPropagation(); 
        accDrop.hidden = !accDrop.hidden; 
        accBtn.setAttribute('aria-expanded', !accDrop.hidden); 
    });
    accDrop.addEventListener('click', e => e.stopPropagation());
    document.addEventListener('click', () => { 
        accDrop.hidden = true; 
        accBtn.setAttribute('aria-expanded', 'false'); 
    });
}
</script>
</body>
</html>