<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman | ALIVARE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            /* Warna SaaS Premium (Samakan persis dengan pemilik.blade.php) */
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-soft: #eff6ff;
            --navy: #0f172a;
            --navy-light: #1e293b;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;

            /* Status Colors */
            --success: #10b981;
            --success-bg: #ecfdf5;
            --warning: #f59e0b;
            --warning-bg: #fffbeb;
            --danger: #ef4444;
            --danger-bg: #fef2f2;

            /* Geometri */
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--bg-body);
            color: var(--navy);
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        button, input, select { font: inherit; }
        button { cursor: pointer; }
        a { color: inherit; text-decoration: none; }

        /* ====== HEADER / TOPBAR (PENUH DI ATAS) ====== */
        .topbar {
            min-height: 70px; padding: 0 24px;
            display: flex; align-items: center; gap: 32px;
            background: var(--card-bg); border-bottom: 1px solid var(--slate-200);
            position: sticky; top: 0; z-index: 30;
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 170px;
        }
        .brand img {
            height: 44px !important;
            width: auto !important;
            max-width: 100% !important;
            object-fit: contain;
        }

        .top-actions { margin-left: auto; display: flex; align-items: center; gap: 16px; }
        .icon-button {
            width: 38px; height: 38px; display: grid; place-items: center;
            border: 0; border-radius: 50%; background: transparent; color: var(--slate-500); transition: 0.2s; text-decoration: none;
        }
        .icon-button:hover, .icon-button.active { background: var(--slate-100); color: var(--primary); }
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

        .avatar:hover {
            background: #bfdbfe;
            border-color: #93c5fd;
            color: #1e40af;
        }

        /* Menu Akun Dropdown */
        .account-menu { position: relative; }
        .account-dropdown {
            position: absolute; top: calc(100% + 8px); right: 0; width: 240px; padding: 8px;
            background: var(--card-bg); border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg); box-shadow: var(--shadow-md); z-index: 100;
        }
        .account-dropdown[hidden] { display: none; }
        .account-info { padding: 8px 12px; display: flex; flex-direction: column; text-align: left; }
        .account-info strong { font-size: 14px; color: var(--navy); }
        .account-info small { color: var(--slate-500); font-size: 12px; }
        .account-divider { height: 1px; background: var(--slate-200); margin: 6px 0; }
        .account-item {
            width: 100%; display: flex; align-items: center; gap: 10px; padding: 10px 12px;
            border: 0; border-radius: var(--radius-sm); background: transparent;
            color: var(--slate-800); font-size: 13px; font-weight: 500; transition: 0.2s; text-decoration: none; cursor: pointer;
        }
        .account-item:hover { background: var(--slate-100); color: var(--primary); }
        .account-icon { color: var(--slate-500); display: flex; }
        .account-item:hover .account-icon { color: var(--primary); }
        .account-icon svg { width: 16px; height: 16px; }
        .account-logout { color: var(--danger); }
        .account-logout:hover { background: var(--danger-bg); color: var(--danger); }
        .account-logout .account-icon { color: var(--danger); }
        .account-logout:hover .account-icon { color: var(--danger); }

        /* ====== LAYOUT & SIDEBAR (220px) ====== */
        .layout { display: flex; min-height: calc(100vh - 70px); }

        .sidebar { width: 220px; padding: 24px 16px; background: var(--card-bg); border-right: 1px solid var(--slate-200); flex-shrink: 0; }

        .main { flex: 1; min-width: 0; max-width: 1280px; margin: 0 auto; padding: 32px; }

        /* ====== CONTENT & KARTU PENGUMUMAN ====== */
        .page-heading { margin-bottom: 28px; }
        h1 { font-size: 26px; font-weight: 700; letter-spacing: -0.5px; color: var(--navy); margin-bottom: 4px; }
        .subtitle { color: var(--slate-500); font-size: 14px; margin: 0; }

        .announcement-list { display: flex; flex-direction: column; gap: 16px; margin-bottom: 24px; }

        .announcement-card {
            background: var(--card-bg);
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .announcement-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .announcement-header { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 12px; }
        .announcement-title { font-size: 17px; font-weight: 700; color: var(--navy); line-height: 1.4; margin: 0; }

        .badge-active {
            display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px;
            border-radius: 99px; font-size: 11px; font-weight: 700; background: var(--success-bg); color: var(--success); flex-shrink: 0;
        }
        .badge-active::before { content: ""; width: 6px; height: 6px; border-radius: 50%; background: var(--success); }

        .announcement-body {
            font-size: 14px; color: var(--slate-700); line-height: 1.6;
            white-space: pre-line; word-break: break-word; margin-bottom: 18px;
        }

        .announcement-meta {
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;
            padding-top: 14px; border-top: 1px solid var(--slate-100); font-size: 12px; color: var(--slate-500);
        }
        .author-info { display: flex; align-items: center; gap: 8px; font-weight: 600; color: var(--navy); }
        .author-avatar { width: 24px; height: 24px; border-radius: 50%; background: var(--primary-soft); color: var(--primary); display: grid; place-items: center; font-size: 11px; font-weight: 700; }

        .time-info { display: flex; align-items: center; gap: 6px; color: var(--slate-500); }
        .time-info svg { width: 14px; height: 14px; }

        /* EMPTY STATE */
        .empty-card {
            background: var(--card-bg); border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg); padding: 56px 24px; text-align: center; box-shadow: var(--shadow-sm);
        }
        .empty-state { display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px; }
        .empty-icon { width: 42px; height: 42px; color: var(--slate-500); opacity: 0.5; }
        .empty-title { font-size: 15px; font-weight: 700; color: var(--navy); }
        .empty-desc { font-size: 13px; color: var(--slate-500); max-width: 400px; margin: 0 auto; }

        .pagination { display: flex; justify-content: flex-end; margin-top: 20px; font-size: 13px; }
        .pagination nav p { display: none; }
        .pagination nav div { display: flex; gap: 4px; }
        .pagination nav a, .pagination nav span span { padding: 6px 12px; border: 1px solid var(--slate-200); border-radius: var(--radius-md); color: var(--navy); text-decoration: none; background: var(--card-bg); font-size: 12px; }
        .pagination nav span[aria-current="page"] span { background: var(--primary); color: #ffffff; border-color: var(--primary); }

        .footer { padding-top: 16px; color: var(--slate-500); font-size: 12px; text-align: center; border-top: 1px solid var(--slate-200); margin-top: 32px; }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 1024px) {
            .sidebar { width: 200px; padding: 24px 12px; }
            .main { padding: 24px; }
        }

        @media (max-width: 768px) {
            .topbar { padding: 0 16px; gap: 16px; }
            .brand { width: auto; }
            .sidebar { display: none; }
            .main { padding: 20px 16px; }
            .announcement-header { flex-direction: column; gap: 8px; }
        }
    </style>
</head>
<body>

<!-- 1. TOPBAR MELINTANG PENUH DI ATAS -->
<header class="topbar">
    <div class="brand">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
    </div>

    <div class="top-actions">
        <a href="{{ route('dashboard.pengumuman') }}"
           class="icon-button {{ request()->routeIs('dashboard.pengumuman') ? 'active' : '' }}"
           aria-label="Pengumuman"
           title="Pengumuman">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
        </a>

        <div class="account-menu">
            <button class="avatar" id="accountMenuButton" type="button" aria-expanded="false" aria-controls="accountDropdown">
                {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
            </button>
            <div class="account-dropdown" id="accountDropdown" hidden>
                <div class="account-info">
                    <strong>{{ auth()->user()->name ?? 'Pemilik Properti' }}</strong>
                    <small>{{ auth()->user()->email ?? 'pemilik@alivare.com' }}</small>
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

<!-- 2. LAYOUT BERISI SIDEBAR & KONTEN UTAMA -->
<div class="layout">
    <aside class="sidebar">
        @include('components.sidebar-menu')
    </aside>

    <main class="main">
        <div class="page-heading">
            <h1>Pengumuman</h1>
            <p class="subtitle">Informasi dan pemberitahuan resmi dari tim administrasi ALIVARE.</p>
        </div>

        <div class="announcement-list">
            @forelse ($announcements as $announcement)
                <article class="announcement-card">
                    <div class="announcement-header">
                        <h2 class="announcement-title">{{ $announcement->title }}</h2>
                        @if ($announcement->is_active)
                            <span class="badge-active">Pengumuman Aktif</span>
                        @endif
                    </div>

                    <div class="announcement-body">
                        {{ $announcement->content }}
                    </div>

                    <div class="announcement-meta">
                        <div class="author-info">
                            <div class="author-avatar">
                                {{ strtoupper(substr($announcement->creator?->name ?? 'A', 0, 1)) }}
                            </div>
                            <span>{{ $announcement->creator?->name ?? 'Administrator' }}</span>
                        </div>

                        <div class="time-info">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <span>
                                {{ $announcement->created_at ? $announcement->created_at->translatedFormat('d M Y, H:i') : '-' }} WIB
                            </span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-card">
                    <div class="empty-state">
                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <div class="empty-title">Belum ada pengumuman saat ini.</div>
                        <div class="empty-desc">Saat ini belum ada pengumuman aktif dari tim administrasi ALIVARE. Pengumuman terbaru akan muncul di sini.</div>
                    </div>
                </div>
            @endforelse
        </div>

        @if ($announcements->hasPages())
            <div class="pagination">
                {{ $announcements->links() }}
            </div>
        @endif

        <footer class="footer">
            ALIVARE &copy; {{ date('Y') }} — Panel Pemilik Properti
        </footer>
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
