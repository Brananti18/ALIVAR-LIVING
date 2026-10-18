<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan - ALIVARE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            /* Warna SaaS Premium (KONSISTEN DENGAN PROPERTI) */
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

        * {
            box-sizing: border-box;
        }

        body { 
            margin: 0;
            background: var(--bg-body); 
            color: var(--navy); 
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        button, input, select { font: inherit; } 
        button { cursor: pointer; }

        /* ====== HEADER TOPBAR ====== */
        .topbar { 
            min-height: 70px; padding: 0 24px; 
            display: flex; align-items: center; justify-content: space-between; gap: 32px; 
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
            border: 0; border-radius: 50%; background: transparent; color: var(--slate-500); transition: 0.2s;
        }
        .icon-button:hover { background: var(--slate-100); color: var(--navy); }
        .icon-button svg { width: 20px; height: 20px; }
        
        .avatar { 
            width: 38px; height: 38px; 
            border: 1.5px solid #bfdbfe; 
            border-radius: 50%; 
            background: #dbeafe; 
            color: #1d4ed8; 
            display: grid; place-items: center; 
            font-weight: 700; font-size: 15px; cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(37, 99, 235, 0.12);
        }
        .avatar:hover { background: #bfdbfe; border-color: #93c5fd; color: #1e40af; }

        .account-menu { position: relative; }
        .account-dropdown { 
            position: absolute; top: calc(100% + 8px); right: 0; width: 240px; padding: 8px; 
            background: var(--card-bg); border: 1px solid var(--slate-200); 
            border-radius: var(--radius-lg); box-shadow: var(--shadow-md); z-index: 100; 
        }
        .account-dropdown[hidden] { display: none; }
        .account-info { padding: 8px 12px; display: flex; flex-direction: column; }
        .account-info strong { font-size: 14px; color: var(--navy); }
        .account-info small { color: var(--slate-500); font-size: 12px; }
        .account-divider { height: 1px; background: var(--slate-200); margin: 6px 0; }
        .account-item { 
            width: 100%; display: flex; align-items: center; gap: 10px; padding: 10px 12px; 
            border: 0; border-radius: var(--radius-sm); background: transparent; 
            color: var(--slate-800); font-size: 13px; font-weight: 500; transition: 0.2s; text-decoration: none;
        }
        .account-item:hover { background: var(--slate-100); color: var(--primary); }
        .account-icon { color: var(--slate-500); display: flex; }
        .account-item:hover .account-icon { color: var(--primary); }
        .account-icon svg { width: 16px; height: 16px; }
        .account-logout { color: var(--danger); }
        .account-logout:hover { background: var(--danger-bg); color: var(--danger); }

        /* ====== LAYOUT & SIDEBAR ====== */
        .layout { display: flex; min-height: calc(100vh - 70px); }
        .sidebar { width: 220px; padding: 24px 16px; background: var(--card-bg); border-right: 1px solid var(--slate-200); flex-shrink: 0; }
        .main { flex: 1; min-width: 0; max-width: 1280px; margin: 0 auto; padding: 32px; }

        /* ====== HEADING & BUTTONS ====== */
        .page-heading { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        h1 { margin: 0 0 4px; font-size: 26px; font-weight: 700; letter-spacing: -0.5px; }
        .subtitle { color: var(--slate-500); margin: 0; font-size: 14px; }
        
        .btn { 
            display: inline-flex !important; 
            flex-direction: row !important; 
            align-items: center !important; 
            justify-content: center !important; 
            gap: 8px !important;
            padding: 10px 18px !important; 
            border-radius: var(--radius-md) !important; 
            font-size: 13px !important; 
            font-weight: 600 !important; 
            text-decoration: none !important; 
            transition: all 0.2s ease !important; 
            white-space: nowrap !important;
            cursor: pointer !important;
        }
        .btn svg { 
            width: 16px !important; height: 16px !important; 
            max-width: 16px !important; max-height: 16px !important; 
            flex: 0 0 16px !important; display: inline-block !important; 
        }
        .btn-primary { 
            background-color: var(--primary) !important; 
            color: #ffffff !important; 
            border: 1px solid var(--primary) !important; 
            box-shadow: var(--shadow-sm) !important; 
        }
        .btn-primary:hover { 
            background-color: var(--primary-hover) !important; 
            transform: translateY(-1px); 
            box-shadow: var(--shadow-md) !important; 
        }
        .btn-secondary { 
            background-color: #ffffff !important; 
            color: var(--navy) !important; 
            border: 1px solid var(--slate-200) !important; 
        }
        .btn-secondary:hover { background-color: var(--slate-100) !important; }

        /* ====== AREA FILTER LAPORAN ====== */
        .filter-panel { 
            background: var(--card-bg); border: 1px solid var(--slate-200); 
            border-radius: var(--radius-lg); padding: 16px 20px; margin-bottom: 24px; 
            box-shadow: var(--shadow-sm);
        }
        .filter-form { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; }
        .filter-inputs { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
        .filter-group { display: flex; align-items: center; gap: 8px; }
        .filter-group label { font-size: 13px; font-weight: 600; color: var(--slate-500); white-space: nowrap; }
        .select-control { 
            padding: 8px 12px; border: 1px solid var(--slate-200); 
            border-radius: var(--radius-md); background: var(--card-bg); 
            font-size: 13px; color: var(--navy); outline: none; cursor: pointer;
        }
        .select-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }

        /* ====== STATS KEUANGAN (4 GRID) ====== */
        .stats-grid-4 { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 20px; margin-bottom: 24px; }
        .stat-card-financial { 
            background: var(--card-bg); border: 1px solid var(--slate-200); 
            border-radius: var(--radius-lg); padding: 20px; 
            box-shadow: var(--shadow-sm); position: relative; overflow: hidden; 
        }
        .stat-card-financial::before { content: ''; position: absolute; top: 0; left: 0; bottom: 0; width: 4px; }
        .stat-card-financial.blue::before { background-color: var(--primary); }
        .stat-card-financial.red::before { background-color: var(--danger); }
        .stat-card-financial.green::before { background-color: var(--success); }
        .stat-card-financial.amber::before { background-color: var(--warning); }
        
        .stat-card-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; }
        .stat-card-title { font-size: 12px; font-weight: 600; color: var(--slate-500); text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-icon-wrapper { width: 32px; height: 32px; border-radius: var(--radius-md); display: grid; place-items: center; }
        .stat-card-financial.blue .stat-icon-wrapper { background: var(--primary-soft); color: var(--primary); }
        .stat-card-financial.red .stat-icon-wrapper { background: var(--danger-bg); color: var(--danger); }
        .stat-card-financial.green .stat-icon-wrapper { background: var(--success-bg); color: var(--success); }
        .stat-card-financial.amber .stat-icon-wrapper { background: var(--warning-bg); color: var(--warning); }
        
        .stat-value { font-size: 20px; font-weight: 700; color: var(--navy); margin-bottom: 4px; white-space: nowrap; }
        .stat-desc { font-size: 12px; color: var(--slate-500); }

        /* ====== PANEL DUA KOLOM: CHART & KATEGORI ====== */
        .chart-category-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 24px; }
        .panel { background: var(--card-bg); border: 1px solid var(--slate-200); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden; padding: 20px; }
        .panel-title { font-size: 15px; font-weight: 700; color: var(--navy); margin-bottom: 16px; display: flex; align-items: center; gap: 8px; }
        .panel-title svg { width: 18px; height: 18px; color: var(--primary); }
        
        .chart-container-box { position: relative; width: 100%; height: 260px; }
        
        .category-list { display: flex; flex-direction: column; gap: 12px; }
        .category-item { display: flex; align-items: center; justify-content: space-between; padding: 12px 14px; border-radius: var(--radius-md); background: var(--bg-body); border: 1px solid var(--slate-200); }
        .category-info { display: flex; align-items: center; gap: 10px; }
        .category-dot { width: 8px; height: 8px; border-radius: 50%; background-color: var(--primary); }
        .category-name { font-size: 13px; font-weight: 600; color: var(--navy); }
        .category-amount { font-size: 14px; font-weight: 700; color: var(--navy); }

        /* ====== TABEL TRANSAKSI ====== */
        .table-wrapper { width: 100%; overflow-x: auto; border: 1px solid var(--slate-200); border-radius: var(--radius-md); }
        .table-clean { width: 100%; border-collapse: collapse; text-align: left; font-size: 13px; }
        .table-clean th { background-color: var(--bg-body); color: var(--slate-500); font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; padding: 12px 16px; border-bottom: 1px solid var(--slate-200); }
        .table-clean td { padding: 14px 16px; border-bottom: 1px solid var(--slate-100); color: var(--navy); }
        .table-clean tr:last-child td { border-bottom: none; }
        .table-clean tr:hover td { background-color: var(--bg-body); }
        
        .badge-status { display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 99px; font-size: 12px; font-weight: 600; }
        .badge-status.paid { background-color: var(--success-bg); color: var(--success); }
        .badge-status.unpaid { background-color: var(--warning-bg); color: #d97706; }
        .badge-dot { width: 6px; height: 6px; border-radius: 50%; background-color: currentColor; }

        /* ====== MEDIA PRINT ====== */
        @media print {
            .topbar, .sidebar, .filter-panel, .btn { display: none !important; }
            .layout { display: block !important; }
            .main { padding: 0 !important; max-width: 100% !important; }
            .panel, .stat-card-financial { box-shadow: none !important; border: 1px solid #cbd5e1 !important; break-inside: avoid; }
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 1024px) {
            .sidebar { width: 200px; padding: 24px 12px; }
            .main { padding: 24px; }
            .stats-grid-4 { grid-template-columns: repeat(2, 1fr); }
            .chart-category-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .topbar { padding: 0 16px; gap: 16px; }
            .brand { width: auto; }
            .sidebar { display: none; }
            .main { padding: 20px 16px 80px; }
            .page-heading { flex-direction: column; gap: 16px; }
            .stats-grid-4 { grid-template-columns: 1fr; }
            .filter-form { flex-direction: column; align-items: stretch; }
            .filter-inputs { flex-direction: column; align-items: stretch; }
            .filter-group { justify-content: space-between; }
            .select-control { width: 100%; }
        }
    </style>
</head>
<body>

@php
    $selectedMonth = request('bulan', date('m'));
    $selectedYear = request('tahun', date('Y'));

    $totalIncomeVal = $totalIncome ?? $totalPendapatan ?? 0;
    $totalExpenseVal = $totalExpense ?? $totalPengeluaran ?? 0;
    $netIncomeVal = $netIncome ?? $pendapatanBersih ?? ($totalIncomeVal - $totalExpenseVal);
    $unpaidBillsVal = $unpaidBills ?? $tagihanBelumDibayar ?? $totalUnpaid ?? 0;

    $bulanList = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];
    $chartValues = $monthlyIncome ?? $chartData ?? [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
@endphp

<!-- HEADER TOPBAR -->
<header class="topbar">
    <div class="brand">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
    </div>

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
                    <strong>{{ auth()->user()->name ?? 'Pengelola' }}</strong>
                    <small>{{ auth()->user()->email ?? '' }}</small>
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
                        <span class="account-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></span>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<div class="layout">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        @include('components.sidebar-menu')
    </aside>

    <!-- KONTEN UTAMA LAPORAN -->
    <main class="main">
        <!-- HEADER HALAMAN & AKSI CETAK -->
        <section class="page-heading">
            <div>
                <h1>Laporan Pendapatan</h1>
                <p class="subtitle">Pantau arus kas, performa pendapatan bulanan, dan ringkasan transaksi properti kos Anda.</p>
            </div>
            <button type="button" class="btn btn-secondary" onclick="window.print()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 6 2 18 2 18 9"/>
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                    <rect x="6" y="14" width="12" height="8"/>
                </svg>
                <span>Cetak Laporan</span>
            </button>
        </section>

        <!-- AREA FILTER LAPORAN -->
        <div class="filter-panel">
            <form method="GET" action="{{ url()->current() }}" class="filter-form">
                <div class="filter-inputs">
                    <div class="filter-group">
                        <label for="bulan">Bulan:</label>
                        <select name="bulan" id="bulan" class="select-control">
                            @foreach($bulanList as $key => $namaBulan)
                                <option value="{{ $key }}" {{ sprintf('%02d', $selectedMonth) == $key ? 'selected' : '' }}>
                                    {{ $namaBulan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="tahun">Tahun:</label>
                        <select name="tahun" id="tahun" class="select-control">
                            @php
                                $currentY = (int) date('Y');
                            @endphp
                            @for($y = $currentY - 3; $y <= $currentY + 1; $y++)
                                <option value="{{ $y }}" {{ $selectedYear == $y ? 'selected' : '' }}>
                                    {{ $y }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                    </svg>
                    <span>Terapkan Filter</span>
                </button>
            </form>
        </div>

        <!-- KARTU RINGKASAN KEUANGAN (4 GRID) -->
        <div class="stats-grid-4">
            <div class="stat-card-financial blue">
                <div class="stat-card-head">
                    <span class="stat-card-title">Total Pendapatan</span>
                    <div class="stat-icon-wrapper">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="1" x2="12" y2="23"/>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value">Rp {{ number_format($totalIncomeVal, 0, ',', '.') }}</div>
                <div class="stat-desc">Pemasukan lunas terhitung</div>
            </div>

            <div class="stat-card-financial red">
                <div class="stat-card-head">
                    <span class="stat-card-title">Total Pengeluaran</span>
                    <div class="stat-icon-wrapper">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"/>
                            <polyline points="17 18 23 18 23 12"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value" style="color: var(--danger);">Rp {{ number_format($totalExpenseVal, 0, ',', '.') }}</div>
                <div class="stat-desc">Biaya operasional & pemeliharaan</div>
            </div>

            <div class="stat-card-financial green">
                <div class="stat-card-head">
                    <span class="stat-card-title">Pendapatan Bersih</span>
                    <div class="stat-icon-wrapper">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value" style="color: var(--success);">Rp {{ number_format($netIncomeVal, 0, ',', '.') }}</div>
                <div class="stat-desc">Selisih arus kas masuk & keluar</div>
            </div>

            <div class="stat-card-financial amber">
                <div class="stat-card-head">
                    <span class="stat-card-title">Belum Dibayar</span>
                    <div class="stat-icon-wrapper">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value" style="color: var(--warning);">Rp {{ number_format($unpaidBillsVal, 0, ',', '.') }}</div>
                <div class="stat-desc">Estimasi piutang sewa berjalan</div>
            </div>
        </div>

        <!-- DUA KOLOM: GRAFIK & KATEGORI -->
        <div class="chart-category-grid">
            <div class="panel">
                <div class="panel-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"/>
                        <line x1="12" y1="20" x2="12" y2="4"/>
                        <line x1="6" y1="20" x2="6" y2="14"/>
                    </svg>
                    <span>Grafik Performa Pendapatan ({{ $selectedYear }})</span>
                </div>
                <div class="chart-container-box">
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>

            <div class="panel">
                <div class="panel-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"/>
                        <path d="M22 12A10 10 0 0 0 12 2v10z"/>
                    </svg>
                    <span>Kategori Pendapatan</span>
                </div>
                <div class="category-list">
                    @if(isset($incomeCategories) && count($incomeCategories) > 0)
                        @foreach($incomeCategories as $cat)
                            <div class="category-item">
                                <div class="category-info">
                                    <span class="category-dot"></span>
                                    <span class="category-name">{{ $cat['name'] ?? $cat['title'] ?? 'Sewa Kamar' }}</span>
                                </div>
                                <span class="category-amount">Rp {{ number_format($cat['amount'] ?? $cat['total'] ?? 0, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    @else
                        <div class="category-item">
                            <div class="category-info">
                                <span class="category-dot" style="background-color: var(--primary);"></span>
                                <span class="category-name">Sewa Kamar Utama</span>
                            </div>
                            <span class="category-amount">Rp {{ number_format($totalIncomeVal, 0, ',', '.') }}</span>
                        </div>

                        <div class="category-item">
                            <div class="category-info">
                                <span class="category-dot" style="background-color: var(--success);"></span>
                                <span class="category-name">Deposit / Jaminan</span>
                            </div>
                            <span class="category-amount">Rp 0</span>
                        </div>

                        <div class="category-item">
                            <div class="category-info">
                                <span class="category-dot" style="background-color: var(--warning);"></span>
                                <span class="category-name">Lain-lain / Denda</span>
                            </div>
                            <span class="category-amount">Rp 0</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- TABEL RIWAYAT TRANSAKSI -->
        <div class="panel">
            <div class="panel-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                </svg>
                <span>Riwayat Transaksi Masuk & Keluar</span>
            </div>

            @php
                $trxList = $transactions ?? $recentTransactions ?? $bills ?? collect();
            @endphp

            <div class="table-wrapper">
                <table class="table-clean">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan / Penyewa</th>
                            <th>Kategori</th>
                            <th style="text-align: right;">Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($trxList) > 0)
                            @foreach($trxList as $trx)
                                @php
                                    $trxStatus = strtolower($trx->status ?? '');
                                    $isPaid = in_array($trxStatus, ['lunas', 'paid', 'sudah dibayar', 'dibayar', 'success']);
                                    $amount = $trx->amount ?? $trx->nominal ?? $trx->price ?? 0;
                                @endphp
                                <tr>
                                    <td>
                                        {{ isset($trx->created_at) ? \Carbon\Carbon::parse($trx->created_at)->isoFormat('D MMM YYYY') : (isset($trx->date) ? \Carbon\Carbon::parse($trx->date)->isoFormat('D MMM YYYY') : '-') }}
                                    </td>
                                    <td style="font-weight: 600; color: var(--navy);">
                                        {{ $trx->tenant->name ?? ($trx->description ?? ($trx->title ?? 'Pembayaran Sewa')) }}
                                    </td>
                                    <td>
                                        {{ $trx->category ?? ($trx->type ?? 'Sewa Kamar') }}
                                    </td>
                                    <td style="text-align: right; font-weight: 700; color: var(--navy);">
                                        Rp {{ number_format($amount, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        @if($isPaid)
                                            <span class="badge-status paid">
                                                <span class="badge-dot"></span>
                                                <span>Lunas</span>
                                            </span>
                                        @else
                                            <span class="badge-status unpaid">
                                                <span class="badge-dot"></span>
                                                <span>Belum Lunas</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 36px; color: var(--slate-500);">
                                    <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
                                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"/>
                                            <line x1="12" y1="8" x2="12" y2="12"/>
                                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                                        </svg>
                                        <span style="font-size: 13px;">Belum ada riwayat transaksi tercatat untuk periode ini.</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<!-- SCRIPT INISIALISASI CHART.JS & DROPDOWN AKUN -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('incomeChart');
        if (!ctx) return;

        const labels = @json($chartLabels);
        const dataValues = @json($chartValues);

        new Chart(ctx.getContext('2d'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: dataValues,
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.06)',
                    fill: true,
                    tension: 0.35,
                    borderWidth: 2.5,
                    pointBackgroundColor: '#2563eb',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleFont: { family: 'Instrument Sans', size: 13, weight: '600' },
                        bodyFont: { family: 'Instrument Sans', size: 13 },
                        padding: 10,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                let value = context.raw || 0;
                                return ' Pendapatan: Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: { color: '#64748b', font: { family: 'Instrument Sans', size: 12 } }
                    },
                    y: {
                        border: { dash: [4, 4] },
                        grid: { color: '#e2e8f0', drawBorder: false },
                        ticks: {
                            color: '#64748b',
                            font: { family: 'Instrument Sans', size: 11 },
                            callback: function(value) {
                                if (value >= 1000000) {
                                    return 'Rp ' + (value / 1000000) + ' Jt';
                                } else if (value >= 1000) {
                                    return 'Rp ' + (value / 1000) + ' Rb';
                                }
                                return 'Rp ' + value;
                            }
                        }
                    }
                }
            }
        });
    });

    // Menu Akun Dropdown
    const accBtn = document.getElementById('accountMenuButton');
    const accDrop = document.getElementById('accountDropdown');
    if (accBtn && accDrop) {
        accBtn.addEventListener('click', e => { e.stopPropagation(); accDrop.hidden = !accDrop.hidden; accBtn.setAttribute('aria-expanded', !accDrop.hidden); });
        accDrop.addEventListener('click', e => e.stopPropagation());
        document.addEventListener('click', () => { accDrop.hidden = true; accBtn.setAttribute('aria-expanded', 'false'); });
    }
</script>

</body>
</html>