<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title") - ALIVARE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-soft: #eff6ff;
            --navy: #0f172a;
            --navy-light: #1e293b;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-500: #64748b;
            --slate-800: #1e293b;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --success: #10b981;
            --success-bg: #ecfdf5;
            --warning: #f59e0b;
            --warning-bg: #fffbeb;
            --danger: #ef4444;
            --danger-bg: #fef2f2;
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --shadow-modal: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--bg-body);
            color: var(--navy);
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        button, input, select, textarea { font: inherit; }
        button { cursor: pointer; }

        .topbar {
            min-height: 70px; padding: 0 24px;
            display: flex; align-items: center; justify-content: space-between; gap: 32px;
            background: var(--card-bg); border-bottom: 1px solid var(--slate-200);
            position: sticky; top: 0; z-index: 30;
        }
        .brand { display: flex; align-items: center; justify-content: center; height: 100%; width: 170px; flex-shrink: 0; }
        .brand img { height: 44px !important; width: auto !important; max-width: 100% !important; object-fit: contain; }

        .layout { display: flex; min-height: calc(100vh - 70px); }
        .sidebar { width: 220px; padding: 24px 16px; background: var(--card-bg); border-right: 1px solid var(--slate-200); flex-shrink: 0; }
        .main { flex: 1; min-width: 0; max-width: 1280px; margin: 0 auto; padding: 32px; }

        .page-heading { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        h1 { margin: 0 0 4px; font-size: 26px; font-weight: 700; letter-spacing: -0.5px; }
        .subtitle { color: var(--slate-500); margin: 0; font-size: 14px; }

        .btn {
            display: inline-flex !important; flex-direction: row !important; align-items: center !important;
            justify-content: center !important; gap: 8px !important; padding: 10px 18px !important;
            border-radius: var(--radius-md) !important; font-size: 13px !important; font-weight: 600 !important;
            text-decoration: none !important; transition: all 0.2s ease !important; white-space: nowrap !important; cursor: pointer !important;
        }
        .btn svg { width: 16px !important; height: 16px !important; max-width: 16px !important; max-height: 16px !important; flex: 0 0 16px !important; display: inline-block !important; margin: 0 !important; }
        .btn-primary { background-color: var(--primary) !important; color: #ffffff !important; border: 1px solid var(--primary) !important; box-shadow: var(--shadow-sm) !important; }
        .btn-primary:hover { background-color: var(--primary-hover) !important; transform: translateY(-1px); box-shadow: var(--shadow-md) !important; }
        .btn-secondary { background-color: #ffffff !important; color: var(--navy) !important; border: 1px solid var(--slate-200) !important; }
        .btn-secondary:hover { background-color: var(--slate-100) !important; }
        .btn-danger { background-color: #ffffff !important; color: var(--danger) !important; border: 1px solid #fecaca !important; }
        .btn-danger:hover { background-color: var(--danger-bg) !important; border-color: #fca5a5 !important; }
        .btn-sm { padding: 7px 12px !important; font-size: 12px !important; gap: 6px !important; }
        .btn-sm svg { width: 14px !important; height: 14px !important; max-width: 14px !important; max-height: 14px !important; flex: 0 0 14px !important; }

        .alert { border-radius: var(--radius-md); padding: 14px 16px; margin-bottom: 24px; font-size: 14px; background: var(--success-bg); color: #065f46; border: 1px solid #a7f3d0; }

        .panel { background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden; }
        .panel-head { padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--slate-200); }
        .panel-head h2 { font-size: 16px; font-weight: 700; margin: 0; }
        .panel-head .subtitle { font-size: 13px; font-weight: 500; }

        .filters { display: flex; gap: 16px; padding: 16px 24px; background: #fcfdfd; border-bottom: 1px solid var(--slate-200); }
        .filter-search-wrapper { position: relative; flex: 1; }
        .filter-search-wrapper svg { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--slate-500); width: 16px; height: 16px; }
        .filters input, .filters select {
            width: 100%; padding: 9px 14px; border: 1px solid var(--slate-200);
            border-radius: var(--radius-md); background: var(--card-bg);
            color: var(--navy); font-size: 13px; outline: none; transition: 0.2s;
        }
        .filters input { padding-left: 38px; }
        .filters select { min-width: 180px; width: auto; cursor: pointer; }
        .filters input:focus, .filters select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }

        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 14px 24px; background: #fcfdfd; color: var(--slate-500); font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid var(--slate-200); white-space: nowrap; }
        td { padding: 16px 24px; color: var(--navy); font-size: 14px; border-bottom: 1px solid var(--slate-200); vertical-align: middle; }
        tbody tr { transition: background-color 0.2s; }
        tbody tr:hover { background-color: var(--slate-50); }
        tbody tr:last-child td { border-bottom: none; }

        .status { display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 99px; font-size: 12px; font-weight: 600; white-space: nowrap; text-transform: capitalize; }
        .status::before { content: ""; width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
        .status.aktif { background: var(--success-bg); color: var(--success); }
        .status.keluar { background: var(--danger-bg); color: var(--danger); }

        .actions { display: flex; gap: 8px; align-items: center; }

        .empty-state {
            padding: 60px 20px; color: var(--slate-500); text-align: center; background: var(--bg-body);
            border: 1px dashed var(--slate-200); border-radius: var(--radius-lg); margin: 24px;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
        }
        .empty-state svg { width: 36px; height: 36px; color: #94a3b8; margin-bottom: 12px; display: block; flex-shrink: 0; }
        .empty-state strong { display: block; color: var(--navy); font-size: 15px; margin-bottom: 4px; font-weight: 600; }
        .empty-state p { margin: 0; font-size: 13px; color: var(--slate-500); }

        /* ====== ANIMASI MODAL FORM PENYEWA ====== */
        .modal {
            position: fixed; inset: 0; z-index: 100;
            background: rgba(15, 23, 42, 0.55); backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px);
            padding: 20px; display: flex; align-items: center; justify-content: center; overflow-y: auto;
            opacity: 0; visibility: hidden; pointer-events: none;
            transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .modal.open {
            opacity: 1; visibility: visible; pointer-events: auto;
        }
        .modal-box {
            background: var(--card-bg); width: 100%; max-width: 650px; padding: 28px;
            border-radius: var(--radius-xl); box-shadow: var(--shadow-modal); position: relative; margin: auto;
            transform: scale(0.88) translateY(16px);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .modal.open .modal-box {
            transform: scale(1) translateY(0);
        }
        .modal-box h2 { margin: 0 0 4px; font-size: 18px; font-weight: 700; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; margin-top: 16px; }
        .field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 0; }
        .field.full { grid-column: 1 / -1; }
        .field label { font-weight: 600; font-size: 13px; color: var(--navy); margin-bottom: 0; }
        .field input, .field select, .field textarea {
            width: 100%; padding: 10px 14px; border: 1px solid var(--slate-200);
            border-radius: var(--radius-md); background: var(--card-bg); font-size: 13px;
            transition: 0.2s; outline: none;
        }
        .field input:focus, .field select:focus, .field textarea:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
        .modal-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--slate-200); }

        @media (max-width: 768px) {
            .topbar { padding: 0 16px; }
            .sidebar { display: none; }
            .main { padding: 20px 16px 80px; }
            .page-heading { flex-direction: column; gap: 16px; }
            .page-heading .btn { width: 100%; }
            .filters { flex-direction: column; padding: 16px; }
            .filters select { width: 100%; }
            .form-grid { grid-template-columns: 1fr; }
            .field.full { grid-column: auto; }
        }
        /* ====== Tambahan portal penyewa (mengikuti gaya dashboard pemilik) ====== */
        .menu-title { font-size: 12px; font-weight: 700; color: var(--slate-500); letter-spacing: .5px; margin: 0 8px 12px; }
        .side-nav { display: flex; flex-direction: column; gap: 4px; }
        .side-link { display: flex; align-items: center; gap: 12px; padding: 11px 14px; border-radius: var(--radius-lg); color: #334155; font-size: 14px; font-weight: 600; text-decoration: none; transition: .2s; }
        .side-link svg { width: 20px; height: 20px; flex-shrink: 0; }
        .side-link:hover { background: var(--slate-100); }
        .side-link.active { background: var(--primary-soft); color: var(--primary); }
        .stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 20px; margin-bottom: 24px; }
        .stat-card { background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); padding: 20px; display: flex; align-items: center; justify-content: space-between; box-shadow: var(--shadow-sm); }
        .stat-info { display: flex; flex-direction: column; }
        .stat-label { color: var(--slate-500); font-size: 13px; font-weight: 500; margin-bottom: 4px; }
        .stat-number { font-size: 22px; font-weight: 700; line-height: 1.1; }
        .stat-icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: grid; place-items: center; flex-shrink: 0; }
        .stat-icon svg { width: 22px; height: 22px; }
        .stat-icon.blue { background: var(--primary-soft); color: var(--primary); }
        .stat-icon.green { background: var(--success-bg); color: var(--success); }
        .stat-icon.purple { background: #f3e8ff; color: #9333ea; }
        .stat-icon.orange { background: var(--warning-bg); color: var(--warning); }
        .grid-2 { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
        .detail-list { margin: 0; padding: 8px 24px 16px; }
        .detail-row { display: flex; justify-content: space-between; gap: 16px; padding: 12px 0; border-bottom: 1px solid var(--slate-100); font-size: 14px; }
        .detail-row:last-child { border-bottom: 0; }
        .detail-row dt { color: var(--slate-500); }
        .detail-row dd { margin: 0; font-weight: 600; text-align: right; }
        .status.terisi, .status.dibayar, .status.selesai, .status.aktif { background: var(--success-bg); color: var(--success); }
        .status.belum_dibayar, .status.pending, .status.booked { background: var(--warning-bg); color: var(--warning); }
        .status.terlambat, .status.keluar { background: var(--danger-bg); color: var(--danger); }
        .status.diproses, .status.kosong { background: var(--primary-soft); color: var(--primary); }
        .notice { padding: 40px 24px; text-align: center; color: var(--slate-500); }
        .notice strong { display: block; color: var(--navy); margin-bottom: 4px; }
        .list-item { padding: 18px 24px; border-bottom: 1px solid var(--slate-200); }
        .list-item:last-child { border-bottom: 0; }
        .list-item h3 { margin: 0 0 4px; font-size: 15px; }
        .list-item p { margin: 0; font-size: 13px; color: var(--slate-500); }
        .form-stack { display: flex; flex-direction: column; gap: 14px; padding: 24px; }
        .form-stack label { font-weight: 600; font-size: 13px; }
        .form-stack input, .form-stack select, .form-stack textarea { width: 100%; padding: 10px 14px; border: 1px solid var(--slate-200); border-radius: var(--radius-md); font-size: 13px; outline: none; }
        .form-stack input:focus, .form-stack select:focus, .form-stack textarea:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,.1); }
        @media (max-width: 1024px) { .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); } .grid-2 { grid-template-columns: 1fr; } .sidebar { display: none; } }
    </style>
</head>
<body>
<header class="topbar">
    <a class="brand" href="{{ route('penghuni.kamar') }}">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
    </a>
    @include('components.topbar-actions')
</header>
<div class="layout">
    <aside class="sidebar">
        @include('components.sidebar-penghuni')
    </aside>
    <main class="main">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert" style="background:var(--danger-bg);color:#991b1b;border-color:#fecaca">
                <ul style="margin:0;padding-left:20px">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        {{-- Penyewa belum didaftarkan pemilik: semua halaman menampilkan pemberitahuan yang sama --}}
        @if (! $tenant && ! request()->routeIs('penghuni.pengumuman'))
            <section class="page-heading"><div><h1>@yield('title')</h1></div></section>
            <section class="panel"><div class="notice">
                <strong>Akun Anda belum terhubung dengan data penyewa</strong>
                Minta pemilik properti mendaftarkan Anda di menu Penyewa dengan email {{ auth()->user()->email }}.
            </div></section>
        @else
            @yield('content')
        @endif
    </main>
</div>
</body>
</html>
