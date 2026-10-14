<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Properti - ALIVARE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            /* Warna SaaS Premium */
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
            --shadow-modal: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
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

        /* ====== HEADER ====== */
        .topbar { 
            min-height: 70px; padding: 0 24px; 
            display: flex; align-items: center; gap: 32px; 
            background: var(--card-bg); border-bottom: 1px solid var(--slate-200); 
            position: sticky; top: 0; z-index: 30; 
        }
        
        .brand { 
    display: flex; 
    align-items: center; 
    justify-content: center; /* Menengahkan logo secara horizontal */
    height: 100%; 
    width: 170px; 
}
.brand img { 
    height: 44px !important; 
    width: auto !important; 
    max-width: 100% !important; 
    object-fit: contain; 
}
        
        .top-search { max-width: 400px; flex: 1; position: relative; }
        .top-search input { 
            width: 100%; padding: 10px 16px 10px 40px; 
            border: 1px solid var(--slate-200); border-radius: var(--radius-md); 
            background: var(--bg-body); outline: none; transition: 0.2s; font-size: 14px;
        }
        .top-search input:focus { border-color: var(--primary); background: var(--card-bg); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
        .search-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--slate-500); display: flex; }
        .search-icon svg { width: 18px; height: 18px; }

        .top-actions { margin-left: auto; display: flex; align-items: center; gap: 16px; }
        .icon-button { 
            width: 38px; height: 38px; display: grid; place-items: center; 
            border: 0; border-radius: 50%; background: transparent; color: var(--slate-500); transition: 0.2s;
        }
        .icon-button:hover { background: var(--slate-100); color: var(--navy); }
        .icon-button svg { width: 20px; height: 20px; }
        
       .avatar { 
    width: 38px; 
    height: 38px; 
    border: 1.5px solid #bfdbfe; /* Border biru soft agar bentuk lingkaran sangat jelas */
    border-radius: 50%; 
    background: #dbeafe; /* Background biru muda yang lebih tegas & kontras */
    color: #1d4ed8; /* Warna huruf P biru tebal */
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
        .account-info { padding: 8px 12px; display: flex; flex-direction: column; }
        .account-info strong { font-size: 14px; color: var(--navy); }
        .account-info small { color: var(--slate-500); font-size: 12px; }
        .account-divider { height: 1px; background: var(--slate-200); margin: 6px 0; }
        .account-item { 
            width: 100%; display: flex; align-items: center; gap: 10px; padding: 10px 12px; 
            border: 0; border-radius: var(--radius-sm); background: transparent; 
            color: var(--slate-800); font-size: 13px; font-weight: 500; transition: 0.2s;
        }
        .account-item:hover { background: var(--slate-100); color: var(--primary); }
        .account-icon { color: var(--slate-500); display: flex; }
        .account-item:hover .account-icon { color: var(--primary); }
        .account-icon svg { width: 16px; height: 16px; }
        .account-logout { color: var(--danger); }
        .account-logout:hover { background: var(--danger-bg); color: var(--danger); }
        .account-logout .account-icon { color: var(--danger); }
        .account-logout:hover .account-icon { color: var(--danger); }

        /* ====== LAYOUT & SIDEBAR ====== */
        .layout { display: flex; min-height: calc(100vh - 70px); }
        
        /* Lebar sidebar disesuaikan menjadi 220px */
        .sidebar { width: 220px; padding: 24px 16px; background: var(--card-bg); border-right: 1px solid var(--slate-200); flex-shrink: 0; }
        
        .nav-label { padding: 8px 12px; color: var(--slate-500); font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; }
        
        /* Memaksa layout horizontal dengan flex-direction: row dan tinggi minimum 44px */
        .nav-link { 
            display: flex; align-items: center; flex-direction: row; gap: 12px; 
            width: 100%; min-height: 44px; padding: 10px 12px; margin-bottom: 4px; 
            border-radius: var(--radius-md); text-decoration: none; 
            color: var(--slate-500); font-weight: 500; font-size: 14px;
            transition: 0.2s;
        }
        .nav-link:hover { background: var(--bg-body); color: var(--navy); }
        .nav-link.active { color: var(--primary); background: var(--primary-soft); font-weight: 600; }
        .nav-link.active .nav-icon { color: var(--primary); }
        
        /* Memaksa wrapper ikon menjadi persegi fix 20x20px agar tidak bisa membesar/mengecil */
        .nav-icon { 
            width: 20px; height: 20px; flex: 0 0 20px; 
            display: inline-flex; align-items: center; justify-content: center; 
            color: var(--slate-500); 
        }
        
        /* Membatasi batas maksimal file SVG itu sendiri */
        .nav-icon svg { 
            width: 20px; height: 20px; max-width: 20px; max-height: 20px; 
            display: block; flex-shrink: 0;
        }

        .main { flex: 1; min-width: 0; max-width: 1280px; margin: 0 auto; padding: 32px; }

/* ====== HEADING & BUTTONS ====== */
        .page-heading { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        h1 { margin: 0 0 4px; font-size: 26px; font-weight: 700; letter-spacing: -0.5px; }
        .subtitle { color: var(--slate-500); margin: 0; font-size: 14px; }
        
        /* Memaksa layout tombol agar kebal dari Tailwind/Bootstrap global CSS */
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
        
        /* Memaksa SVG di dalam tombol agar ukurannya terkunci 16x16 px */
        .btn svg { 
            width: 16px !important; 
            height: 16px !important; 
            max-width: 16px !important; 
            max-height: 16px !important; 
            flex: 0 0 16px !important; 
            display: inline-block !important; 
            margin: 0 !important; 
        }

        /* Memaksa warna Primary (Biru) agar tidak menjadi transparan */
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
        .btn-primary svg { color: #ffffff !important; }
        
        /* Alerts */
        .alert { border-radius: var(--radius-md); padding: 14px 16px; margin-bottom: 24px; font-size: 14px; }
        .alert-success { background: var(--success-bg); color: #065f46; border: 1px solid #a7f3d0; }
        .alert-error { background: var(--danger-bg); color: #991b1b; border: 1px solid #fecaca; }
        .alert-error ul { margin: 4px 0 0; padding-left: 20px; }

        /* ====== STATISTIK ====== */
        .stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 20px; margin-bottom: 32px; }
        .stat-card { 
            background: var(--card-bg); border: 1px solid var(--slate-200); 
            border-radius: var(--radius-lg); padding: 20px; 
            display: flex; align-items: center; justify-content: space-between; 
            box-shadow: var(--shadow-sm);
        }
        .stat-info { display: flex; flex-direction: column; }
        .stat-label { color: var(--slate-500); font-size: 13px; font-weight: 500; margin-bottom: 4px; }
        .stat-number { font-size: 24px; font-weight: 700; color: var(--navy); line-height: 1; }
        .stat-icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: grid; place-items: center; flex-shrink: 0; }
        .stat-icon svg { width: 22px; height: 22px; }
        .stat-icon.blue { background: var(--primary-soft); color: var(--primary); }
        .stat-icon.green { background: var(--success-bg); color: var(--success); }
        .stat-icon.purple { background: #f3e8ff; color: #9333ea; }
        .stat-icon.orange { background: var(--warning-bg); color: var(--warning); }

        /* ====== PANEL & FILTER ====== */
        .panel { 
            background: var(--card-bg); border: 1px solid var(--slate-200); 
            border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden;
        }
        .panel-heading { 
            padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; 
            border-bottom: 1px solid var(--slate-200);
        }
        .panel-heading h2 { font-size: 16px; font-weight: 700; margin: 0; }
        .panel-heading .subtitle { font-size: 13px; font-weight: 500; }
        
        .filters { 
            display: flex; gap: 16px; padding: 16px 24px; 
            background: #fcfdfd; border-bottom: 1px solid var(--slate-200);
        }
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

        /* ====== KARTU PROPERTI ====== */
        .property-list { display: flex; flex-direction: column; }
        .property-card { 
            display: grid; grid-template-columns: 220px minmax(0, 1fr); gap: 24px; 
            padding: 24px; border-bottom: 1px solid var(--slate-200); 
        }
        .property-card:last-child { border-bottom: none; }
        
        .property-image { 
            height: 160px; border-radius: var(--radius-md); overflow: hidden; 
            background: var(--slate-100); border: 1px solid var(--slate-200);
        }
        .property-image img { display: block; width: 100%; height: 100%; object-fit: cover; }
        .image-caption { display: none; }
        
        .property-content { display: flex; flex-direction: column; min-width: 0; }
        .property-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
        .property-title { font-size: 18px; font-weight: 700; color: var(--navy); margin: 0 0 4px; }
        .property-address { display: flex; align-items: center; gap: 6px; color: var(--slate-500); font-size: 13px; }
        .property-address svg { width: 14px; height: 14px; color: var(--slate-500); }
        
        .status { 
            display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; 
            border-radius: 99px; font-size: 12px; font-weight: 600; white-space: nowrap;
        }
        .status::before { content: ""; width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
        .status-active { background: var(--success-bg); color: var(--success); } 
        .status-maintenance { background: var(--warning-bg); color: #d97706; } 
        .status-inactive { background: var(--danger-bg); color: var(--danger); }

        /* Metrik Properti */
        .property-metrics { display: flex; gap: 24px; margin-bottom: 20px; }
        .metric { display: flex; flex-direction: column; }
        .metric-label { font-size: 12px; color: var(--slate-500); margin-bottom: 2px; }
        .metric-value { font-size: 15px; font-weight: 700; color: var(--navy); }
        .metric-value.text-success { color: var(--success); }
        .metric-value.text-warning { color: var(--warning); }

        /* Progress Bar Okupansi */
        .occupancy-wrapper { margin-bottom: 20px; flex: 1; }
        .occupancy-header { display: flex; justify-content: space-between; font-size: 12px; font-weight: 600; color: var(--navy); margin-bottom: 6px; }
        .progress-track { height: 6px; background: var(--slate-100); border-radius: 99px; overflow: hidden; }
        .progress-bar { height: 100%; background: var(--primary); border-radius: 99px; }

       /* ====== TOMBOL AKSI (Detail, Edit, Hapus) ====== */
        .property-actions { display: flex; gap: 10px; margin-top: auto; }
        
        .btn-secondary { 
            background-color: #ffffff !important; 
            color: var(--navy) !important; 
            border: 1px solid var(--slate-200) !important; 
        }
        .btn-secondary:hover { background-color: var(--slate-100) !important; }
        
        .btn-danger { 
            background-color: #ffffff !important; 
            color: var(--danger) !important; 
            border: 1px solid #fecaca !important; 
        }
        .btn-danger:hover { 
            background-color: var(--danger-bg) !important; 
            border-color: #fca5a5 !important; 
        }

       /* Empty State */
.empty-state { 
    padding: 60px 20px; 
    color: var(--slate-500); 
    text-align: center; 
    background: var(--bg-body); 
    border: 1px dashed var(--slate-200); 
    border-radius: var(--radius-lg); 
    margin: 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.empty-state svg { 
    width: 36px; 
    height: 36px; 
    color: #94a3b8; 
    margin-bottom: 12px; 
    display: block;
}

.empty-state strong { 
    display: block; 
    color: var(--navy); 
    font-size: 15px; 
    margin-bottom: 4px; 
    font-weight: 600; 
}

.empty-state p {
    margin: 0;
    font-size: 13px;
    color: var(--slate-500);
}

.empty-state p {
    margin: 0;
    font-size: 13px;
    color: var(--slate-500);
}

        /* ====== MODAL ====== */
        .property-modal { 
            display: none; position: fixed; inset: 0; z-index: 100; 
            background: rgba(15, 23, 42, 0.5); backdrop-filter: blur(4px);
            padding: 20px; align-items: center; justify-content: center; overflow-y: auto; 
        }
        .property-modal-content { 
            background: var(--card-bg); width: 100%; max-width: 600px; padding: 28px; 
            border-radius: var(--radius-xl); box-shadow: var(--shadow-modal); position: relative;
        }
        .modal-heading { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .modal-heading h2 { margin: 0 0 4px; font-size: 18px; font-weight: 700; } 
        .modal-heading p { margin: 0; color: var(--slate-500); font-size: 13px; }
        .modal-close { 
            border: 0; background: transparent; color: var(--slate-500); border-radius: var(--radius-md); 
            width: 32px; height: 32px; display: grid; place-items: center; transition: 0.2s;
        }
        .modal-close:hover { background: var(--slate-100); color: var(--navy); }
        .modal-close svg { width: 20px; height: 20px; }

        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full { grid-column: 1 / -1; } 
        .form-group label { font-weight: 600; font-size: 13px; color: var(--navy); }
        .form-group input, .form-group select { 
            width: 100%; padding: 10px 14px; border: 1px solid var(--slate-200); 
            border-radius: var(--radius-md); background: var(--card-bg); font-size: 13px;
            transition: 0.2s; outline: none;
        }
        .form-group input:focus, .form-group select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
        .form-group small { color: var(--slate-500); font-size: 12px; }
        
        .modal-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 28px; padding-top: 20px; border-top: 1px solid var(--slate-200); }

        /* Khusus Modal Detail */
        .detail-image-box { 
            height: 220px; background: var(--slate-100); border-radius: var(--radius-lg); 
            overflow: hidden; display: grid; place-items: center; color: var(--slate-500); margin-bottom: 24px; 
            border: 1px solid var(--slate-200);
        }
        .detail-info-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; margin-bottom: 20px; }
        .detail-box { padding: 14px; background: var(--slate-50); border-radius: var(--radius-md); border: 1px solid var(--slate-200); }
        .detail-box.full { grid-column: 1 / -1; }
        .detail-box span { display: block; color: var(--slate-500); font-size: 12px; margin-bottom: 4px; }
        .detail-box strong { font-size: 14px; color: var(--navy); }

        /* ====== RESPONSIVE ====== */
        .bottom-nav { display: none; }
        
        @media (max-width: 1024px) {
            .sidebar { width: 200px; padding: 24px 12px; }
            .main { padding: 24px; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .property-card { grid-template-columns: 180px minmax(0, 1fr); gap: 20px; }
        }
        
        @media (max-width: 768px) {
            .topbar { padding: 0 16px; gap: 16px; }
            .brand { width: auto; }
            .top-search, .sidebar { display: none; }
            .main { padding: 20px 16px 80px; }
            
            .page-heading { flex-direction: column; gap: 16px; }
            .page-heading .btn { width: 100%; }
            
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
            .stat-card { padding: 16px; flex-direction: column; align-items: flex-start; gap: 12px; }
            
            .filters { flex-direction: column; padding: 16px; }
            .property-card { grid-template-columns: 1fr; padding: 20px; }
            .property-image { height: 200px; }
            .property-metrics { gap: 16px; flex-wrap: wrap; }
            .property-actions { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; }
            .property-actions form, .property-actions button { width: 100%; margin: 0; }
            .property-actions form { grid-column: 1 / -1; }

            .bottom-nav { 
                display: flex; position: fixed; bottom: 0; left: 0; right: 0; z-index: 40;
                justify-content: space-around; padding: 12px 8px; 
                background: rgba(255, 255, 255, 0.95); border-top: 1px solid var(--slate-200); backdrop-filter: blur(10px); 
            }
            .bottom-nav a { display: flex; flex-direction: column; align-items: center; gap: 4px; color: var(--slate-500); text-decoration: none; font-size: 11px; font-weight: 500; }
            .bottom-nav a.active { color: var(--primary); }
            .bottom-nav svg { width: 20px; height: 20px; }
            
            .form-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<!-- HEADER -->
<header class="topbar">
    <div class="brand">
        <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
    </div>

    <div class="top-search">
        <span class="search-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </span>
        <input id="globalSearch" type="search" placeholder="Cari properti, alamat, atau lokasi..." aria-label="Cari properti">
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
                
               <a href="{{ route('profile.edit') }}" class="account-item"
   style="text-decoration: none;">
    <span class="account-icon">
        <svg viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round">
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

    <!-- MAIN CONTENT -->
    <main class="main">
        <section class="page-heading">
            <div>
                <h1>Properti</h1>
                <p class="subtitle">Kelola daftar properti yang Anda miliki atau kelola.</p>
            </div>
            <button class="btn btn-primary" type="button" onclick="showModal('propertyModal')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Tambah Properti
            </button>
        </section>

        @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin-bottom:0">@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
            </div>
        @endif

        @php
            $totalProperties = $properties->count();
            $totalRooms = $properties->sum('total_rooms');
            $occupiedRooms = $properties->sum('occupied_rooms');
            $vacantRooms = max(0, $totalRooms - $occupiedRooms);
        @endphp

        <!-- STATISTIK -->
        <section class="stats">
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Total Properti</span>
                    <span class="stat-number">{{ $totalProperties }}</span>
                </div>
                <div class="stat-icon blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V7l9-4 9 4v14"/><path d="M7 21v-4h4v4M7 9h2m6 0h2m-10 4h2m6 0h2"/></svg></div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Total Kamar</span>
                    <span class="stat-number">{{ $totalRooms }}</span>
                </div>
                <div class="stat-icon purple">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 4v16"/>
                        <path d="M2 8h18a2 2 0 0 1 2 2v10"/>
                        <path d="M2 17h20"/>
                        <circle cx="6" cy="11" r="2"/>
                    </svg>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Kamar Terisi</span>
                    <span class="stat-number">{{ $occupiedRooms }}</span>
                </div>
                <div class="stat-icon green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/></svg></div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Kamar Kosong</span>
                    <span class="stat-number">{{ $vacantRooms }}</span>
                </div>
                <div class="stat-icon orange">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 4v16"/>
                        <path d="M2 8h18a2 2 0 0 1 2 2v10"/>
                        <path d="M2 17h20"/>
                        <path d="M6 11h4"/>
                        <path d="M8 9v4"/>
                    </svg>
                </div>
            </div>
        </section>

        <!-- PANEL DAFTAR PROPERTI -->
        <section class="panel" id="daftar-properti">
            <div class="panel-heading">
                <h2>Daftar Properti</h2>
                <span class="subtitle" id="resultCount">{{ $totalProperties }} properti</span>
            </div>
            <div class="filters">
                <div class="filter-search-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input id="propertySearch" type="search" placeholder="Cari nama atau alamat properti...">
                </div>
                <select id="locationFilter">
                    <option value="">Semua Lokasi</option>
                    @foreach ($properties->pluck('location')->filter()->unique()->sort() as $location)
                        <option value="{{ strtolower($location) }}">{{ $location }}</option>
                    @endforeach
                </select>
                <select id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <div class="property-list" id="propertyList">
                @forelse ($properties as $property)
                    @php
                        $total = (int) $property->total_rooms;
                        $occupied = (int) $property->occupied_rooms;
                        $vacant = max(0, $total - $occupied);
                        $occupancy = $total > 0 ? round(($occupied / $total) * 100) : 0;
                        $status = strtolower($property->status);
                        $statusClass = match ($status) { 'aktif' => 'status-active', 'maintenance' => 'status-maintenance', default => 'status-inactive' };
                        $imageUrl = $property->image ? (str_starts_with($property->image, 'properties/') ? asset('storage/'.$property->image) : asset('images/'.$property->image)) : '';
                    @endphp
                    <article class="property-card" data-name="{{ strtolower($property->name) }}" data-location="{{ strtolower($property->location) }}" data-status="{{ $status }}">
                        <div class="property-image">
                            @if ($imageUrl)
                                <img src="{{ $imageUrl }}" alt="Bangunan {{ $property->name }}" loading="lazy" onerror="this.style.display='none'">
                            @else
                                <div style="height:100%;display:grid;place-items:center;color:var(--slate-500);font-size:12px;">Foto kosong</div>
                            @endif
                        </div>
                        <div class="property-content">
                            <div class="property-header">
                                <div>
                                    <h3 class="property-title">{{ $property->name }}</h3>
                                    <div class="property-address">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                        {{ $property->address }}, {{ $property->location }}
                                    </div>
                                </div>
                                <span class="status {{ $statusClass }}">{{ ucfirst($status) }}</span>
                            </div>
                            
                            <div class="property-metrics">
                                <div class="metric"><span class="metric-label">Total Kamar</span><span class="metric-value">{{ $total }}</span></div>
                                <div class="metric"><span class="metric-label">Terisi</span><span class="metric-value text-success">{{ $occupied }}</span></div>
                                <div class="metric"><span class="metric-label">Kosong</span><span class="metric-value text-warning">{{ $vacant }}</span></div>
                            </div>

                            <div class="occupancy-wrapper">
                                <div class="occupancy-header"><span>Tingkat Okupansi</span><span>{{ $occupancy }}%</span></div>
                                <div class="progress-track"><div class="progress-bar" style="width:{{ $occupancy }}%"></div></div>
                            </div>
                            
                            <div class="property-actions">
                                <button type="button" class="btn btn-primary" onclick="openDetailModal(this)"
                                    data-name="{{ $property->name }}" data-address="{{ $property->address }}" data-location="{{ $property->location }}"
                                    data-total-rooms="{{ $property->total_rooms }}" data-occupied-rooms="{{ $property->occupied_rooms }}"
                                    data-status="{{ $property->status }}" data-image="{{ $imageUrl }}">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg> Detail
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="openEditModal(this)"
                                    data-id="{{ $property->id }}" data-name="{{ $property->name }}" data-address="{{ $property->address }}"
                                    data-location="{{ $property->location }}" data-total-rooms="{{ $property->total_rooms }}"
                                    data-occupied-rooms="{{ $property->occupied_rooms }}" data-status="{{ $property->status }}">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg> Edit
                                </button>
                               <button type="button" class="btn btn-danger"
    onclick="openDeleteModal('{{ route('properties.destroy', ['property' => $property->id]) }}', @js($property->name), 'Properti')">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg> Hapus
</button>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state" id="emptyState">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V7l9-4 9 4v14"/><path d="M7 21v-4h4v4M7 9h2m6 0h2m-10 4h2m6 0h2"/></svg>
                        <strong>Belum ada data properti</strong>
                        Properti yang ditambahkan ke database akan muncul di sini.
                    </div>
                @endforelse
            </div>
            
           @if ($totalProperties > 0)
    <div class="empty-state" id="emptyState" style="display:none">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <strong>Pencarian tidak ditemukan</strong>
        <p>Coba gunakan kata kunci atau filter lain.</p>
    </div>
@endif
        </section>
    </main>
</div>

<!-- ====== MODAL TAMBAH PROPERTI ====== -->
<div class="property-modal" id="propertyModal">
    <div class="property-modal-content">
        <div class="modal-heading">
            <div><h2>Tambah Properti</h2><p>Masukkan informasi properti baru.</p></div>
            <button type="button" class="modal-close" onclick="hideModal('propertyModal')"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
        </div>
        <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="form-group full"><label for="name">Nama Properti</label><input id="name" name="name" value="{{ old('name') }}" required></div>
                <div class="form-group full"><label for="address">Alamat Lengkap</label><input id="address" name="address" value="{{ old('address') }}" required></div>
                <div class="form-group"><label for="location">Kota / Lokasi</label><input id="location" name="location" value="{{ old('location') }}" required></div>
                <div class="form-group"><label for="status">Status Properti</label><select id="status" name="status" required><option value="aktif">Aktif</option><option value="maintenance">Maintenance</option><option value="nonaktif">Nonaktif</option></select></div>
                <div class="form-group"><label for="total_rooms">Total Kamar</label><input id="total_rooms" name="total_rooms" type="number" min="0" value="{{ old('total_rooms',0) }}" required></div>
                <div class="form-group"><label for="occupied_rooms">Kamar Terisi</label><input id="occupied_rooms" name="occupied_rooms" type="number" min="0" value="{{ old('occupied_rooms',0) }}" required></div>
                <div class="form-group full"><label for="image">Foto Bangunan</label><input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp" style="padding:7px;"><small>Format JPG/PNG/WebP maks 2MB.</small></div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="hideModal('propertyModal')">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Properti</button>
            </div>
        </form>
    </div>
</div>

<!-- ====== MODAL EDIT PROPERTI ====== -->
<div class="property-modal" id="editPropertyModal">
    <div class="property-modal-content">
        <div class="modal-heading">
            <div><h2>Edit Properti</h2><p>Perbarui informasi properti.</p></div>
            <button type="button" class="modal-close" onclick="hideModal('editPropertyModal')"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
        </div>
        <form id="editPropertyForm" method="POST" enctype="multipart/form-data" data-update-url="{{ route('properties.update', ['property' => '__PROPERTY__']) }}">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="form-group full"><label for="edit_name">Nama Properti</label><input id="edit_name" name="name" required></div>
                <div class="form-group full"><label for="edit_address">Alamat Lengkap</label><input id="edit_address" name="address" required></div>
                <div class="form-group"><label for="edit_location">Kota / Lokasi</label><input id="edit_location" name="location" required></div>
                <div class="form-group"><label for="edit_status">Status</label><select id="edit_status" name="status" required><option value="aktif">Aktif</option><option value="maintenance">Maintenance</option><option value="nonaktif">Nonaktif</option></select></div>
                <div class="form-group"><label for="edit_total_rooms">Total Kamar</label><input id="edit_total_rooms" name="total_rooms" type="number" min="0" required></div>
                <div class="form-group"><label for="edit_occupied_rooms">Kamar Terisi</label><input id="edit_occupied_rooms" name="occupied_rooms" type="number" min="0" required></div>
                <div class="form-group full"><label for="edit_image">Ganti Foto (opsional)</label><input id="edit_image" name="image" type="file" accept="image/jpeg,image/png,image/webp" style="padding:7px;"><small>Kosongkan jika memakai foto lama.</small></div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="hideModal('editPropertyModal')">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- ====== MODAL DETAIL ====== -->
<div class="property-modal" id="detailPropertyModal">
    <div class="property-modal-content">
        <div class="modal-heading">
            <div><h2>Detail Properti</h2><p>Informasi lengkap properti.</p></div>
            <button type="button" class="modal-close" onclick="hideModal('detailPropertyModal')"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
        </div>
        <div class="detail-image-box">
            <img id="detailImage" src="" alt="Foto" style="display:none;width:100%;height:100%;object-fit:cover">
            <div id="detailImagePlaceholder">Foto tidak tersedia</div>
        </div>
        <div class="property-header" style="margin-bottom:20px;">
            <div><h3 class="property-title" id="detailName">-</h3><div class="property-address" id="detailLocation">-</div></div>
            <span id="detailStatus" class="status status-active">Aktif</span>
        </div>
        <div class="detail-info-grid">
            <div class="detail-box full"><span>Alamat Lengkap</span><strong id="detailAddress">-</strong></div>
            <div class="detail-box"><span>Total Kamar</span><strong id="detailTotalRooms">0</strong></div>
            <div class="detail-box"><span>Kamar Terisi</span><strong id="detailOccupiedRooms" style="color:var(--success)">0</strong></div>
            <div class="detail-box"><span>Kamar Kosong</span><strong id="detailVacantRooms" style="color:var(--warning)">0</strong></div>
            <div class="detail-box">
                <span>Tingkat Okupansi</span><strong id="detailOccupancyValue">0%</strong>
                <div class="progress-track" style="margin-top:6px; height:4px;"><div class="progress-bar" id="detailOccupancyBar" style="width:0%"></div></div>
            </div>
        </div>
        <div class="modal-actions" style="margin-top:0;">
            <button type="button" class="btn btn-secondary" onclick="hideModal('detailPropertyModal')">Tutup</button>
        </div>
    </div>
</div>

<!-- Bottom Nav (Mobile) -->
<nav class="bottom-nav">
    <a href="{{ route('dashboard.pemilik') }}" class="active"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg> Properti</a>
    <a href="{{ route('dashboard.kamar') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><rect x="7" y="7" width="3" height="9"/><rect x="14" y="7" width="3" height="5"/></svg> Kamar</a>
    <a href="{{ route('dashboard.penyewa') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> Penyewa</a>
    <a href="{{ route('dashboard.tagihan') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg> Tagihan</a>
</nav>

<!-- ====== JAVASCRIPT ====== -->
<script>
function showModal(id) { const modal = document.getElementById(id); if (modal) modal.style.display = 'flex'; }
function hideModal(id) { const modal = document.getElementById(id); if (modal) modal.style.display = 'none'; }

function openEditModal(btn) {
    const form = document.getElementById('editPropertyForm');
    form.action = form.dataset.updateUrl.replace('__PROPERTY__', encodeURIComponent(btn.dataset.id));
    document.getElementById('edit_name').value = btn.dataset.name || '';
    document.getElementById('edit_address').value = btn.dataset.address || '';
    document.getElementById('edit_location').value = btn.dataset.location || '';
    document.getElementById('edit_total_rooms').value = btn.dataset.totalRooms || 0;
    document.getElementById('edit_occupied_rooms').value = btn.dataset.occupiedRooms || 0;
    document.getElementById('edit_status').value = btn.dataset.status || 'aktif';
    document.getElementById('edit_image').value = '';
    showModal('editPropertyModal');
}

function openDetailModal(btn) {
    const total = Number(btn.dataset.totalRooms || 0);
    const occupied = Number(btn.dataset.occupiedRooms || 0);
    const vacant = Math.max(0, total - occupied);
    const occupancy = total > 0 ? Math.round(occupied / total * 100) : 0;
    const status = (btn.dataset.status || 'aktif').toLowerCase();
    
    document.getElementById('detailName').textContent = btn.dataset.name || '-';
    document.getElementById('detailAddress').textContent = btn.dataset.address || '-';
    document.getElementById('detailLocation').textContent = btn.dataset.location || '-';
    document.getElementById('detailTotalRooms').textContent = total + ' kamar';
    document.getElementById('detailOccupiedRooms').textContent = occupied + ' kamar';
    document.getElementById('detailVacantRooms').textContent = vacant + ' kamar';
    document.getElementById('detailOccupancyValue').textContent = occupancy + '%';
    document.getElementById('detailOccupancyBar').style.width = occupancy + '%';
    
    const statusEl = document.getElementById('detailStatus');
    statusEl.textContent = ({aktif:'Aktif',maintenance:'Maintenance',nonaktif:'Nonaktif'})[status] || status;
    statusEl.className = 'status ' + (status === 'aktif' ? 'status-active' : status === 'maintenance' ? 'status-maintenance' : 'status-inactive');
    
    const image = document.getElementById('detailImage');
    const placeholder = document.getElementById('detailImagePlaceholder');
    const url = btn.dataset.image || '';
    
    image.onerror = () => { image.style.display = 'none'; placeholder.style.display = 'flex'; };
    if (url) { image.src = url; image.style.display = 'block'; placeholder.style.display = 'none'; } 
    else { image.removeAttribute('src'); image.style.display = 'none'; placeholder.style.display = 'flex'; }
    
    showModal('detailPropertyModal');
}

// Interaksi Modal & Esc
document.querySelectorAll('.property-modal').forEach(m => { m.addEventListener('click', e => { if (e.target === m) m.style.display = 'none'; }); });
document.addEventListener('keydown', e => { if (e.key === 'Escape') document.querySelectorAll('.property-modal').forEach(m => m.style.display = 'none'); });

// Menu Akun
const accBtn = document.getElementById('accountMenuButton');
const accDrop = document.getElementById('accountDropdown');
if (accBtn && accDrop) {
    accBtn.addEventListener('click', e => { e.stopPropagation(); accDrop.hidden = !accDrop.hidden; accBtn.setAttribute('aria-expanded', !accDrop.hidden); });
    accDrop.addEventListener('click', e => e.stopPropagation());
    document.addEventListener('click', () => { accDrop.hidden = true; accBtn.setAttribute('aria-expanded', 'false'); });
}

// Logika Filter & Pencarian (Dipertahankan 100%)
const pSearch = document.getElementById('propertySearch');
const gSearch = document.getElementById('globalSearch');
const lFilter = document.getElementById('locationFilter');
const sFilter = document.getElementById('statusFilter');
const cards = [...document.querySelectorAll('.property-card')];
const rCount = document.getElementById('resultCount');
const eStates = [...document.querySelectorAll('#emptyState')];

function filterData() {
    const query = ((pSearch?.value || '') + ' ' + (gSearch?.value || '')).trim().toLowerCase();
    const loc = lFilter?.value || '';
    const stat = sFilter?.value || '';
    let visible = 0;
    
    cards.forEach(card => {
        const match = (!query || card.dataset.name.includes(query) || card.textContent.toLowerCase().includes(query)) &&
                      (!loc || card.dataset.location === loc) && (!stat || card.dataset.status === stat);
        card.style.display = match ? '' : 'none';
        if (match) visible++;
    });
    
    if (rCount) rCount.textContent = visible + ' properti';
    eStates.forEach(el => el.style.display = (cards.length > 0 && visible === 0) || cards.length === 0 ? 'flex' : 'none');
}

pSearch?.addEventListener('input', () => { if (gSearch) gSearch.value = ''; filterData(); });
gSearch?.addEventListener('input', () => { if (pSearch) pSearch.value = ''; filterData(); });
lFilter?.addEventListener('change', filterData);
sFilter?.addEventListener('change', filterData);
</script>
@include('components.delete-confirm-modal')
</body>
</html>