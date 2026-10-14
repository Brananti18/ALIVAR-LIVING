<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sewa - {{ $tenant->name }} - ALIVARE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            /* Warna SaaS Premium ALIVARE */
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-soft: #eff6ff;
            --navy: #0f172a;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-500: #64748b;
            --slate-800: #1e293b;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;

            /* Status Colors */
            --success: #10b981;
            --success-bg: #ecfdf5;
            --danger: #ef4444;
            --danger-bg: #fef2f2;
            --warning: #f59e0b;
            --warning-bg: #fffbeb;

            /* Geometri & Shadow */
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
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* Topbar & Header */
        .topbar {
            min-height: 70px;
            padding: 0 24px;
            display: flex;
            align-items: center;
            background: var(--card-bg);
            border-bottom: 1px solid var(--slate-200);
            position: sticky;
            top: 0;
            z-index: 30;
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 170px;
        }

        .brand img {
            height: 44px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        /* ====== SIDEBAR UNIFORM STYLING ====== */
        .sidebar { 
            width: 220px; 
            padding: 24px 16px; 
            background: var(--card-bg); 
            border-right: 1px solid var(--slate-200); 
            flex-shrink: 0; 
        }

        .nav-label { 
            padding: 8px 12px; 
            color: var(--slate-500); 
            font-size: 11px; 
            font-weight: 700; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
            margin: 0 0 4px 0;
        }

        .nav-link { 
            display: flex; 
            align-items: center; 
            flex-direction: row; 
            gap: 12px; 
            width: 100%; 
            min-height: 44px; 
            padding: 10px 12px; 
            margin-bottom: 4px; 
            border-radius: var(--radius-md); 
            text-decoration: none; 
            color: var(--slate-500); 
            font-weight: 500; 
            font-size: 14px;
            transition: 0.2s;
        }

        .nav-link:hover { 
            background: var(--bg-body); 
            color: var(--navy); 
        }

        .sidebar .nav-link.active { 
            color: var(--primary) !important; 
            background: var(--primary-soft) !important; 
            font-weight: 600 !important; 
        }

        .sidebar .nav-link.active .nav-icon,
        .sidebar .nav-link.active .nav-icon svg { 
            color: var(--primary) !important; 
            stroke: var(--primary) !important;
        }

        .nav-icon { 
            width: 20px; 
            height: 20px; 
            flex: 0 0 20px; 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            color: var(--slate-500); 
        }

        .nav-icon svg { 
            width: 20px; 
            height: 20px; 
            max-width: 20px; 
            max-height: 20px; 
            display: block; 
            flex-shrink: 0; 
        }

        .main {
            flex: 1;
            min-width: 0;
            max-width: 1280px;
            margin: 0 auto;
            padding: 32px;
        }

        /* Navigasi Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--slate-500);
            margin-bottom: 12px;
        }

        .breadcrumb a {
            color: var(--slate-500);
            text-decoration: none;
            transition: 0.2s;
        }

        .breadcrumb a:hover { color: var(--primary); }
        .breadcrumb svg { width: 14px; height: 14px; color: var(--slate-500); }
        .breadcrumb span { color: var(--navy); font-weight: 600; }

        /* Page Heading */
        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 28px;
        }

        h1 {
            margin: 0 0 4px;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .subtitle {
            color: var(--slate-500);
            font-size: 14px;
            margin: 0;
        }

        /* Button Styling */
        .btn {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            padding: 10px 16px !important;
            border-radius: var(--radius-md) !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            transition: all 0.2s ease !important;
            white-space: nowrap !important;
            cursor: pointer !important;
        }

        .btn svg { width: 16px; height: 16px; }

        .btn-secondary {
            background-color: #ffffff !important;
            color: var(--navy) !important;
            border: 1px solid var(--slate-200) !important;
            box-shadow: var(--shadow-sm) !important;
        }

        .btn-secondary:hover { background-color: var(--slate-100) !important; }

        /* Card Container */
        .card {
            margin-bottom: 24px;
            background: var(--card-bg);
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--slate-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: var(--navy);
        }

        .card-body { padding: 24px; }

        /* Header Identitas Penyewa */
        .tenant-profile-header {
            display: flex;
            align-items: center;
            gap: 16px;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px dashed var(--slate-200);
        }

        .tenant-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: var(--primary-soft);
            color: var(--primary);
            display: grid;
            place-items: center;
            font-size: 18px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .tenant-name-box h3 {
            margin: 0 0 4px;
            font-size: 18px;
            font-weight: 700;
            color: var(--navy);
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .info-item { min-width: 0; }

        .info-label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 6px;
            color: var(--slate-500);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .info-label svg { width: 14px; height: 14px; color: var(--slate-500); }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--navy);
            overflow-wrap: anywhere;
        }

        /* Status Badge Pill */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .status::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-aktif,
        .status-dibayar {
            background: var(--success-bg);
            color: var(--success);
        }

        .status-keluar,
        .status-terlambat {
            background: var(--danger-bg);
            color: var(--danger);
        }

        .status-belum_dibayar {
            background: var(--warning-bg);
            color: #d97706;
        }

        /* Callout Catatan */
        .note-box {
            margin-top: 20px;
            padding: 16px 18px;
            border-radius: var(--radius-md);
            background: var(--primary-soft);
            border: 1px solid #dbeafe;
            color: #1e40af;
            font-size: 13px;
            line-height: 1.6;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .note-box svg { width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px; color: var(--primary); }

        /* Card Statistik Keuangan */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow-sm);
        }

        .stat-info { display: flex; flex-direction: column; }
        .stat-label { color: var(--slate-500); font-size: 13px; font-weight: 500; margin-bottom: 6px; }
        .stat-number { font-size: 20px; font-weight: 700; color: var(--navy); line-height: 1; }
        .stat-icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: grid; place-items: center; flex-shrink: 0; }
        .stat-icon svg { width: 22px; height: 22px; }
        
        .stat-icon.blue { background: var(--primary-soft); color: var(--primary); }
        .stat-icon.orange { background: var(--warning-bg); color: #d97706; }
        .stat-icon.green { background: var(--success-bg); color: var(--success); }

        /* Tabel Riwayat Tagihan */
        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            padding: 14px 24px;
            background: #fcfdfd;
            color: var(--slate-500);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            border-bottom: 1px solid var(--slate-200);
            white-space: nowrap;
        }

        td {
            padding: 16px 24px;
            border-bottom: 1px solid var(--slate-200);
            font-size: 14px;
            color: var(--navy);
            vertical-align: middle;
        }

        tbody tr { transition: background-color 0.2s; }
        tbody tr:hover { background-color: var(--slate-100); }
        tbody tr:last-child td { border-bottom: none; }

        .empty {
            padding: 48px 20px;
            text-align: center;
            color: var(--slate-500);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main { padding: 20px 16px 80px; }
            .page-heading { flex-direction: column; gap: 12px; }
            .info-grid { grid-template-columns: 1fr; gap: 16px; }
            .stats { grid-template-columns: 1fr; gap: 12px; }
            .card-body, .card-header { padding: 18px; }
            .topbar { padding: 0 16px; }
        }
    </style>
</head>

<body>
<!-- HEADER -->
<header class="topbar">
    <a class="brand" href="{{ route('dashboard.pemilik') }}">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
    </a>
</header>

<div class="layout">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        @include('components.sidebar-menu')
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">
        <!-- BREADCRUMB -->
        <nav class="breadcrumb">
            <a href="{{ route('dashboard.pemilik') }}">Dashboard</a>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            <a href="{{ route('dashboard.penyewa') }}">Penyewa</a>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            <span>Profil Sewa</span>
        </nav>

        <!-- PAGE HEADING -->
        <section class="page-heading">
            <div>
                <h1>Profil Sewa</h1>
                <p class="subtitle">Informasi penyewa dan ringkasan kontrak sewa secara menyeluruh.</p>
            </div>

            <a href="{{ route('dashboard.penyewa') }}" class="btn btn-secondary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                Kembali ke Penyewa
            </a>
        </section>

        <!-- KARTU INFORMASI PENYEWA -->
        <section class="card">
            <div class="card-header">
                <h2>Informasi Penyewa</h2>
            </div>

            <div class="card-body">
                <div class="tenant-profile-header">
                    <div class="tenant-avatar">
                        {{ strtoupper(substr($tenant->name ?? 'P', 0, 2)) }}
                    </div>
                    <div class="tenant-name-box">
                        <h3>{{ $tenant->name }}</h3>
                        <span class="status status-{{ strtolower($tenant->status) }}">
                            {{ str_replace('_', ' ', ucfirst($tenant->status)) }}
                        </span>
                    </div>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            Email
                        </span>
                        <div class="info-value">{{ $tenant->email ?: 'Email belum diisi' }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            Nomor Telepon
                        </span>
                        <div class="info-value">{{ $tenant->phone ?: '-' }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><line x1="7" y1="8" x2="17" y2="8"/><line x1="7" y1="12" x2="13" y2="12"/></svg>
                            Nomor Identitas (NIK/KTP)
                        </span>
                        <div class="info-value">{{ $tenant->identity_number ?: '-' }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- KARTU RINGKASAN KONTRAK -->
        <section class="card">
            <div class="card-header">
                <h2>Ringkasan Kontrak</h2>
            </div>

            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V7l9-4 9 4v14"/><path d="M7 21v-4h4v4M7 9h2m6 0h2m-10 4h2m6 0h2"/></svg>
                            Nama Properti
                        </span>
                        <div class="info-value">{{ $tenant->room?->property?->name ?? '-' }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><circle cx="6" cy="11" r="2"/></svg>
                            Nomor Kamar
                        </span>
                        <div class="info-value">{{ $tenant->room?->room_number ? 'Kamar ' . $tenant->room->room_number : '-' }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                            Harga Sewa Kamar
                        </span>
                        <div class="info-value">Rp {{ number_format($tenant->room?->price ?? 0, 0, ',', '.') }} / bulan</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            Tanggal Mulai Sewa
                        </span>
                        <div class="info-value">{{ $tenant->move_in_date ? $tenant->move_in_date->format('d/m/Y') : '-' }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            Tanggal Keluar
                        </span>
                        <div class="info-value">
                            @if ($tenant->move_out_date)
                                {{ $tenant->move_out_date->format('d/m/Y') }}
                            @else
                                <span style="color:var(--slate-500); font-weight:normal;">Belum ditentukan</span>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($tenant->notes)
                    <div class="note-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        <div>
                            <strong style="display:block; margin-bottom:2px;">Catatan Sewa:</strong>
                            {{ $tenant->notes }}
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- KARTU STATISTIK KEUANGAN -->
        <section class="stats">
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Total Tagihan</span>
                    <span class="stat-number">Rp {{ number_format($totalBills, 0, ',', '.') }}</span>
                </div>
                <div class="stat-icon blue">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Belum Dibayar</span>
                    <span class="stat-number" style="color:var(--danger)">Rp {{ number_format($totalUnpaid, 0, ',', '.') }}</span>
                </div>
                <div class="stat-icon orange">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Sudah Dibayar</span>
                    <span class="stat-number" style="color:var(--success)">Rp {{ number_format($totalPaid, 0, ',', '.') }}</span>
                </div>
                <div class="stat-icon green">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
            </div>
        </section>

        <!-- KARTU RIWAYAT TAGIHAN -->
        <section class="card">
            <div class="card-header">
                <div>
                    <h2>Riwayat Tagihan</h2>
                    <p class="subtitle" style="margin-top:2px">Daftar seluruh tagihan sewa milik {{ $tenant->name }}.</p>
                </div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Tagihan</th>
                            <th>Jatuh Tempo</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bills as $bill)
                            <tr>
                                <td>
                                    <strong>{{ $bill->title }}</strong>
                                </td>
                                <td>
                                    {{ $bill->due_date ? \Carbon\Carbon::parse($bill->due_date)->format('d/m/Y') : '-' }}
                                </td>
                                <td>
                                    <strong>Rp {{ number_format($bill->amount, 0, ',', '.') }}</strong>
                                </td>
                                <td>
                                    <span class="status status-{{ strtolower($bill->status) }}">
                                        {{ str_replace('_', ' ', ucfirst($bill->status)) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">
                                    Belum ada catatan tagihan untuk penyewa ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>
</body>
</html>