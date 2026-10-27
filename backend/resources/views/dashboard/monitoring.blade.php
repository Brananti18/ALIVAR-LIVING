<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Data | ALIVARE</title>

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
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { margin: 0; font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: var(--bg-body); color: var(--navy); -webkit-font-smoothing: antialiased; }
        a { color: inherit; text-decoration: none; }
        button, input, select { font: inherit; }

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

        .heading { margin-bottom: 28px; }
        h1 { font-size: 26px; font-weight: 700; letter-spacing: -0.5px; color: var(--navy); margin-bottom: 4px; }
        .description { color: var(--slate-500); font-size: 14px; margin: 0; }

        .stats { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; margin-bottom: 28px; }
        .stat-card { background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); padding: 20px; box-shadow: var(--shadow-sm); }
        .stat-label { color: var(--slate-500); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
        .stat-value { color: var(--navy); font-size: 28px; font-weight: 800; }

        .panel { background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); padding: 24px; box-shadow: var(--shadow-sm); margin-bottom: 24px; }
        .panel h2 { color: var(--navy); font-size: 16px; font-weight: 700; margin-bottom: 4px; }
        .panel-description { color: var(--slate-500); font-size: 13px; margin-bottom: 20px; }

        .table-wrap { width: 100%; overflow-x: auto; border: 1px solid var(--slate-200); border-radius: var(--radius-md); }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 13px; white-space: nowrap; }
        th { background: var(--bg-body); color: var(--slate-500); font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 12px 16px; border-bottom: 1px solid var(--slate-200); }
        td { padding: 14px 16px; border-bottom: 1px solid var(--slate-100); color: var(--navy); }
        tbody tr:hover { background: var(--bg-body); }

        .status-badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 99px; font-size: 11px; font-weight: 700; background: var(--blue-soft); color: var(--blue); }
        
        .empty { text-align: center; color: var(--slate-500); padding: 40px 16px; font-size: 13px; }
        .empty-state { display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px; }
        .empty-icon { width: 36px; height: 36px; color: var(--slate-500); opacity: 0.6; }

        .pagination { display: flex; justify-content: flex-end; margin-top: 16px; font-size: 13px; }
        .pagination nav p { display: none; }
        .pagination nav div { display: flex; gap: 4px; }
        .pagination nav a, .pagination nav span span { padding: 6px 12px; border: 1px solid var(--slate-200); border-radius: var(--radius-md); color: var(--navy); text-decoration: none; background: var(--card-bg); font-size: 12px; }
        .pagination nav span[aria-current="page"] span { background: var(--blue); color: #ffffff; border-color: var(--blue); }

        .footer { padding-top: 16px; color: var(--slate-500); font-size: 12px; text-align: center; border-top: 1px solid var(--slate-200); margin-top: 32px; }

        @media (max-width: 768px) {
            .app { flex-direction: column; }
            .sidebar { width: 100%; padding: 16px; }
            .topbar { padding: 0 16px; }
            .content { padding: 20px 16px; }
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
        <a href="{{ route('dashboard.admin') }}" class="menu-item">
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

        <a href="{{ route('admin.monitoring') }}" class="menu-item active">
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

            <div class="heading">
                <div>
                    <h1>Monitoring Data</h1>
                    <p class="description">Pantau seluruh data properti, kamar, dan penyewa yang tercatat dalam sistem ALIVARE.</p>
                </div>
            </div>

            <div class="stats">
                <article class="stat-card">
                    <div class="stat-label">Total Properti</div>
                    <div class="stat-value">{{ number_format($totalProperties, 0, ',', '.') }}</div>
                </article>

                <article class="stat-card">
                    <div class="stat-label">Total Kamar</div>
                    <div class="stat-value">{{ number_format($totalRooms, 0, ',', '.') }}</div>
                </article>

                <article class="stat-card">
                    <div class="stat-label">Total Penyewa</div>
                    <div class="stat-value">{{ number_format($totalTenants, 0, ',', '.') }}</div>
                </article>
            </div>

            <section class="panel">
                <h2>Data Properti</h2>
                <p class="panel-description">Daftar properti beserta pemilik dan jumlah kamar.</p>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Properti</th>
                                <th>Pemilik</th>
                                <th>Alamat</th>
                                <th>Jumlah Kamar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($properties as $property)
                            <tr>
                                <td style="font-weight: 700;">{{ $property->name }}</td>
                                <td>{{ $property->user?->name ?? '-' }}</td>
                                <td>{{ $property->address ?? $property->location ?? '-' }}</td>
                                <td>{{ $property->rooms_count }}</td>
                                <td><span class="status-badge">{{ $property->status ?? 'Terdaftar' }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty">
                                    <div class="empty-state">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                        <span>Belum ada data properti.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="pagination">{{ $properties->links() }}</div>
            </section>

            <section class="panel">
                <h2>Data Kamar</h2>
                <p class="panel-description">Daftar kamar dan properti tempat kamar terdaftar.</p>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Nomor Kamar</th>
                                <th>Properti</th>
                                <th>Harga Sewa</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($rooms as $room)
                            <tr>
                                <td style="font-weight: 700;">{{ $room->room_number }}</td>
                                <td>{{ $room->property?->name ?? '-' }}</td>
                                <td>{{ $room->price !== null ? 'Rp ' . number_format($room->price, 0, ',', '.') : '-' }}</td>
                                <td><span class="status-badge">{{ $room->status ?? 'Terdaftar' }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">
                                    <div class="empty-state">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                        <span>Belum ada data kamar.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="pagination">{{ $rooms->links() }}</div>
            </section>

            <section class="panel">
                <h2>Data Penyewa</h2>
                <p class="panel-description">Daftar penyewa beserta kamar dan properti terkait.</p>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Penyewa</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Properti</th>
                                <th>Kamar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($tenants as $tenant)
                            <tr>
                                <td style="font-weight: 700;">{{ $tenant->name }}</td>
                                <td>{{ $tenant->email ?? '-' }}</td>
                                <td>{{ $tenant->phone ?? '-' }}</td>
                                <td>{{ $tenant->room?->property?->name ?? '-' }}</td>
                                <td>{{ $tenant->room?->room_number ?? '-' }}</td>
                                <td><span class="status-badge">{{ $tenant->status ?? 'Terdaftar' }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty">
                                    <div class="empty-state">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                        <span>Belum ada data penyewa.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="pagination">{{ $tenants->links() }}</div>
            </section>

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