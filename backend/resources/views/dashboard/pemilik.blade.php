
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Properti - ALIVARE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }

        :root {
            --blue: #0866f5;
            --navy: #101d4d;
            --muted: #71809f;
            --line: #e4ebf7;
            --background: #f5f8fe;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--navy);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        button, input, select { font: inherit; }
        button { cursor: pointer; }

        .topbar {
            min-height: 76px;
            padding: 12px 32px;
            display: flex;
            align-items: center;
            gap: 24px;
            background: white;
            border-bottom: 1px solid var(--line);
            position: sticky;
            top: 0;
            z-index: 5;
        }

        
.brand {
    display: flex;
    align-items: center;
    flex-shrink: 0;
    width: 125px;
}

.brand img {
    display: block;
    width: 100%;
    height: auto;
    max-height: 58px;
    object-fit: contain;
}


        .top-search {
            max-width: 520px;
            flex: 1;
            position: relative;
        }

        .top-search input {
            width: 100%;
            padding: 13px 16px 13px 42px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #f5f8fd;
            outline: none;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 12px;
            color: var(--muted);
            font-size: 18px;
        }

        .top-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .icon-button {
            border: 0;
            background: transparent;
            color: var(--navy);
            font-size: 21px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #2636a0;
            color: white;
            display: grid;
            place-items: center;
            font-weight: 700;
            font-size: 18px;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 76px);
        }

        .sidebar {
            width: 220px;
            padding: 26px 14px;
            background: white;
            border-right: 1px solid var(--line);
            flex-shrink: 0;
        }

        .nav-label {
            padding: 8px 12px;
            color: #9aa6bd;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 10px;
            color: #667593;
            text-decoration: none;
            font-weight: 600;
        }

        .nav-link.active {
            color: var(--blue);
            background: #eaf2ff;
        }

        
.nav-icon {
    width: 20px;
    height: 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.nav-icon svg {
    width: 18px;
    height: 18px;
    display: block;
}


        .main {
            flex: 1;
            min-width: 0;
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 24px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: clamp(26px, 3vw, 34px);
            letter-spacing: -1px;
        }

        .subtitle {
            color: var(--muted);
            margin: 0;
            font-size: 14px;
        }

        .primary-button {
            border: 0;
            border-radius: 11px;
            background: var(--blue);
            color: white;
            padding: 13px 18px;
            font-weight: 700;
            box-shadow: 0 5px 14px #0866f522;
            text-decoration: none;
            white-space: nowrap;
        }

        .primary-button:hover { background: #0055d9; }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 26px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 3px 12px #243b6810;
        }

        ```css
.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 13px;
    display: grid;
    place-items: center;
    flex-shrink: 0;
}

.stat-icon svg {
    width: 25px;
    height: 25px;
    display: block;
}
```

        .blue { background: #e8f1ff; color: #0866f5; }
        .green { background: #e5f8ee; color: #0a9d58; }
        .orange { background: #fff2df; color: #f28a00; }
        .purple { background: #eeeaff; color: #7557d9; }

        .stat-number {
            font-size: 27px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .stat-label { color: var(--muted); font-size: 12px; }

        .panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 3px 12px #243b6808;
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .panel-heading h2 {
            font-size: 19px;
            margin: 0;
        }

        .filters {
            display: grid;
            grid-template-columns: minmax(180px, 1.6fr) 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .filters input, .filters select {
            width: 100%;
            min-width: 0;
            border: 1px solid #dce5f4;
            background: #f9fbff;
            border-radius: 10px;
            padding: 12px;
            color: var(--navy);
            outline: none;
        }

        .property-list { display: grid; gap: 15px; }

        .property-card {
            display: grid;
            grid-template-columns: 185px minmax(0, 1fr);
            gap: 20px;
            padding: 15px;
            border: 1px solid var(--line);
            border-radius: 14px;
            transition: box-shadow .2s, transform .2s;
        }

        .property-card:hover {
            box-shadow: 0 8px 22px #243b6810;
            transform: translateY(-1px);
        }

        .property-image {
            height: 190px;
            border-radius: 11px;
            position: relative;
            overflow: hidden;
            background: #e5edf8;
        }

        .property-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .image-caption {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: #102044cc;
            color: white;
            border-radius: 7px;
            padding: 6px 9px;
            font-size: 11px;
            z-index: 1;
        }

        .property-content { min-width: 0; }

        .property-title-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .property-title {
            font-size: 19px;
            font-weight: 800;
            margin: 2px 0 8px;
        }

        .address {
            color: var(--muted);
            line-height: 1.6;
            margin-bottom: 9px;
        }

        .location-tag {
            display: inline-block;
            background: #eaf2ff;
            color: #0866f5;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .status {
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .status::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-active { background: #e4f8ed; color: #079552; }
        .status-maintenance { background: #fff1dd; color: #e78a00; }
        .status-inactive { background: #ffe8e8; color: #df3333; }

        .property-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 9px;
            margin: 16px 0;
        }

        .mini-stat {
            padding: 11px;
            border-radius: 9px;
            background: #f2f6fd;
        }

        .mini-stat strong {
            display: block;
            font-size: 18px;
            margin-bottom: 4px;
        }

        .mini-stat span {
            color: var(--muted);
            font-size: 11px;
        }

        .occupancy {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .occupancy-label {
            font-size: 12px;
            white-space: nowrap;
        }

        .progress {
            height: 8px;
            background: #e7edf7;
            border-radius: 20px;
            flex: 1;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #0875ff, #25b778);
            border-radius: inherit;
        }

        .occupancy-value {
            font-size: 12px;
            font-weight: 800;
        }

        .property-actions { display: flex; gap: 9px; }

        .action-button {
            flex: 1;
            padding: 10px 8px;
            border: 1px solid #e2eafa;
            border-radius: 9px;
            background: #f1f5fd;
            color: var(--navy);
            font-size: 12px;
            font-weight: 700;
        }

        .action-button.detail {
            color: white;
            background: var(--blue);
            border-color: var(--blue);
        }

        .action-button.delete {
            color: #e33838;
            background: #fff0f0;
            border-color: #ffe2e2;
        }

        .empty-state {
            padding: 36px 20px;
            color: var(--muted);
            text-align: center;
            background: #f9fbff;
            border: 1px dashed #dce5f4;
            border-radius: 12px;
        }

        .empty-state strong {
            display: block;
            color: var(--navy);
            font-size: 16px;
            margin-bottom: 8px;
        }

        .alert-success {
            background: #e5f8ee;
            color: #087c49;
            border: 1px solid #bdebd1;
            border-radius: 10px;
            padding: 13px 16px;
            margin-bottom: 18px;
        }

        .alert-error {
            background: #fff0f0;
            color: #b42323;
            border: 1px solid #ffd6d6;
            border-radius: 10px;
            padding: 13px 16px;
            margin-bottom: 18px;
        }

        .bottom-nav { display: none; }

        @media (max-width: 1050px) {
            .sidebar { width: 180px; }
            .main { padding: 22px; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .property-card { grid-template-columns: 145px minmax(0, 1fr); }
        }

        @media (max-width: 700px) {
            .topbar {
                min-height: 64px;
                padding: 10px 15px;
                gap: 13px;
            }

            .brand { font-size: 20px; }
            .top-search { display: none; }
            .top-actions { gap: 12px; }
            .sidebar { display: none; }
            .main { padding: 21px 14px 92px; }
            .page-heading { align-items: flex-start; }
            .page-heading h1 { font-size: 27px; }
            .subtitle { font-size: 13px; line-height: 1.5; }
            .primary-button { padding: 11px; font-size: 12px; }
            .stats { gap: 10px; }
            .stat-card { padding: 12px; gap: 9px; }
            .stat-icon { width: 38px; height: 38px; font-size: 19px; }
            .stat-number { font-size: 22px; }
            .stat-label { font-size: 11px; }
            .panel { padding: 13px; }
            .panel-heading h2 { font-size: 17px; }
            .filters { grid-template-columns: 1fr; gap: 9px; }

            .property-card {
                grid-template-columns: 1fr;
                gap: 13px;
            }

            .property-image { height: 200px; }
            .property-title { font-size: 17px; }
            .property-stats { gap: 6px; margin: 12px 0; }
            .mini-stat { padding: 9px 7px; }
            .mini-stat strong { font-size: 16px; }
            .mini-stat span { font-size: 10px; }
            .property-actions { gap: 6px; }
            .action-button { font-size: 11px; padding: 10px 5px; }

            .bottom-nav {
                display: flex;
                position: fixed;
                z-index: 10;
                bottom: 0;
                left: 0;
                right: 0;
                justify-content: space-around;
                padding: 10px 4px calc(10px + env(safe-area-inset-bottom));
                background: #ffffffee;
                border-top: 1px solid var(--line);
                backdrop-filter: blur(12px);
            }

            .bottom-nav a {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 4px;
                color: var(--muted);
                text-decoration: none;
                font-size: 10px;
            }

            .bottom-nav a.active {
                color: var(--blue);
                font-weight: 700;
            }

            .bottom-nav span:first-child { font-size: 19px; }
        }


.property-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 100;
    background: #101d4d88;
    padding: 20px;
    align-items: center;
    justify-content: center;
    overflow-y: auto;
}

.property-modal-content {
    background: white;
    width: 100%;
    max-width: 650px;
    max-height: 90vh;
    overflow-y: auto;
    padding: 25px;
    border-radius: 17px;
    box-shadow: 0 20px 60px #101d4d33;
}

.modal-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 24px;
}

.modal-heading h2 {
    margin: 0 0 7px;
    font-size: 23px;
}

.modal-heading p {
    margin: 0;
    color: var(--muted);
}

.modal-close {
    border: 0;
    background: #f1f5fd;
    color: var(--navy);
    border-radius: 9px;
    width: 36px;
    height: 36px;
    font-size: 25px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 17px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-width: 0;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-group label {
    font-weight: 700;
    color: var(--navy);
}

.form-group input,
.form-group select {
    width: 100%;
    min-width: 0;
    padding: 12px;
    border: 1px solid #dce5f4;
    border-radius: 10px;
    background: #f9fbff;
    color: var(--navy);
}

.form-group input:focus,
.form-group select:focus {
    outline: 2px solid #0866f533;
    border-color: var(--blue);
}

.form-group small {
    color: var(--muted);
    line-height: 1.5;
}

.modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 25px;
}

.cancel-button {
    padding: 12px 18px;
    border: 1px solid var(--line);
    border-radius: 10px;
    background: white;
    color: var(--navy);
    font-weight: 700;
}

@media (max-width: 500px) {
    .property-modal { padding: 10px; }
    .property-modal-content { padding: 18px; }
    .form-grid { grid-template-columns: 1fr; }
    .form-group.full { grid-column: auto; }
}


    </style>
</head>

<body>
<header class="topbar">
    
<div class="brand">
    <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
</div>


    <label class="top-search">
        <span class="search-icon">⌕</span>
        <input id="globalSearch" type="search"
               placeholder="Cari properti, alamat, atau lokasi..."
               aria-label="Cari properti">
    </label>

    <div class="top-actions">
        
<button class="icon-button" type="button" aria-label="Notifikasi" title="Notifikasi">
    <svg viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="1.8"
         stroke-linecap="round" stroke-linejoin="round"
         width="20" height="20" aria-hidden="true">
        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
        <path d="M10 21h4"/>
    </svg>
</button>

        <div class="avatar" title="Pengelola">
            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="icon-button" type="submit" title="Logout">↪</button>
        </form>
    </div>
</header>

<div class="layout">
  <aside class="sidebar">
    @include('components.sidebar-menu')
</aside>

<!-- MODAL TAMBAH PROPERTI -->
<div class="property-modal" id="propertyModal">
    <div class="property-modal-content">
        <div class="modal-heading">
            <div>
                <h2>Tambah Properti</h2>
                <p>Masukkan informasi properti baru.</p>
            </div>
            <button type="button" class="modal-close"
                    onclick="document.getElementById('propertyModal').style.display='none'">
                &times;
            </button>
        </div>

        <form method="POST"
              action="{{ route('properties.store') }}"
              enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <div class="form-group full">
                    <label for="name">Nama Properti</label>
                    <input id="name" name="name" type="text"
                           value="{{ old('name') }}"
                           placeholder="Contoh: Alivare Residence"
                           maxlength="255" required>
                </div>

                <div class="form-group full">
                    <label for="address">Alamat Lengkap</label>
                    <input id="address" name="address" type="text"
                           value="{{ old('address') }}"
                           placeholder="Contoh: Jl. Kebon Jeruk No. 12"
                           maxlength="255" required>
                </div>

                <div class="form-group">
                    <label for="location">Kota / Lokasi</label>
                    <input id="location" name="location" type="text"
                           value="{{ old('location') }}"
                           placeholder="Contoh: Jakarta Barat"
                           maxlength="100" required>
                </div>

                <div class="form-group">
                    <label for="status">Status Properti</label>
                    <select id="status" name="status" required>
                        <option value="aktif" @selected(old('status', 'aktif') === 'aktif')>Aktif</option>
                        <option value="maintenance" @selected(old('status') === 'maintenance')>Maintenance</option>
                        <option value="nonaktif" @selected(old('status') === 'nonaktif')>Nonaktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="total_rooms">Total Kamar</label>
                    <input id="total_rooms" name="total_rooms"
                           type="number" min="0"
                           value="{{ old('total_rooms', 0) }}" required>
                </div>

                <div class="form-group">
                    <label for="occupied_rooms">Kamar Terisi</label>
                    <input id="occupied_rooms" name="occupied_rooms"
                           type="number" min="0"
                           value="{{ old('occupied_rooms', 0) }}" required>
                </div>

                <div class="form-group full">
                    <label for="image">Foto Bangunan (opsional)</label>
                    <input id="image" name="image" type="file"
                           accept="image/jpeg,image/png,image/webp">
                    <small>Format JPG, PNG, atau WebP. Maksimal 2 MB.</small>
                </div>
            </div>

            <div class="modal-actions">
                <button type="button" class="cancel-button"
                        onclick="document.getElementById('propertyModal').style.display='none'">
                    Batal
                </button>
                <button type="submit" class="primary-button">
                    Simpan Properti
                </button>
            </div>
        </form>
    </div>
</div>


    <main class="main">
        <section class="page-heading">
            <div>
                <h1>Properti</h1>
                <p class="subtitle">
                    Kelola daftar properti yang dimiliki atau dikelola.
                </p>
            </div>
                
<button class="primary-button" type="button"
        onclick="document.getElementById('propertyModal').style.display='flex'">
    ＋ Tambah Properti
</button>

            </button>
        </section>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin-bottom:0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $totalProperties = $properties->count();
            $totalRooms = $properties->sum('total_rooms');
            $occupiedRooms = $properties->sum('occupied_rooms');
            $vacantRooms = max(0, $totalRooms - $occupiedRooms);
        @endphp

<section class="stats" aria-label="Ringkasan properti">
    <article class="stat-card">
        <div class="stat-icon blue">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 21V7l9-4 9 4v14M7 21v-4h4v4M7 9h2m6 0h2M7 13h2m6 0h2"
                    fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div>
            <div class="stat-number">{{ $totalProperties }}</div>
            <div class="stat-label">Total Properti</div>
        </div>
    </article>

    <article class="stat-card">
        <div class="stat-icon green">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <rect x="4" y="3" width="16" height="18" rx="2"
                    fill="none" stroke="currentColor" stroke-width="1.8"/>
                <path d="M8 7h8v10H8z"
                    fill="none" stroke="currentColor" stroke-width="1.8"/>
            </svg>
        </div>
        <div>
            <div class="stat-number">{{ $totalRooms }}</div>
            <div class="stat-label">Total Kamar</div>
        </div>
    </article>

    <article class="stat-card">
        <div class="stat-icon purple">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <circle cx="12" cy="7" r="3"
                    fill="none" stroke="currentColor" stroke-width="1.8"/>
                <path d="M5 21v-2a7 7 0 0 1 14 0v2H5z"
                    fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linejoin="round"/>
            </svg>
        </div>
        <div>
            <div class="stat-number">{{ $occupiedRooms }}</div>
            <div class="stat-label">Kamar Terisi</div>
        </div>
    </article>

    <article class="stat-card">
        <div class="stat-icon orange">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="m3 11 9-8 9 8M5 10v11h14V10M10 21v-6h4v6"
                    fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div>
            <div class="stat-number">{{ $vacantRooms }}</div>
            <div class="stat-label">Kamar Kosong</div>
        </div>
    </article>
</section>
```

        <section class="panel" id="daftar-properti">
            <div class="panel-heading">
                <h2>Daftar Properti</h2>
                <span class="subtitle" id="resultCount">
                    {{ $totalProperties }} properti
                </span>
            </div>

            <div class="filters">
                <input id="propertySearch" type="search"
                       placeholder="Cari nama atau alamat properti...">

                <select id="locationFilter" aria-label="Filter lokasi">
                    <option value="">Semua Lokasi</option>
                    @foreach ($properties->pluck('location')->filter()->unique()->sort() as $location)
                        <option value="{{ strtolower($location) }}">
                            {{ $location }}
                        </option>
                    @endforeach
                </select>

                <select id="statusFilter" aria-label="Filter status">
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
                        $occupancy = $total > 0
                            ? round(($occupied / $total) * 100)
                            : 0;

                        $status = strtolower($property->status);
                        $statusClass = match ($status) {
                            'aktif' => 'status-active',
                            'maintenance' => 'status-maintenance',
                            default => 'status-inactive',
                        };

                        $imageUrl = $property->image
                            ? (str_starts_with($property->image, 'properties/')
                                ? asset('storage/' . $property->image)
                                : asset('images/' . $property->image))
                            : null;
                    @endphp

                    <article class="property-card"
                             data-name="{{ strtolower($property->name) }}"
                             data-location="{{ strtolower($property->location) }}"
                             data-status="{{ $status }}">

                        <div class="property-image">
                            @if ($imageUrl)
                                <img src="{{ $imageUrl }}"
                                     alt="Bangunan {{ $property->name }}"
                                     loading="lazy"
                                     onerror="this.style.display='none'">
                            @else
                                <div style="height:100%;display:grid;place-items:center;color:#71809f">
                                    Foto belum tersedia
                                </div>
                            @endif

                            <span class="image-caption">
                                {{ $property->name }}
                            </span>
                        </div>

                        <div class="property-content">
                            <div class="property-title-row">
                                <div>
                                    <h3 class="property-title">
                                        {{ $property->name }}
                                    </h3>

                                    <div class="address">
                                        ⌖ {{ $property->address }}
                                    </div>

                                    <span class="location-tag">
                                        {{ $property->location }}
                                    </span>
                                </div>

                                <span class="status {{ $statusClass }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </div>

                            <div class="property-stats">
                                <div class="mini-stat">
                                    <strong>{{ $total }}</strong>
                                    <span>Total Kamar</span>
                                </div>

                                <div class="mini-stat">
                                    <strong style="color:#079552">
                                        {{ $occupied }}
                                    </strong>
                                    <span>Terisi</span>
                                </div>

                                <div class="mini-stat">
                                    <strong style="color:#e78a00">
                                        {{ $vacant }}
                                    </strong>
                                    <span>Kosong</span>
                                </div>
                            </div>

                            <div class="occupancy">
                                <span class="occupancy-label">Okupansi</span>

                                <div class="progress">
                                    <div class="progress-fill"
                                         style="width:{{ $occupancy }}%;{{ $status === 'maintenance' ? 'background:#f59e0b' : '' }}">
                                    </div>
                                </div>

                                <span class="occupancy-value">
                                    {{ $occupancy }}%
                                </span>
                            </div>

                            <div class="property-actions">
                                
<button
    type="button"
    class="action-button detail"
    onclick="openDetailModal(this)"
    data-id="{{ $property->id }}"
    data-name="{{ $property->name }}"
    data-address="{{ $property->address }}"
    data-location="{{ $property->location }}"
    data-total-rooms="{{ $property->total_rooms }}"
    data-occupied-rooms="{{ $property->occupied_rooms }}"
    data-status="{{ $property->status }}"
    data-image="{{ $property->image ? asset('storage/' . $property->image) : '' }}"
>
    ◉ Detail
</button>


                               
<button
    type="button"
    class="action-button"
    onclick="openEditModal(this)"
    data-id="{{ $property->id }}"
    data-name="{{ $property->name }}"
    data-address="{{ $property->address }}"
    data-location="{{ $property->location }}"
    data-total-rooms="{{ $property->total_rooms }}"
    data-occupied-rooms="{{ $property->occupied_rooms }}"
    data-status="{{ $property->status }}"
>
    ✎ Edit
</button>


                                
<form
    method="POST"
    action="{{ route('properties.destroy', ['property' => $property->id]) }}"
    style="flex: 1"
    onsubmit="return confirm('Yakin ingin menghapus properti ini? Data yang dihapus tidak dapat dikembalikan.')"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="action-button delete"
        style="width: 100%"
    >
        Hapus
    </button>
</form>

                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state" id="emptyState">
                        <strong>Belum ada properti</strong>
                        Properti yang disimpan ke database akan muncul di sini.
                        <p style="margin-bottom:0">
                            Data properti belum tersedia untuk akun ini.
                        </p>
                    </div>
                @endforelse
            </div>

            @if ($totalProperties > 0)
                <div class="empty-state" id="emptyState" style="display:none">
                    <strong>Properti tidak ditemukan</strong>
                    Coba ubah kata pencarian atau filter yang digunakan.
                </div>
            @endif
        </section>
    </main>
</div>


<!-- MODAL EDIT PROPERTI -->
<div class="property-modal" id="editPropertyModal">
    <div class="property-modal-content">
        <div class="modal-heading">
            <div>
                <h2>Edit Properti</h2>
                <p>Perbarui informasi properti.</p>
            </div>
            <button type="button" class="modal-close"
                    onclick="closeEditModal()">&times;</button>
        </div>

        <form id="editPropertyForm" method="POST"
              enctype="multipart/form-data"
              data-update-url="{{ route('properties.update', ['property' => '__PROPERTY__']) }}">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group full">
                    <label for="edit_name">Nama Properti</label>
                    <input id="edit_name" name="name" type="text" required>
                </div>

                <div class="form-group full">
                    <label for="edit_address">Alamat Lengkap</label>
                    <input id="edit_address" name="address" type="text" required>
                </div>

                <div class="form-group">
                    <label for="edit_location">Kota / Lokasi</label>
                    <input id="edit_location" name="location" type="text" required>
                </div>

                <div class="form-group">
                    <label for="edit_status">Status</label>
                    <select id="edit_status" name="status" required>
                        <option value="aktif">Aktif</option>
                        <option value="maintenance">Maintenance</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edit_total_rooms">Total Kamar</label>
                    <input id="edit_total_rooms" name="total_rooms"
                           type="number" min="0" required>
                </div>

                <div class="form-group">
                    <label for="edit_occupied_rooms">Kamar Terisi</label>
                    <input id="edit_occupied_rooms" name="occupied_rooms"
                           type="number" min="0" required>
                </div>

                <div class="form-group full">
                    <label for="edit_image">Ganti Foto (opsional)</label>
                    <input id="edit_image" name="image" type="file"
                           accept="image/jpeg,image/png,image/webp">
                    <small>Kosongkan jika ingin memakai foto lama.</small>
                </div>
            </div>

            <div class="modal-actions">
                <button type="button" class="cancel-button"
                        onclick="closeEditModal()">Batal</button>
                <button type="submit" class="primary-button">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>


<!-- MODAL DETAIL PROPERTI -->
<div class="property-modal" id="detailPropertyModal">
    <div class="property-modal-content detail-modal-content">
        <div class="modal-heading">
            <div>
                <h2>Detail Properti</h2>
                <p>Informasi lengkap properti yang dipilih.</p>
            </div>
            <button type="button" class="modal-close"
                    onclick="closeDetailModal()">&times;</button>
        </div>

        <div class="detail-property-image">
            <img id="detailImage" src="" alt="Foto properti"
                 style="display:none; width:100%; height:100%; object-fit:cover;">
            <div id="detailImagePlaceholder">
                Foto properti belum tersedia
            </div>
        </div>

        <div class="detail-property-title">
            <div>
                <h3 id="detailName">-</h3>
                <p id="detailLocation">-</p>
            </div>
            <span id="detailStatus" class="status status-active">Aktif</span>
        </div>

        <div class="detail-information">
            <div class="detail-information-item">
                <span>Alamat Lengkap</span>
                <strong id="detailAddress">-</strong>
            </div>
            <div class="detail-information-item">
                <span>Total Kamar</span>
                <strong id="detailTotalRooms">0 kamar</strong>
            </div>
            <div class="detail-information-item">
                <span>Kamar Terisi</span>
                <strong id="detailOccupiedRooms">0 kamar</strong>
            </div>
            <div class="detail-information-item">
                <span>Kamar Kosong</span>
                <strong id="detailVacantRooms">0 kamar</strong>
            </div>
        </div>

        <div class="detail-occupancy">
            <div class="detail-occupancy-heading">
                <strong>Tingkat Okupansi</strong>
                <strong id="detailOccupancyValue">0%</strong>
            </div>
            <div class="progress">
                <div class="progress-fill" id="detailOccupancyBar"
                     style="width:0%"></div>
            </div>
        </div>

        <div class="modal-actions">
            <button type="button" class="cancel-button"
                    onclick="closeDetailModal()">Tutup</button>
        </div>
    </div>
</div>


<nav class="bottom-nav">
    <a href="{{ route('dashboard.pemilik') }}" class="active">
        <span>⌂</span>Properti
    </a>
    <a href="#daftar-properti"><span>▣</span>Kamar</a>
    <a href="#daftar-properti"><span>♙</span>Penyewa</a>
    <a href="#daftar-properti"><span>▤</span>Tagihan</a>
    <a href="#daftar-properti"><span>⠿</span>Lainnya</a>
</nav>

<script>
    
function openEditModal(button) {
    const form = document.getElementById('editPropertyForm');
    const modal = document.getElementById('editPropertyModal');

    if (!form || !modal) {
        alert('Form Edit belum ditemukan. Periksa apakah modal Edit sudah ditambahkan.');
        return;
    }

    form.action = form.dataset.updateUrl.replace(
        '__PROPERTY__',
        encodeURIComponent(button.dataset.id)
    );

    document.getElementById('edit_name').value = button.dataset.name;
    document.getElementById('edit_address').value = button.dataset.address;
    document.getElementById('edit_location').value = button.dataset.location;
    document.getElementById('edit_total_rooms').value = button.dataset.totalRooms;
    document.getElementById('edit_occupied_rooms').value = button.dataset.occupiedRooms;
    document.getElementById('edit_status').value = button.dataset.status;
    document.getElementById('edit_image').value = '';

    modal.style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editPropertyModal').style.display = 'none';
}

    const propertySearch = document.getElementById('propertySearch');
    const globalSearch = document.getElementById('globalSearch');
    const locationFilter = document.getElementById('locationFilter');
    const statusFilter = document.getElementById('statusFilter');
    const propertyCards = [...document.querySelectorAll('.property-card')];
    const resultCount = document.getElementById('resultCount');
    const emptyState = document.getElementById('emptyState');

    function filterProperties() {
        const query = (
            propertySearch.value + ' ' + globalSearch.value
        ).trim().toLowerCase();

        const location = locationFilter.value;
        const status = statusFilter.value;
        let visible = 0;

        propertyCards.forEach(card => {
            const matchesText =
                !query ||
                card.dataset.name.includes(query) ||
                card.textContent.toLowerCase().includes(query);

            const matchesLocation =
                !location || card.dataset.location === location;

            const matchesStatus =
                !status || card.dataset.status === status;

            const show = matchesText && matchesLocation && matchesStatus;

            card.style.display = show ? '' : 'none';

            if (show) visible++;
        });

        resultCount.textContent = visible + ' properti';

        if (emptyState) {
            emptyState.style.display =
                propertyCards.length > 0 && visible === 0
                    ? 'block'
                    : (propertyCards.length === 0 ? 'block' : 'none');
        }
    }

    propertySearch.addEventListener('input', () => {
        globalSearch.value = '';
        filterProperties();
    });

    globalSearch.addEventListener('input', () => {
        propertySearch.value = '';
        filterProperties();
    });

    locationFilter.addEventListener('change', filterProperties);
    statusFilter.addEventListener('change', filterProperties);
    
function openDetailModal(button) {
    const modal = document.getElementById('detailPropertyModal');

    if (!modal) {
        alert('Modal Detail belum ditambahkan.');
        return;
    }

    const name = button.dataset.name || '-';
    const address = button.dataset.address || '-';
    const location = button.dataset.location || '-';
    const totalRooms = Number(button.dataset.totalRooms || 0);
    const occupiedRooms = Number(button.dataset.occupiedRooms || 0);
    const status = button.dataset.status || 'aktif';
    const imageUrl = button.dataset.image || '';

    const vacantRooms = Math.max(0, totalRooms - occupiedRooms);
    const occupancy = totalRooms > 0
        ? Math.round((occupiedRooms / totalRooms) * 100)
        : 0;

    document.getElementById('detailName').textContent = name;
    document.getElementById('detailAddress').textContent = address;
    document.getElementById('detailLocation').textContent = location;
    document.getElementById('detailTotalRooms').textContent = totalRooms + ' kamar';
    document.getElementById('detailOccupiedRooms').textContent = occupiedRooms + ' kamar';
    document.getElementById('detailVacantRooms').textContent = vacantRooms + ' kamar';
    document.getElementById('detailOccupancyValue').textContent = occupancy + '%';
    document.getElementById('detailOccupancyBar').style.width = occupancy + '%';

    const statusElement = document.getElementById('detailStatus');
    const labels = {
        aktif: 'Aktif',
        maintenance: 'Maintenance',
        nonaktif: 'Nonaktif'
    };

    statusElement.textContent = labels[status] || status;
    statusElement.className = 'status ' + (
        status === 'aktif' ? 'status-active' :
        status === 'maintenance' ? 'status-maintenance' :
        'status-inactive'
    );

    const image = document.getElementById('detailImage');
    const placeholder = document.getElementById('detailImagePlaceholder');

    image.onerror = function () {
        image.style.display = 'none';
        placeholder.style.display = 'block';
    };

    if (imageUrl) {
        image.src = imageUrl;
        image.alt = 'Foto ' + name;
        image.style.display = 'block';
        placeholder.style.display = 'none';
    } else {
        image.removeAttribute('src');
        image.style.display = 'none';
        placeholder.style.display = 'block';
    }

    modal.style.display = 'flex';
}

function closeDetailModal() {
    document.getElementById('detailPropertyModal').style.display = 'none';
}

</script>
</body>
</html>
