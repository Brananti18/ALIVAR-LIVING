<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reimbursement Pemilik | ALIVARE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --navy: #0f172a;
            --navy-soft: #1e293b;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --primary-border: #bfdbfe;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-800: #1e293b;
            --success: #059669;
            --success-hover: #047857;
            --success-bg: #ecfdf5;
            --success-border: #a7f3d0;
            --warning: #b45309;
            --warning-bg: #fffbeb;
            --warning-border: #fde68a;
            --danger: #ef4444;
            --danger-bg: #fef2f2;
            --danger-border: #fecaca;
            --radius-sm: 6px;
            --radius-lg: 12px;
            --radius-xl: 14px;
            --shadow-xs: 0 1px 2px rgba(15, 23, 42, 0.04);
            --shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.05), 0 1px 2px rgba(15, 23, 42, 0.03);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--navy);
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input, select, textarea {
            font: inherit;
        }

        /* =========================================================
           1. TOPBAR & SIDEBAR (IDENTIK DENGAN HALAMAN KAMAR KOST)
           ========================================================= */

.topbar {
    min-height: 70px;
    height: 70px;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 32px;
    background: var(--card-bg);
    border-bottom: 1px solid var(--slate-200);
    position: sticky;
    top: 0;
    z-index: 30;
}

.topbar-left {
    display: flex;
    align-items: center;
    height: 100%;
}

.brand {
    width: 170px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    text-decoration: none;
    flex-shrink: 0;
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

.sidebar {
    width: 220px;
    padding: 24px 16px;
    background: var(--card-bg);
    border-right: 1px solid var(--slate-200);
    flex-shrink: 0;
}

.main {
    flex: 1;
    min-width: 0;
    max-width: 1280px;
    margin: 0 auto;
    padding: 32px;
}


        /* =========================================================
           2. COMPACT PAGE HEADER
           ========================================================= */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .page-title-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 4px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--navy);
        }

        .count-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 600;
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
        }

        .count-chip.action-needed {
            background: var(--warning-bg);
            color: var(--warning);
            border-color: var(--warning-border);
        }

        .subtitle {
            margin: 0;
            color: var(--slate-500);
            font-size: 13.5px;
        }

        .date-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            background: var(--card-bg);
            border: 1px solid var(--slate-200);
            border-radius: 9px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--slate-600);
            box-shadow: var(--shadow-xs);
            white-space: nowrap;
        }

        .date-badge svg {
            width: 15px;
            height: 15px;
            color: var(--primary);
        }

        /* =========================================================
           3. FLASH ALERTS
           ========================================================= */
        .alert {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13.5px;
            line-height: 1.5;
        }

        .alert-body {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .alert-body svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .alert-success {
            background: var(--success-bg);
            color: #065f46;
            border: 1px solid var(--success-border);
        }

        .alert-error {
            background: var(--danger-bg);
            color: #991b1b;
            border: 1px solid var(--danger-border);
        }

        .alert-close {
            background: transparent;
            border: 0;
            color: inherit;
            opacity: 0.65;
            cursor: pointer;
            font-size: 18px;
            line-height: 1;
            padding: 0 4px;
        }

        .alert-close:hover {
            opacity: 1;
        }

        /* =========================================================
           4. SUMMARY STAT CARDS (5 CARDS)
           ========================================================= */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            padding: 16px 18px;
            box-shadow: var(--shadow-xs);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .stat-card:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 12px;
        }

        .stat-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--slate-500);
        }

        .stat-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .stat-icon svg {
            width: 17px;
            height: 17px;
        }

        .stat-icon.slate {
            background: var(--slate-100);
            color: var(--navy-soft);
            border: 1px solid var(--slate-200);
        }

        .stat-icon.amber {
            background: var(--warning-bg);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .stat-icon.green {
            background: var(--success-bg);
            color: var(--success);
            border: 1px solid var(--success-border);
        }

        .stat-icon.blue {
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--navy);
            letter-spacing: -0.02em;
            font-variant-numeric: tabular-nums;
        }

        .stat-sub {
            margin-top: 6px;
            font-size: 11.5px;
            color: var(--slate-500);
        }

        /* =========================================================
           5. MAIN TABLE PANEL & FILTER BAR
           ========================================================= */
        .panel {
            background: var(--card-bg);
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xs);
            overflow: hidden;
        }

        .panel-header {
            padding: 18px 22px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .panel-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--navy);
            margin: 0;
        }

        .panel-meta {
            font-size: 12.5px;
            font-weight: 500;
            color: var(--slate-500);
        }

        .toolbar {
            padding: 0 22px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            min-width: 240px;
        }

        .search-wrap svg {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            color: var(--slate-500);
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            height: 40px;
            padding: 0 14px 0 38px;
            border: 1px solid var(--slate-200);
            border-radius: 9px;
            background: var(--card-bg);
            color: var(--navy);
            font-size: 13px;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .filter-select {
            height: 40px;
            min-width: 185px;
            padding: 0 34px 0 13px;
            border: 1px solid var(--slate-200);
            border-radius: 9px;
            background-color: var(--card-bg);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 11px center;
            appearance: none;
            color: var(--navy);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .table-wrap {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1120px;
        }

        th {
            padding: 13px 18px;
            background: var(--bg);
            border-top: 1px solid var(--slate-200);
            border-bottom: 1px solid var(--slate-200);
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--slate-500);
            white-space: nowrap;
        }

        td {
            padding: 16px 18px;
            border-bottom: 1px solid var(--slate-200);
            text-align: left;
            vertical-align: middle;
            font-size: 13px;
            color: var(--navy);
        }

        tbody tr {
            transition: background-color 0.12s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .date-main {
            font-weight: 600;
            color: var(--navy);
            white-space: nowrap;
        }

        .date-sub {
            display: block;
            margin-top: 3px;
            font-size: 11.5px;
            color: var(--slate-500);
            white-space: nowrap;
        }

        .category-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 7px;
            background: var(--slate-100);
            color: var(--slate-800);
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .desc-wrapper {
            max-width: 260px;
        }

        .desc-text {
            color: var(--slate-600);
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .detail-btn-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 4px;
            padding: 0;
            border: 0;
            background: transparent;
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .detail-btn-link:hover {
            text-decoration: underline;
        }

        .rejection-hint {
            margin-top: 5px;
            padding: 5px 8px;
            border-radius: 6px;
            background: var(--danger-bg);
            border: 1px solid var(--danger-border);
            color: #991b1b;
            font-size: 11.5px;
            line-height: 1.4;
        }

        .amount-text {
            font-weight: 700;
            color: var(--navy);
            white-space: nowrap;
            font-variant-numeric: tabular-nums;
            font-size: 13.5px;
        }

        .receipt-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 11px;
            border-radius: 8px;
            border: 1px solid var(--primary-border);
            background: var(--primary-light);
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.15s ease;
        }

        .receipt-btn:hover {
            background: #dbeafe;
        }

        .receipt-btn svg {
            width: 14px;
            height: 14px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 10px;
            border-radius: 99px;
            font-size: 11.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .badge-pending {
            background: var(--warning-bg);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .badge-approved {
            background: var(--success-bg);
            color: var(--success);
            border: 1px solid var(--success-border);
        }

        .badge-rejected {
            background: var(--danger-bg);
            color: #dc2626;
            border: 1px solid var(--danger-border);
        }

        .badge-unpaid {
            background: var(--slate-100);
            color: var(--slate-600);
            border: 1px solid var(--slate-200);
        }

        .badge-paid {
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
        }

        .badge-incomplete {
            background: var(--warning-bg);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .badge-complete {
            background: var(--success-bg);
            color: var(--success);
            border: 1px solid var(--success-border);
        }

        .action-cell {
            white-space: nowrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 13px;
            border-radius: 8px;
            border: 1px solid transparent;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn svg {
            width: 14px;
            height: 14px;
        }

        .btn-pay {
            background: var(--success);
            color: #ffffff;
            box-shadow: 0 1px 2px rgba(5, 150, 105, 0.2);
        }

        .btn-pay:hover {
            background: var(--success-hover);
        }

        .btn-primary {
            background: var(--primary);
            color: #ffffff;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-secondary {
            background: var(--card-bg);
            color: var(--slate-800);
            border-color: var(--slate-300);
        }

        .btn-secondary:hover {
            background: var(--bg);
        }

        .action-note {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 500;
            color: var(--slate-500);
        }

        .action-note.paid-done {
            color: var(--success);
            font-weight: 600;
        }

        .empty-box {
            text-align: center;
            padding: 54px 24px;
        }

        .empty-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: var(--primary-light);
            border: 1px solid var(--primary-border);
            color: var(--primary);
            display: grid;
            place-items: center;
            margin: 0 auto 14px;
        }

        .empty-icon svg {
            width: 24px;
            height: 24px;
        }

        .empty-title {
            margin: 0 0 6px;
            font-size: 15.5px;
            font-weight: 700;
            color: var(--navy);
        }

        .empty-desc {
            margin: 0 auto;
            max-width: 420px;
            font-size: 13px;
            color: var(--slate-500);
            line-height: 1.5;
        }

        /* =========================================================
           6. MODALS (LIGHTBOX BUKTI, DETAIL, KONFIRMASI BAYAR)
           ========================================================= */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(3px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }

        .modal-overlay.show {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .modal-card {
            background: var(--card-bg);
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-xl);
            width: 100%;
            max-width: 460px;
            box-shadow: 0 20px 40px -12px rgba(15, 23, 42, 0.25);
            overflow: hidden;
            transform: translateY(10px) scale(0.96);
            transition: transform 0.22s ease;
        }

        .modal-overlay.show .modal-card {
            transform: translateY(0) scale(1);
        }

        .modal-card.modal-lg {
            max-width: 680px;
        }

        .modal-head {
            padding: 16px 20px;
            border-bottom: 1px solid var(--slate-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .modal-head h3 {
            margin: 0;
            font-size: 15.5px;
            font-weight: 700;
            color: var(--navy);
        }

        .modal-close {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            border: 1px solid var(--slate-200);
            background: var(--card-bg);
            color: var(--slate-500);
            display: grid;
            place-items: center;
            cursor: pointer;
            font-size: 18px;
            line-height: 1;
        }

        .modal-close:hover {
            background: var(--bg);
            color: var(--navy);
        }

        .modal-body {
            padding: 20px;
        }

        .summary-box {
            background: var(--bg);
            border: 1px solid var(--slate-200);
            border-radius: 10px;
            padding: 14px 16px;
            display: grid;
            gap: 9px;
            font-size: 13px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .summary-row span {
            color: var(--slate-500);
        }

        .summary-row strong {
            color: var(--navy);
            text-align: right;
        }

        .modal-foot {
            padding: 14px 20px;
            background: var(--bg);
            border-top: 1px solid var(--slate-200);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .lightbox-frame {
            background: var(--navy);
            border-radius: 10px;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 260px;
            max-height: 65vh;
            overflow: auto;
        }

        .lightbox-frame img {
            max-width: 100%;
            max-height: 60vh;
            border-radius: 6px;
            object-fit: contain;
            cursor: zoom-in;
            transition: transform 0.2s ease;
        }

        .lightbox-frame img.zoomed {
            transform: scale(1.45);
            cursor: zoom-out;
        }

        /* =========================================================
           7. RESPONSIVE
           ========================================================= */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

      .mobile-menu-btn {
    display: none;
}

@media (max-width: 768px) {
    .topbar {
        padding-right: 16px;
    }

    .mobile-menu-btn {
        display: inline-flex;
    }

            .brand {
                width: auto;
                padding-left: 12px;
            }

            .sidebar {
                position: fixed;
                top: 70px;
                left: 0;
                bottom: 0;
                z-index: 40;
                transform: translateX(-100%);
                transition: transform 0.22s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-backdrop.show {
                display: block;
            }

            .main {
                padding: 20px 16px 32px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
@php
    $totalCount      = $reimbursements->count();
    $pendingCount    = $reimbursements->where('approval_status', 'Menunggu')->count();
    $approvedCount   = $reimbursements->where('approval_status', 'Disetujui')->count();
    $paidCount       = $reimbursements->where('payment_status', 'Sudah Dibayar')->count();
    $completedCount  = $reimbursements->where('completion_status', 'Selesai')->count();
    $readyToPayCount = $reimbursements->where('approval_status', 'Disetujui')
                                      ->where('payment_status', 'Belum Dibayar')
                                      ->count();
@endphp

<!-- TOPBAR (KONSISTEN DENGAN KAMAR KOST) -->
<header class="topbar">
    <div class="topbar-left">
        <button type="button" class="mobile-menu-btn" id="mobileSidebarToggle" aria-label="Buka Menu">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="6" x2="21" y2="6"/>
                <line x1="3" y1="12" x2="21" y2="12"/>
                <line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </button>

        <a href="{{ route('dashboard.pemilik') }}" class="brand">
            <img src="{{ asset('images/alivare-logo.png') }}" alt="ALIVARE">
        </a>
    </div>

    @include('components.topbar-actions')
</header>

<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<div class="layout">
    <!-- SIDEBAR PEMILIK (KONSISTEN DENGAN KAMAR KOST) -->
    <aside class="sidebar" id="ownerSidebar">
        @include('components.sidebar-menu')
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="main">
        <!-- HEADER HALAMAN -->
        <div class="page-header">
            <div>
                <div class="page-title-row">
                    <h1>Reimbursement</h1>
                    <span class="count-chip">{{ $totalCount }} pengajuan</span>
                    @if($readyToPayCount > 0)
                        <span class="count-chip action-needed">{{ $readyToPayCount }} siap dibayar</span>
                    @endif
                </div>
                <p class="subtitle">Periksa pengajuan operasional, verifikasi bukti transaksi, dan perbarui status pembayaran reimbursement.</p>
            </div>

            <div class="date-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                <span>{{ now()->translatedFormat('d F Y') }}</span>
            </div>
        </div>

        <!-- ALERTS -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <div class="alert-body">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    <div>{{ session('success') }}</div>
                </div>
                <button type="button" class="alert-close" onclick="this.parentElement.remove()" aria-label="Tutup">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error" role="alert">
                <div class="alert-body">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <div>{{ session('error') }}</div>
                </div>
                <button type="button" class="alert-close" onclick="this.parentElement.remove()" aria-label="Tutup">&times;</button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error" role="alert">
                <div class="alert-body">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
                <button type="button" class="alert-close" onclick="this.parentElement.remove()" aria-label="Tutup">&times;</button>
            </div>
        @endif

        <!-- RINGKASAN STATISTIK -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Total Pengajuan</span>
                    <div class="stat-icon slate" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($totalCount, 0, ',', '.') }}</div>
                <div class="stat-sub">Seluruh klaim tercatat</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Menunggu Persetujuan</span>
                    <div class="stat-icon amber" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($pendingCount, 0, ',', '.') }}</div>
                <div class="stat-sub">Menunggu ACC Admin</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Disetujui</span>
                    <div class="stat-icon green" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($approvedCount, 0, ',', '.') }}</div>
                <div class="stat-sub">Terverifikasi Admin</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Sudah Dibayar</span>
                    <div class="stat-icon blue" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="6" width="20" height="12" rx="2"/>
                            <circle cx="12" cy="12" r="2"/>
                            <path d="M6 12h.01M18 12h.01"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($paidCount, 0, ',', '.') }}</div>
                <div class="stat-sub">Dana telah ditransfer</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Selesai</span>
                    <div class="stat-icon green" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($completedCount, 0, ',', '.') }}</div>
                <div class="stat-sub">Dikonfirmasi diterima</div>
            </div>
        </div>

        <!-- TABEL REIMBURSEMENT -->
        <section class="panel">
            <div class="panel-header">
                <h2 class="panel-title">Daftar Pengajuan Reimbursement</h2>
                <span class="panel-meta" id="visibleRowCount">{{ $totalCount }} pengajuan</span>
            </div>

            @if($totalCount > 0)
                <div class="toolbar">
                    <div class="search-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <input type="text" id="reimbursementSearch" class="search-input" placeholder="Cari kategori, keterangan, pengaju, atau nominal...">
                    </div>

                    <select id="reimbursementFilter" class="filter-select" aria-label="Filter Status Reimbursement">
                        <option value="ALL">Semua Status</option>
                        <option value="READY_TO_PAY">Siap Dibayar ({{ $readyToPayCount }})</option>
                        <option value="Menunggu">Menunggu Persetujuan</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Sudah Dibayar">Sudah Dibayar</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
            @endif

            <div class="table-wrap">
                <table id="ownerReimbursementTable">
                    <thead>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Bukti</th>
                            <th>Status Persetujuan</th>
                            <th>Status Pembayaran</th>
                            <th>Status Penyelesaian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($reimbursements as $item)
                        @php
                            $dateText = $item->created_at->format('d/m/Y');
                            $timeText = $item->created_at->format('H:i');
                            $requesterName = $item->admin->name ?? '-';
                            $payerName = $item->payer->name ?? '-';
                            $paidAtText = $item->paid_at ? $item->paid_at->format('d/m/Y H:i') . ' WIB' : '-';
                            $completedAtText = $item->completed_at ? $item->completed_at->format('d/m/Y H:i') . ' WIB' : '-';
                            $nominalFormatted = 'Rp ' . number_format((float)$item->amount, 0, ',', '.');
                            $receiptUrl = asset('storage/' . $item->receipt_path);

                            $approvalClass = match($item->approval_status) {
                                'Disetujui' => 'badge-approved',
                                'Ditolak'   => 'badge-rejected',
                                default     => 'badge-pending',
                            };

                            $paymentClass = $item->payment_status === 'Sudah Dibayar'
                                ? 'badge-paid'
                                : 'badge-unpaid';

                            $completionStatus = $item->completion_status ?? 'Belum Selesai';
                            $completionClass = $completionStatus === 'Selesai'
                                ? 'badge-complete'
                                : 'badge-incomplete';

                            $isReadyToPay = ($item->approval_status === 'Disetujui' && $item->payment_status === 'Belum Dibayar');
                        @endphp
                        <tr
                            data-search="{{ strtolower($dateText . ' ' . $requesterName . ' ' . $item->category . ' ' . $item->description . ' ' . $nominalFormatted) }}"
                            data-approval="{{ $item->approval_status }}"
                            data-payment="{{ $item->payment_status }}"
                            data-completion="{{ $completionStatus }}"
                            data-ready="{{ $isReadyToPay ? '1' : '0' }}"
                        >
                            <td>
                                <span class="date-main">{{ $dateText }}</span>
                                <span class="date-sub">{{ $timeText }} WIB &bull; {{ $requesterName }}</span>
                            </td>

                            <td>
                                <span class="category-badge">{{ $item->category }}</span>
                            </td>

                            <td>
                                <div class="desc-wrapper">
                                    <div class="desc-text">{{ $item->description }}</div>
                                    <button
                                        type="button"
                                        class="detail-btn-link"
                                        data-date="{{ $dateText }} {{ $timeText }} WIB"
                                        data-requester="{{ $requesterName }}"
                                        data-category="{{ $item->category }}"
                                        data-amount="{{ $nominalFormatted }}"
                                        data-description="{{ $item->description }}"
                                        data-approval="{{ $item->approval_status }}"
                                        data-payment="{{ $item->payment_status }}"
                                        data-payer="{{ $payerName }}"
                                        data-paid-at="{{ $paidAtText }}"
                                        data-completion="{{ $completionStatus }}"
                                        data-completed-at="{{ $completedAtText }}"
                                        data-rejection="{{ $item->rejection_reason ?? '' }}"
                                        data-receipt="{{ $receiptUrl }}"
                                        onclick="openDetailModal(this)"
                                    >
                                        Lihat detail
                                    </button>
                                    @if($item->rejection_reason)
                                        <div class="rejection-hint">
                                            <strong>Alasan ditolak:</strong> {{ $item->rejection_reason }}
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td class="amount-text">{{ $nominalFormatted }}</td>

                            <td>
                                <button
                                    type="button"
                                    class="receipt-btn"
                                    onclick="openReceiptModal('{{ $receiptUrl }}', '{{ e($item->category) }} — {{ $nominalFormatted }}')"
                                >
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                        <circle cx="8.5" cy="8.5" r="1.5"/>
                                        <polyline points="21 15 16 10 5 21"/>
                                    </svg>
                                    <span>Lihat Bukti</span>
                                </button>
                            </td>

                            <td>
                                <span class="badge {{ $approvalClass }}">
                                    <span class="badge-dot"></span>
                                    <span>{{ $item->approval_status }}</span>
                                </span>
                            </td>

                            <td>
                                <span class="badge {{ $paymentClass }}">
                                    <span class="badge-dot"></span>
                                    <span>{{ $item->payment_status }}</span>
                                </span>
                            </td>

                            <td>
                                <span class="badge {{ $completionClass }}">
                                    <span class="badge-dot"></span>
                                    <span>{{ $completionStatus }}</span>
                                </span>
                            </td>

                            <td class="action-cell">
                                @if($isReadyToPay)
                                    <button
                                        type="button"
                                        class="btn btn-pay"
                                        onclick="openPayConfirmModal('{{ route('owner.reimbursements.paid', $item) }}', '{{ e($requesterName) }}', '{{ e($item->category) }}', '{{ $nominalFormatted }}', '{{ e($item->description) }}')"
                                    >
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"/>
                                        </svg>
                                        <span>Sudah Dibayar</span>
                                    </button>
                                @elseif($item->approval_status === 'Menunggu')
                                    <span class="action-note">Menunggu ACC Admin</span>
                                @elseif($item->approval_status === 'Ditolak')
                                    <span class="action-note">Pengajuan Ditolak</span>
                                @else
                                    <span class="action-note paid-done">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"/>
                                        </svg>
                                        <span>Terbayar{{ $item->paid_at ? ' (' . $item->paid_at->format('d/m') . ')' : '' }}</span>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="empty-box">
                                    <div class="empty-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="2" y="5" width="20" height="14" rx="2"/>
                                            <line x1="2" y1="10" x2="22" y2="10"/>
                                        </svg>
                                    </div>
                                    <h3 class="empty-title">Belum Ada Pengajuan Reimbursement</h3>
                                    <p class="empty-desc">Pengajuan reimbursement yang dibuat oleh Admin akan tampil di halaman ini untuk diperiksa dan dikonfirmasi pembayarannya.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<!-- MODAL 1: LIGHTBOX BUKTI TRANSAKSI -->
<div class="modal-overlay" id="receiptLightboxModal" aria-hidden="true">
    <div class="modal-card modal-lg" role="dialog" aria-modal="true" aria-labelledby="receiptModalTitle">
        <div class="modal-head">
            <h3 id="receiptModalTitle">Bukti Transaksi</h3>
            <button type="button" class="modal-close" onclick="closeModal('receiptLightboxModal')" aria-label="Tutup">&times;</button>
        </div>
        <div class="modal-body">
            <div class="lightbox-frame">
                <img id="lightboxImage" src="" alt="Bukti Transaksi" onclick="this.classList.toggle('zoomed')" title="Klik untuk memperbesar/memperkecil">
            </div>
        </div>
        <div class="modal-foot">
            <button type="button" class="btn btn-secondary" onclick="document.getElementById('lightboxImage').classList.toggle('zoomed')">Zoom Gambar</button>
            <a id="lightboxNewTabLink" href="#" target="_blank" rel="noopener" class="btn btn-primary">Buka di Tab Baru</a>
        </div>
    </div>
</div>

<!-- MODAL 2: DETAIL PENGAJUAN REIMBURSEMENT -->
<div class="modal-overlay" id="detailModal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="detailModalTitle">
        <div class="modal-head">
            <h3 id="detailModalTitle">Detail Pengajuan Reimbursement</h3>
            <button type="button" class="modal-close" onclick="closeModal('detailModal')" aria-label="Tutup">&times;</button>
        </div>
        <div class="modal-body">
            <div class="summary-box" style="margin-bottom: 14px;">
                <div class="summary-row"><span>Tanggal Pengajuan</span><strong id="detailDate">-</strong></div>
                <div class="summary-row"><span>Pengaju (Admin)</span><strong id="detailRequester">-</strong></div>
                <div class="summary-row"><span>Kategori</span><strong id="detailCategory">-</strong></div>
                <div class="summary-row"><span>Nominal</span><strong id="detailAmount">-</strong></div>
                <div class="summary-row"><span>Status Persetujuan</span><strong id="detailApproval">-</strong></div>
                <div class="summary-row"><span>Status Pembayaran</span><strong id="detailPayment">-</strong></div>
                <div class="summary-row" id="detailPaidInfoRow" style="display: none;"><span>Dibayar Oleh / Waktu</span><strong id="detailPaidInfo">-</strong></div>
                <div class="summary-row"><span>Status Penyelesaian</span><strong id="detailCompletion">-</strong></div>
            </div>

            <div style="margin-bottom: 10px;">
                <div style="font-size: 12px; font-weight: 600; color: var(--slate-500); margin-bottom: 6px;">Keterangan Pengeluaran</div>
                <div id="detailDescription" style="padding: 11px 13px; background: var(--bg); border: 1px solid var(--slate-200); border-radius: 8px; font-size: 13px; color: var(--slate-800); line-height: 1.5; white-space: pre-line;">-</div>
            </div>

            <div class="rejection-hint" id="detailRejectionBox" style="display: none;">
                <strong>Alasan Ditolak:</strong> <span id="detailRejectionText"></span>
            </div>
        </div>
        <div class="modal-foot">
            <button type="button" class="btn btn-secondary" onclick="closeModal('detailModal')">Tutup</button>
            <button type="button" class="btn btn-primary" id="detailReceiptBtn">Lihat Bukti Transaksi</button>
        </div>
    </div>
</div>

<!-- MODAL 3: KONFIRMASI PEMBAYARAN PEMILIK -->
<div class="modal-overlay" id="payConfirmModal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="payModalTitle">
        <div class="modal-head">
            <h3 id="payModalTitle">Konfirmasi Pembayaran Reimbursement</h3>
            <button type="button" class="modal-close" onclick="closeModal('payConfirmModal')" aria-label="Tutup">&times;</button>
        </div>
        <form method="POST" action="" id="payConfirmForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <p style="margin: 0 0 14px; font-size: 13.5px; color: var(--slate-600); line-height: 1.5;">
                    Pastikan dana penggantian telah ditransfer sesuai nominal berikut sebelum menandai pengajuan ini sebagai <strong>Sudah Dibayar</strong>.
                </p>

                <div class="summary-box">
                    <div class="summary-row"><span>Pengaju</span><strong id="payRequester">-</strong></div>
                    <div class="summary-row"><span>Kategori</span><strong id="payCategory">-</strong></div>
                    <div class="summary-row"><span>Nominal Transfer</span><strong id="payAmount" style="color: var(--success); font-size: 14.5px;">-</strong></div>
                    <div class="summary-row"><span>Keterangan</span><strong id="payDescription" style="max-width: 240px;">-</strong></div>
                </div>
            </div>
            <div class="modal-foot">
                <button type="button" class="btn btn-secondary" onclick="closeModal('payConfirmModal')">Batal</button>
                <button type="submit" class="btn btn-pay">Ya, Tandai Sudah Dibayar</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mobile Sidebar Drawer
        const sidebar = document.getElementById('ownerSidebar');
        const backdrop = document.getElementById('sidebarBackdrop');
        const mobileToggle = document.getElementById('mobileSidebarToggle');
        if (mobileToggle && sidebar && backdrop) {
            mobileToggle.addEventListener('click', function () {
                sidebar.classList.toggle('open');
                backdrop.classList.toggle('show');
            });
            backdrop.addEventListener('click', function () {
                sidebar.classList.remove('open');
                backdrop.classList.remove('show');
            });
        }

        // Pencarian & Filter Tabel Client-Side
        const searchInput = document.getElementById('reimbursementSearch');
        const filterSelect = document.getElementById('reimbursementFilter');
        const tableBody = document.querySelector('#ownerReimbursementTable tbody');
        const visibleCounter = document.getElementById('visibleRowCount');

        function applyTableFilter() {
            if (!tableBody) return;
            const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
            const status = filterSelect ? filterSelect.value : 'ALL';
            const rows = tableBody.querySelectorAll('tr[data-search]');
            let visible = 0;

            rows.forEach(function (row) {
                const matchSearch = !query || row.dataset.search.includes(query);
                let matchStatus = true;

                if (status === 'READY_TO_PAY') {
                    matchStatus = row.dataset.ready === '1';
                } else if (status === 'Sudah Dibayar') {
                    matchStatus = row.dataset.payment === 'Sudah Dibayar';
                } else if (status === 'Selesai') {
                    matchStatus = row.dataset.completion === 'Selesai';
                } else if (status !== 'ALL') {
                    matchStatus = row.dataset.approval === status;
                }

                const showRow = matchSearch && matchStatus;
                row.style.display = showRow ? '' : 'none';
                if (showRow) visible++;
            });

            if (visibleCounter) {
                visibleCounter.textContent = visible + ' pengajuan';
            }
        }

        if (searchInput) searchInput.addEventListener('input', applyTableFilter);
        if (filterSelect) filterSelect.addEventListener('change', applyTableFilter);
    });

    function openModal(id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.classList.add('show');
        el.setAttribute('aria-hidden', 'false');
    }

    function closeModal(id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.classList.remove('show');
        el.setAttribute('aria-hidden', 'true');
    }

    function openReceiptModal(url, title) {
        const img = document.getElementById('lightboxImage');
        const heading = document.getElementById('receiptModalTitle');
        const newTab = document.getElementById('lightboxNewTabLink');
        if (!img) return;
        img.classList.remove('zoomed');
        img.src = url;
        if (heading) heading.textContent = title || 'Bukti Transaksi';
        if (newTab) newTab.href = url;
        openModal('receiptLightboxModal');
    }

    function openDetailModal(btn) {
        document.getElementById('detailDate').textContent = btn.dataset.date || '-';
        document.getElementById('detailRequester').textContent = btn.dataset.requester || '-';
        document.getElementById('detailCategory').textContent = btn.dataset.category || '-';
        document.getElementById('detailAmount').textContent = btn.dataset.amount || '-';
        document.getElementById('detailApproval').textContent = btn.dataset.approval || '-';
        document.getElementById('detailPayment').textContent = btn.dataset.payment || '-';
        document.getElementById('detailCompletion').textContent = btn.dataset.completion || '-';
        document.getElementById('detailDescription').textContent = btn.dataset.description || '-';

        const paidRow = document.getElementById('detailPaidInfoRow');
        const paidInfo = document.getElementById('detailPaidInfo');
        if (btn.dataset.payment === 'Sudah Dibayar' && btn.dataset.paidAt !== '-') {
            paidInfo.textContent = btn.dataset.payer + ' (' + btn.dataset.paidAt + ')';
            paidRow.style.display = 'flex';
        } else {
            paidRow.style.display = 'none';
        }

        const rejBox = document.getElementById('detailRejectionBox');
        const rejText = document.getElementById('detailRejectionText');
        if (btn.dataset.rejection) {
            rejText.textContent = btn.dataset.rejection;
            rejBox.style.display = 'block';
        } else {
            rejBox.style.display = 'none';
        }

        const receiptBtn = document.getElementById('detailReceiptBtn');
        receiptBtn.onclick = function () {
            closeModal('detailModal');
            openReceiptModal(btn.dataset.receipt, btn.dataset.category + ' — ' + btn.dataset.amount);
        };

        openModal('detailModal');
    }

    function openPayConfirmModal(actionUrl, requester, category, amount, description) {
        document.getElementById('payConfirmForm').action = actionUrl;
        document.getElementById('payRequester').textContent = requester;
        document.getElementById('payCategory').textContent = category;
        document.getElementById('payAmount').textContent = amount;
        document.getElementById('payDescription').textContent = description;
        openModal('payConfirmModal');
    }

    document.querySelectorAll('.modal-overlay').forEach(function (overlay) {
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) {
                closeModal(overlay.id);
            }
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.show').forEach(function (overlay) {
                closeModal(overlay.id);
            });
        }
    });
</script>
</body>
</html>
