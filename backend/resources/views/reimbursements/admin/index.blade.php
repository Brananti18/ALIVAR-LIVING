<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reimbursement Admin | ALIVARE</title>

    <style>
        :root {
            /* Variabel Identik Dashboard Admin */
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

            /* Variabel Konten Reimbursement */
            --navy-soft: #1E293B;
            --primary: #2563EB;
            --primary-hover: #1D4ED8;
            --primary-light: #EFF6FF;
            --primary-border: #BFDBFE;
            --bg: #F8FAFC;
            --white: #FFFFFF;
            --border: #E2E8F0;
            --border-strong: #CBD5E1;
            --text-main: #0F172A;
            --text-secondary: #475569;
            --text-muted: #64748B;
            --success: #16A34A;
            --success-hover: #15803D;
            --success-light: #F0FDF4;
            --success-border: #BBF7D0;
            --warning: #D97706;
            --warning-light: #FFFBEB;
            --warning-border: #FDE68A;
            --danger: #DC2626;
            --danger-hover: #B91C1C;
            --danger-light: #FEF2F2;
            --danger-border: #FECACA;
            --neutral-light: #F1F5F9;
            --radius-sm: 8px;
            --radius-xl: 16px;
            --shadow-xs: 0 1px 2px rgba(15, 23, 42, 0.03);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            margin: 0;
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: var(--bg-body);
            color: var(--navy);
            -webkit-font-smoothing: antialiased;
        }
        a { color: inherit; text-decoration: none; }
        button, input, select, textarea { font: inherit; }

        .app { display: flex; min-height: 100vh; }

        /* =========================================================
           1. SIDEBAR (100% IDENTIK DENGAN DASHBOARD ADMIN ASLI)
           ========================================================= */
        .sidebar {
            width: 240px;
            flex-shrink: 0;
            background: var(--navy);
            color: #ffffff;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
        }

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

        .menu-label {
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 16px 8px 8px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            margin-bottom: 4px;
            border-radius: var(--radius-md);
            color: #94a3b8;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu-item:hover {
            background: var(--navy-light);
            color: #ffffff;
        }

        .menu-item.active {
            background: var(--blue);
            color: #ffffff;
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .menu-icon svg {
            width: 18px;
            height: 18px;
        }

        /* =========================================================
           2. MAIN & TOPBAR (100% IDENTIK DENGAN DASHBOARD ADMIN ASLI)
           ========================================================= */
        .main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 64px;
            background: var(--card-bg);
            border-bottom: 1px solid var(--slate-200);
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .icon-button {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border: 0;
            border-radius: 50%;
            background: transparent;
            color: var(--slate-500);
            transition: 0.2s;
            cursor: pointer;
        }

        .icon-button:hover {
            background: var(--slate-100);
            color: var(--navy);
        }

        .icon-button svg {
            width: 20px;
            height: 20px;
        }

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
        .account-menu {
            position: relative;
        }

        .account-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 240px;
            padding: 8px;
            background: var(--card-bg);
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }

        .account-dropdown[hidden] {
            display: none;
        }

        .account-info {
            padding: 8px 12px;
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .account-info strong {
            font-size: 14px;
            color: var(--navy);
        }

        .account-info small {
            color: var(--slate-500);
            font-size: 12px;
        }

        .account-divider {
            height: 1px;
            background: var(--slate-200);
            margin: 6px 0;
        }

        .account-item {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border: 0;
            border-radius: var(--radius-md);
            background: transparent;
            color: var(--slate-800);
            font-size: 13px;
            font-weight: 500;
            transition: 0.2s;
            text-decoration: none;
            cursor: pointer;
        }

        .account-item:hover {
            background: var(--slate-100);
            color: var(--blue);
        }

        .account-icon {
            color: var(--slate-500);
            display: flex;
        }

        .account-item:hover .account-icon {
            color: var(--blue);
        }

        .account-icon svg {
            width: 16px;
            height: 16px;
        }

        .account-logout {
            color: #ef4444;
        }

        .account-logout:hover {
            background: #fef2f2;
            color: #ef4444;
        }

        .account-logout .account-icon {
            color: #ef4444;
        }

        .account-logout:hover .account-icon {
            color: #ef4444;
        }

        .content {
            max-width: 1400px;
            width: 100%;
            margin: 0 auto;
            padding: 32px;
            flex: 1;
        }

        /* =========================================================
           3. PAGE HEADER REIMBURSEMENT
           ========================================================= */
        .heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .breadcrumb {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            color: var(--text-muted);
            margin-bottom: 6px;
            font-weight: 500;
        }

        .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb-current {
            color: var(--navy);
            font-weight: 600;
        }

        h1 {
            font-size: 25px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--navy);
            margin: 0 0 4px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin: 0;
            line-height: 1.5;
        }

        .date-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
            box-shadow: var(--shadow-xs);
        }

        .date-pill svg {
            width: 16px;
            height: 16px;
            color: var(--primary);
        }

        /* =========================================================
           4. ALERTS & VALIDATION FEEDBACK
           ========================================================= */
        .alert {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 16px;
            border-radius: var(--radius-lg);
            margin-bottom: 20px;
            font-size: 13.5px;
            line-height: 1.5;
            box-shadow: var(--shadow-xs);
        }

        .alert-body {
            display: flex;
            align-items: flex-start;
            gap: 11px;
        }

        .alert-icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .alert-success {
            background: var(--success-light);
            color: #14532D;
            border: 1px solid var(--success-border);
        }

        .alert-error {
            background: var(--danger-light);
            color: #7F1D1D;
            border: 1px solid var(--danger-border);
        }

        .alert ul {
            margin: 6px 0 0;
            padding-left: 18px;
        }

        .alert-close {
            background: transparent;
            border: 0;
            color: inherit;
            opacity: 0.65;
            cursor: pointer;
            padding: 2px;
            font-size: 18px;
            line-height: 1;
        }

        .alert-close:hover {
            opacity: 1;
        }

        /* =========================================================
           5. FOUR SUMMARY STAT CARDS
           ========================================================= */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 26px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 18px 20px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .stat-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
        }

        .stat-label {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 700;
            color: var(--navy);
            letter-spacing: -0.02em;
            line-height: 1.15;
            font-variant-numeric: tabular-nums;
        }

        .stat-hint {
            font-size: 11.5px;
            color: var(--text-muted);
            margin-top: 6px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .stat-icon svg {
            width: 20px;
            height: 20px;
        }

        .stat-icon.blue {
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
        }

        .stat-icon.amber {
            background: var(--warning-light);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .stat-icon.green {
            background: var(--success-light);
            color: var(--success);
            border: 1px solid var(--success-border);
        }

        .stat-icon.navy {
            background: var(--neutral-light);
            color: var(--navy);
            border: 1px solid var(--border);
        }

        /* =========================================================
           6. PANELS & FORM REDESIGN
           ========================================================= */
        .panel {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            overflow: hidden;
            margin-bottom: 26px;
            box-shadow: var(--shadow-sm);
        }

        .panel-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .panel-title-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .panel-badge-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: var(--primary-light);
            border: 1px solid var(--primary-border);
            color: var(--primary);
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .panel-badge-icon svg {
            width: 18px;
            height: 18px;
        }

        .panel-title {
            font-size: 15.5px;
            font-weight: 700;
            color: var(--navy);
            margin: 0;
        }

        .panel-subtitle {
            font-size: 12.5px;
            color: var(--text-muted);
            margin: 2px 0 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 24px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: var(--navy-soft);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .req-star {
            color: var(--danger);
        }

        .input-control,
        select,
        textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid var(--border-strong);
            border-radius: 9px;
            font: inherit;
            font-size: 13.5px;
            color: var(--navy);
            background: var(--white);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .input-control,
        select {
            height: 44px;
        }

        select {
            appearance: none;
            padding-right: 38px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            cursor: pointer;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .is-invalid {
            border-color: var(--danger) !important;
            background: #FFF5F5 !important;
        }

        textarea {
            min-height: 98px;
            resize: vertical;
            line-height: 1.55;
        }

        /* Rupiah Currency Input */
        .currency-input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .currency-prefix {
            position: absolute;
            left: 1px;
            top: 1px;
            bottom: 1px;
            padding: 0 13px;
            display: flex;
            align-items: center;
            background: var(--bg);
            border-right: 1px solid var(--border);
            border-radius: 8px 0 0 8px;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-secondary);
            user-select: none;
        }

        .currency-input-group input[type="text"] {
            padding-left: 54px;
            font-weight: 600;
            font-variant-numeric: tabular-nums;
        }

        .field-helper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: var(--text-muted);
        }

        .field-error {
            font-size: 12px;
            color: var(--danger);
            font-weight: 500;
        }

        /* Drag & Drop Receipt Upload Zone */
        .upload-dropzone {
            position: relative;
            border: 1.5px dashed var(--border-strong);
            border-radius: var(--radius-lg);
            background: var(--bg);
            padding: 22px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.18s ease;
        }

        .upload-dropzone:hover,
        .upload-dropzone.dragover {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .upload-dropzone.has-file {
            border-style: solid;
            border-color: var(--primary-border);
            background: var(--white);
            text-align: left;
            cursor: default;
        }

        .upload-dropzone input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .upload-dropzone.has-file input[type="file"] {
            display: none;
        }

        .upload-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            pointer-events: none;
        }

        .upload-icon-circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--white);
            border: 1px solid var(--border);
            color: var(--primary);
            display: grid;
            place-items: center;
            box-shadow: var(--shadow-xs);
        }

        .upload-title {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--navy);
        }

        .upload-title span {
            color: var(--primary);
            text-decoration: underline;
        }

        .upload-meta {
            font-size: 12px;
            color: var(--text-muted);
        }

        .upload-preview-card {
            display: none;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .upload-dropzone.has-file .upload-placeholder {
            display: none;
        }

        .upload-dropzone.has-file .upload-preview-card {
            display: flex;
        }

        .upload-preview-left {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .upload-thumb {
            width: 64px;
            height: 64px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid var(--border);
            background: var(--neutral-light);
            flex-shrink: 0;
            cursor: zoom-in;
        }

        .upload-file-info {
            min-width: 0;
        }

        .upload-file-name {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--navy);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 380px;
        }

        .upload-file-size {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 3px;
        }

        .upload-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-footer {
            background: var(--bg);
            border-top: 1px solid var(--border);
            padding: 15px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .form-footer-note {
            font-size: 12.5px;
            color: var(--text-muted);
        }

        /* =========================================================
           7. BUTTONS
           ========================================================= */
        .btn {
            border: 1px solid transparent;
            border-radius: 9px;
            padding: 10px 16px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition: all 0.15s ease;
            line-height: 1.2;
            white-space: nowrap;
        }

        .btn svg {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
        }

        .btn-sm {
            padding: 7px 11px;
            font-size: 12px;
            border-radius: 7px;
        }

        .btn-sm svg {
            width: 13.5px;
            height: 13.5px;
        }

        .primary {
            background: var(--primary);
            color: var(--white);
            box-shadow: 0 1px 2px rgba(37, 99, 235, 0.22);
        }

        .primary:hover {
            background: var(--primary-hover);
        }

        .success {
            background: var(--success);
            color: var(--white);
        }

        .success:hover {
            background: var(--success-hover);
        }

        .danger {
            background: var(--danger);
            color: var(--white);
        }

        .danger:hover {
            background: var(--danger-hover);
        }

        .outline-danger {
            background: var(--white);
            color: var(--danger);
            border-color: var(--danger-border);
        }

        .outline-danger:hover {
            background: var(--danger-light);
        }

        .secondary {
            background: var(--white);
            color: var(--navy-soft);
            border-color: var(--border-strong);
        }

        .secondary:hover {
            background: var(--bg);
            border-color: #94A3B8;
        }

        /* =========================================================
           8. TABLE TOOLBAR, TABLE & STATUS BADGES
           ========================================================= */
        .table-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            width: 250px;
        }

        .search-box svg {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            color: var(--text-muted);
            pointer-events: none;
        }

        .search-box input {
            height: 38px;
            padding: 0 12px 0 34px;
            font-size: 13px;
            border-radius: 8px;
        }

        .filter-select {
            height: 38px;
            width: auto;
            min-width: 165px;
            padding: 0 34px 0 12px;
            font-size: 13px;
            border-radius: 8px;
        }

        .table-wrap {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1040px;
        }

        th,
        td {
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
            vertical-align: middle;
        }

        th {
            background: var(--bg);
            color: var(--text-secondary);
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            white-space: nowrap;
        }

        tbody tr {
            transition: background-color 0.12s ease;
        }

        tbody tr:hover {
            background: #F8FAFC;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .cell-date {
            white-space: nowrap;
            font-weight: 600;
            color: var(--navy);
        }

        .cell-time {
            display: block;
            font-size: 11.5px;
            font-weight: 400;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .requester-cell {
            display: flex;
            align-items: center;
            gap: 9px;
            white-space: nowrap;
        }

        .requester-dot {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--neutral-light);
            border: 1px solid var(--border);
            color: var(--navy-soft);
            font-size: 11.5px;
            font-weight: 700;
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .category-pill {
            display: inline-block;
            padding: 3px 9px;
            border-radius: 6px;
            background: var(--neutral-light);
            color: var(--navy-soft);
            font-size: 11.5px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .desc-text {
            color: var(--text-secondary);
            line-height: 1.45;
            max-width: 260px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .detail-trigger-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 4px;
            background: none;
            border: 0;
            padding: 0;
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .detail-trigger-link:hover {
            text-decoration: underline;
        }

        .rejection-note {
            margin-top: 6px;
            padding: 6px 9px;
            border-radius: 6px;
            background: var(--danger-light);
            border: 1px solid var(--danger-border);
            color: #991B1B;
            font-size: 11.5px;
            line-height: 1.4;
            max-width: 260px;
        }

        .amount-cell {
            font-weight: 700;
            color: var(--navy);
            white-space: nowrap;
            font-variant-numeric: tabular-nums;
        }

        .receipt-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 7px;
            background: var(--primary-light);
            border: 1px solid var(--primary-border);
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.15s ease;
        }

        .receipt-btn:hover {
            background: #DBEAFE;
        }

        .receipt-btn svg {
            width: 14px;
            height: 14px;
        }

        /* Status Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 99px;
            padding: 5px 10px;
            font-size: 11.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* Persetujuan */
        .badge-pending {
            background: var(--warning-light);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .badge-approved {
            background: var(--success-light);
            color: var(--success);
            border: 1px solid var(--success-border);
        }

        .badge-rejected {
            background: var(--danger-light);
            color: var(--danger);
            border: 1px solid var(--danger-border);
        }

        /* Pembayaran */
        .badge-unpaid {
            background: var(--neutral-light);
            color: var(--text-secondary);
            border: 1px solid var(--border);
        }

        .badge-paid {
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
        }

        /* Penyelesaian */
        .badge-incomplete {
            background: var(--warning-light);
            color: var(--warning);
            border: 1px solid var(--warning-border);
        }

        .badge-complete {
            background: var(--success-light);
            color: var(--success);
            border: 1px solid var(--success-border);
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: nowrap;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 56px 24px;
        }

        .empty-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: var(--primary-light);
            border: 1px solid var(--primary-border);
            color: var(--primary);
            display: grid;
            place-items: center;
            margin: 0 auto 14px;
        }

        .empty-icon svg {
            width: 26px;
            height: 26px;
        }

        .empty-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--navy);
            margin: 0 0 6px;
        }

        .empty-desc {
            font-size: 13.5px;
            color: var(--text-muted);
            max-width: 420px;
            margin: 0 auto 18px;
            line-height: 1.5;
        }

        .pagination-wrap {
            padding: 14px 24px;
            border-top: 1px solid var(--border);
            background: var(--bg);
        }

        .pagination-wrap nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            font-size: 13px;
            color: var(--text-secondary);
        }

        .pagination-wrap svg {
            width: 16px;
            height: 16px;
        }

        .pagination-wrap a,
        .pagination-wrap span[aria-current="page"] > span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border: 1px solid var(--border-strong);
            border-radius: 8px;
            background: var(--white);
            font-weight: 600;
        }

        .pagination-wrap span[aria-current="page"] > span {
            background: var(--primary);
            border-color: var(--primary);
            color: var(--white);
        }

        .footer {
            padding-top: 16px;
            color: var(--slate-500);
            font-size: 12px;
            text-align: center;
            border-top: 1px solid var(--slate-200);
            margin-top: auto;
        }

        /* =========================================================
           9. MODALS (LIGHTBOX, DETAIL, APPROVE, REJECT, COMPLETE)
           ========================================================= */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(15, 23, 42, 0.56);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.24s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.24s ease;
        }

        .modal-overlay.show {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .modal-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            width: 100%;
            max-width: 460px;
            box-shadow: 0 24px 48px -12px rgba(15, 23, 42, 0.22);
            overflow: hidden;
            transform: scale(0.93) translateY(14px);
            transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .modal-overlay.show .modal-card {
            transform: scale(1) translateY(0);
        }

        .modal-card.modal-lg {
            max-width: 680px;
        }

        .modal-head {
            padding: 18px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .modal-head h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: var(--navy);
        }

        .modal-close-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--white);
            color: var(--text-muted);
            display: grid;
            place-items: center;
            cursor: pointer;
        }

        .modal-close-btn:hover {
            background: var(--bg);
            color: var(--navy);
        }

        .modal-body {
            padding: 22px;
        }

        .modal-summary-box {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 14px 16px;
            margin-bottom: 16px;
            display: grid;
            gap: 8px;
            font-size: 13px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .summary-row span {
            color: var(--text-muted);
        }

        .summary-row strong {
            color: var(--navy);
            text-align: right;
        }

        .modal-foot {
            padding: 14px 22px;
            background: var(--bg);
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        /* Lightbox Image Container */
        .lightbox-img-wrap {
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

        .lightbox-img-wrap img {
            max-width: 100%;
            max-height: 60vh;
            border-radius: 6px;
            object-fit: contain;
            transition: transform 0.2s ease;
        }

        .lightbox-img-wrap img.zoomed {
            transform: scale(1.45);
            cursor: zoom-out;
        }

        /* Radio Option Cards for Completion Modal */
        .radio-card-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .radio-card {
            position: relative;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 14px;
            cursor: pointer;
            transition: all 0.15s ease;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .radio-card:hover {
            border-color: var(--primary-border);
            background: var(--bg);
        }

        .radio-card input[type="radio"] {
            width: 16px;
            height: 16px;
            margin-top: 2px;
            accent-color: var(--primary);
        }

        .radio-card-title {
            font-size: 13.5px;
            font-weight: 700;
            color: var(--navy);
            display: block;
        }

        .radio-card-desc {
            font-size: 12px;
            color: var(--text-muted);
            display: block;
            margin-top: 2px;
        }

        /* =========================================================
           10. RESPONSIVE BREAKPOINTS
           ========================================================= */
        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .app {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 16px;
            }

            .topbar {
                padding: 0 16px;
            }

            .content {
                padding: 20px 16px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .search-box {
                width: 100%;
            }
        }

        @media (max-width: 540px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .radio-card-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
@php
    $isPaginator = $reimbursements instanceof \Illuminate\Pagination\AbstractPaginator;
    $reimbursementCollection = $isPaginator ? $reimbursements->getCollection() : collect($reimbursements);
    $totalReimbursements = $isPaginator ? $reimbursements->total() : $reimbursementCollection->count();
    $pendingReimbursements = $reimbursementCollection->where('approval_status', 'Menunggu')->count();
    $approvedReimbursements = $reimbursementCollection->where('approval_status', 'Disetujui')->count();
    $paidReimbursements = $reimbursementCollection->where('payment_status', 'Sudah Dibayar')->count();
@endphp

<div class="app">

    <!-- SIDEBAR (100% IDENTIK DENGAN DASHBOARD ADMIN ASLI) -->
    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/alivare-logo.png') }}" alt="Logo Alivare">
        </div>

        <div class="menu-label">MENU UTAMA</div>
        <a href="{{ route('dashboard.admin') }}" class="menu-item {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
            <span class="menu-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            </span>
            <span>Dashboard</span>
        </a>

        <div class="menu-label">MONITORING</div>
        <a href="{{ route('admin.users') }}" class="menu-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
            <span class="menu-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </span>
            <span>Ringkasan Pengguna</span>
        </a>

        <a href="{{ route('admin.monitoring') }}" class="menu-item {{ request()->routeIs('admin.monitoring*') ? 'active' : '' }}">
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

        <a href="{{ route('admin.reimbursements.index') }}"
           class="menu-item {{ request()->routeIs('admin.reimbursements.*') ? 'active' : '' }}">
            <span class="menu-icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                    <path d="M7 9h10M7 13h6M7 17h4"/>
                </svg>
            </span>
            <span>Reimbursement</span>
        </a>
    </aside>

    <!-- MAIN -->
    <main class="main">
        <!-- TOPBAR (100% IDENTIK DENGAN DASHBOARD ADMIN ASLI) -->
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

        <!-- KONTEN UTAMA REIMBURSEMENT -->
        <section class="content">
            <!-- Page Header -->
            <div class="heading">
                <div>
                    <h1>Reimbursement</h1>
                    <p class="subtitle">Kelola pengajuan operasional, verifikasi bukti transaksi, dan konfirmasi penyelesaian dana.</p>
                </div>

                <div class="date-pill">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    <span>{{ now()->translatedFormat('d F Y') }}</span>
                </div>
            </div>

            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <div class="alert-body">
                        <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke-linecap="round" stroke-linejoin="round"/>
                            <polyline points="22 4 12 14.01 9 11.01" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="alert-close" onclick="this.parentElement.remove()" aria-label="Tutup">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error" role="alert">
                    <div class="alert-body">
                        <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                        <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        <div>
                            <strong>Terjadi kesalahan validasi:</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="alert-close" onclick="this.parentElement.remove()" aria-label="Tutup">&times;</button>
                </div>
            @endif

            <!-- 4 Kartu Statistik Dinamis -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div>
                        <div class="stat-label">Total Pengajuan</div>
                        <div class="stat-value">{{ number_format($totalReimbursements, 0, ',', '.') }}</div>
                        <div class="stat-hint">Seluruh pengajuan tercatat</div>
                    </div>
                    <div class="stat-icon navy" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                    </div>
                </div>

                <div class="stat-card">
                    <div>
                        <div class="stat-label">Menunggu Persetujuan</div>
                        <div class="stat-value">{{ number_format($pendingReimbursements, 0, ',', '.') }}</div>
                        <div class="stat-hint">Perlu tinjauan &amp; keputusan</div>
                    </div>
                    <div class="stat-icon amber" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                </div>

                <div class="stat-card">
                    <div>
                        <div class="stat-label">Sudah Disetujui</div>
                        <div class="stat-value">{{ number_format($approvedReimbursements, 0, ',', '.') }}</div>
                        <div class="stat-hint">Siap proses pencairan dana</div>
                    </div>
                    <div class="stat-icon green" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                </div>

                <div class="stat-card">
                    <div>
                        <div class="stat-label">Sudah Dibayar</div>
                        <div class="stat-value">{{ number_format($paidReimbursements, 0, ',', '.') }}</div>
                        <div class="stat-hint">Dana telah ditransfer Pemilik</div>
                    </div>
                    <div class="stat-icon blue" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="6" width="20" height="12" rx="2"/>
                            <circle cx="12" cy="12" r="2"/>
                            <path d="M6 12h.01M18 12h.01"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Form Pengajuan Reimbursement -->
            <section class="panel" id="formPengajuanSection">
                <div class="panel-header">
                    <div class="panel-title-group">
                        <div class="panel-badge-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="panel-title">Buat Pengajuan Reimbursement</h2>
                            <p class="panel-subtitle">Lengkapi detail pengeluaran dan unggah bukti transaksi yang jelas.</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.reimbursements.store') }}" method="POST" enctype="multipart/form-data" id="reimbursementCreateForm">
                    @csrf
                    <div class="form-grid">
                        <div class="field">
                            <label for="category">Kategori <span class="req-star">*</span></label>
                            <select name="category" id="category" class="@error('category') is-invalid @enderror" required>
                                <option value="">Pilih kategori pengeluaran</option>
                                <option value="Perbaikan" {{ old('category') === 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                <option value="Perawatan" {{ old('category') === 'Perawatan' ? 'selected' : '' }}>Perawatan</option>
                                <option value="Operasional" {{ old('category') === 'Operasional' ? 'selected' : '' }}>Operasional</option>
                                <option value="Pembelian" {{ old('category') === 'Pembelian' ? 'selected' : '' }}>Pembelian</option>
                                <option value="Lainnya" {{ old('category') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('category')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="amount_display">Nominal (Rp) <span class="req-star">*</span></label>
                            <div class="currency-input-group">
                                <span class="currency-prefix">Rp</span>
                                <input
                                    type="text"
                                    id="amount_display"
                                    class="input-control @error('amount') is-invalid @enderror"
                                    inputmode="numeric"
                                    autocomplete="off"
                                    placeholder="0"
                                    value="{{ old('amount') ? number_format((float) old('amount'), 0, ',', '.') : '' }}"
                                    required
                                >
                                <input
                                    type="hidden"
                                    name="amount"
                                    id="amount"
                                    value="{{ old('amount') }}"
                                >
                            </div>
                            <div class="field-helper">
                                <span>Masukkan angka tanpa titik; format Rupiah otomatis diterapkan.</span>
                            </div>
                            @error('amount')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field full">
                            <label for="description">Keterangan <span class="req-star">*</span></label>
                            <textarea
                                name="description"
                                id="description"
                                class="@error('description') is-invalid @enderror"
                                required
                                placeholder="Jelaskan rincian keperluan reimbursement, unit/properti terkait, atau nomor nota..."
                            >{{ old('description') }}</textarea>
                            <div class="field-helper">
                                <span>Sertakan detail spesifik agar mempermudah proses verifikasi.</span>
                                <span id="descCharCount">0 karakter</span>
                            </div>
                            @error('description')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field full">
                            <label for="receipt">Bukti Transaksi <span class="req-star">*</span></label>
                            <div class="upload-dropzone @error('receipt') is-invalid @enderror" id="receiptDropzone">
                                <input
                                    type="file"
                                    name="receipt"
                                    id="receipt"
                                    accept="image/jpeg,image/jpg,image/png,image/webp"
                                    required
                                >

                                <div class="upload-placeholder">
                                    <div class="upload-icon-circle">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                            <polyline points="17 8 12 3 7 8"/>
                                            <line x1="12" y1="3" x2="12" y2="15"/>
                                        </svg>
                                    </div>
                                    <div class="upload-title"><span>Klik untuk memilih file</span> atau seret gambar ke area ini</div>
                                    <div class="upload-meta">Format yang didukung: JPG, JPEG, PNG, WEBP &bull; Ukuran maksimal 5 MB</div>
                                </div>

                                <div class="upload-preview-card" id="uploadPreviewCard">
                                    <div class="upload-preview-left">
                                        <img src="" alt="Preview Bukti Transaksi" class="upload-thumb" id="uploadPreviewImg" onclick="previewSelectedReceipt()">
                                        <div class="upload-file-info">
                                            <div class="upload-file-name" id="uploadFileName">-</div>
                                            <div class="upload-file-size" id="uploadFileSize">-</div>
                                        </div>
                                    </div>
                                    <div class="upload-actions">
                                        <button type="button" class="btn btn-sm secondary" onclick="triggerReceiptPicker()">Ganti Gambar</button>
                                        <button type="button" class="btn btn-sm outline-danger" onclick="clearReceiptFile()">Hapus</button>
                                    </div>
                                </div>
                            </div>
                            <span class="field-error" id="receiptClientError" style="display: none;"></span>
                            @error('receipt')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-footer">
                        <span class="form-footer-note">Pastikan nominal sesuai dengan angka yang tertera pada bukti transaksi.</span>
                        <button type="submit" class="btn primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"/>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                            </svg>
                            <span>Kirim Pengajuan</span>
                        </button>
                    </div>
                </form>
            </section>

            <!-- Daftar Pengajuan Reimbursement -->
            <section class="panel">
                <div class="panel-header">
                    <div class="panel-title-group">
                        <div class="panel-badge-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="8" y1="6" x2="21" y2="6"/>
                                <line x1="8" y1="12" x2="21" y2="12"/>
                                <line x1="8" y1="18" x2="21" y2="18"/>
                                <line x1="3" y1="6" x2="3.01" y2="6"/>
                                <line x1="3" y1="12" x2="3.01" y2="12"/>
                                <line x1="3" y1="18" x2="3.01" y2="18"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="panel-title">Daftar Pengajuan Reimbursement</h2>
                            <p class="panel-subtitle">Pantau status persetujuan, pembayaran Pemilik, dan konfirmasi penyelesaian.</p>
                        </div>
                    </div>

                    @if($reimbursementCollection->isNotEmpty())
                        <div class="table-controls">
                            <div class="search-box">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                </svg>
                                <input type="text" id="tableSearchInput" placeholder="Cari pengaju, kategori, keterangan...">
                            </div>

                            <select id="tableStatusFilter" class="filter-select" aria-label="Filter Status Persetujuan">
                                <option value="ALL">Semua Status</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Sudah Dibayar">Sudah Dibayar</option>
                            </select>
                        </div>
                    @endif
                </div>

                <div class="table-wrap">
                    <table id="reimbursementTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pengaju</th>
                                <th>Kategori &amp; Keterangan</th>
                                <th>Nominal</th>
                                <th>Bukti</th>
                                <th>Persetujuan</th>
                                <th>Pembayaran</th>
                                <th>Penyelesaian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($reimbursements as $item)
                            @php
                                $formattedDate = $item->created_at->format('d/m/Y');
                                $formattedTime = $item->created_at->format('H:i');
                                $adminName = $item->admin->name ?? '-';
                                $formattedAmount = 'Rp ' . number_format((float)$item->amount, 0, ',', '.');
                                $receiptUrl = asset('storage/' . $item->receipt_path);
                                $approvalBadgeClass = $item->approval_status === 'Menunggu'
                                    ? 'badge-pending'
                                    : ($item->approval_status === 'Disetujui' ? 'badge-approved' : 'badge-rejected');
                                $paymentBadgeClass = $item->payment_status === 'Sudah Dibayar'
                                    ? 'badge-paid'
                                    : 'badge-unpaid';
                                $completionBadgeClass = $item->completion_status === 'Selesai'
                                    ? 'badge-complete'
                                    : 'badge-incomplete';
                            @endphp
                            <tr
                                data-search="{{ strtolower($adminName . ' ' . $item->category . ' ' . $item->description . ' ' . $formattedAmount) }}"
                                data-approval="{{ $item->approval_status }}"
                                data-payment="{{ $item->payment_status }}"
                            >
                                <td class="cell-date">
                                    {{ $formattedDate }}
                                    <span class="cell-time">{{ $formattedTime }} WIB</span>
                                </td>

                                <td>
                                    <div class="requester-cell">
                                        <span class="requester-dot">{{ strtoupper(substr($adminName, 0, 1)) }}</span>
                                        <span>{{ $adminName }}</span>
                                    </div>
                                </td>

                                <td>
                                    <span class="category-pill">{{ $item->category }}</span>
                                    <div class="desc-text">{{ $item->description }}</div>
                                    <button
                                        type="button"
                                        class="detail-trigger-link"
                                        data-date="{{ $formattedDate }} {{ $formattedTime }} WIB"
                                        data-requester="{{ $adminName }}"
                                        data-category="{{ $item->category }}"
                                        data-amount="{{ $formattedAmount }}"
                                        data-description="{{ $item->description }}"
                                        data-approval="{{ $item->approval_status }}"
                                        data-payment="{{ $item->payment_status }}"
                                        data-completion="{{ $item->completion_status }}"
                                        data-rejection="{{ $item->rejection_reason ?? '' }}"
                                        data-receipt="{{ $receiptUrl }}"
                                        onclick="openDetailModal(this)"
                                    >
                                        Lihat detail
                                    </button>
                                    @if($item->rejection_reason)
                                        <div class="rejection-note">
                                            <strong>Alasan ditolak:</strong> {{ $item->rejection_reason }}
                                        </div>
                                    @endif
                                </td>

                                <td class="amount-cell">{{ $formattedAmount }}</td>

                                <td>
                                    <button
                                        type="button"
                                        class="receipt-btn"
                                        onclick="openReceiptModal('{{ $receiptUrl }}', '{{ e($item->category) }} - {{ $formattedAmount }}')"
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
                                    <span class="badge {{ $approvalBadgeClass }}">
                                        <span class="badge-dot"></span>
                                        <span>{{ $item->approval_status }}</span>
                                    </span>
                                </td>

                                <td>
                                    <span class="badge {{ $paymentBadgeClass }}">
                                        <span class="badge-dot"></span>
                                        <span>{{ $item->payment_status }}</span>
                                    </span>
                                </td>

                                <td>
                                    <span class="badge {{ $completionBadgeClass }}">
                                        <span class="badge-dot"></span>
                                        <span>{{ $item->completion_status }}</span>
                                    </span>
                                </td>

                                <td>
                                    <div class="actions">
                                        @if($item->approval_status === 'Menunggu')
                                            <button
                                                type="button"
                                                class="btn btn-sm success"
                                                onclick="openApproveModal('{{ route('admin.reimbursements.decide', $item) }}', '{{ e($adminName) }}', '{{ e($item->category) }}', '{{ $formattedAmount }}')"
                                            >
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"/>
                                                </svg>
                                                <span>ACC</span>
                                            </button>

                                            <button
                                                type="button"
                                                class="btn btn-sm danger"
                                                onclick="openRejectModal('{{ route('admin.reimbursements.decide', $item) }}', '{{ e($adminName) }}', '{{ e($item->category) }}', '{{ $formattedAmount }}')"
                                            >
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                                </svg>
                                                <span>Tolak</span>
                                            </button>
                                        @endif

                                        @if($item->payment_status === 'Sudah Dibayar')
                                            <button
                                                type="button"
                                                class="btn btn-sm primary"
                                                onclick="openCompleteModal('{{ route('admin.reimbursements.complete', $item) }}', '{{ e($adminName) }}', '{{ e($item->category) }}', '{{ $formattedAmount }}', '{{ $item->completion_status }}')"
                                            >
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M9 11l3 3L22 4"/>
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                                                </svg>
                                                <span>Konfirmasi Status</span>
                                            </button>
                                        @endif

                                        @if($item->approval_status !== 'Menunggu' && $item->payment_status !== 'Sudah Dibayar')
                                            <span style="color: var(--text-muted); font-weight: 500;">-</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="2" y="5" width="20" height="14" rx="2"/>
                                                <line x1="2" y1="10" x2="22" y2="10"/>
                                            </svg>
                                        </div>
                                        <h3 class="empty-title">Belum Ada Pengajuan Reimbursement</h3>
                                        <p class="empty-desc">Pengajuan reimbursement yang dibuat oleh Admin akan tampil di tabel ini lengkap dengan status persetujuan dan pembayaran.</p>
                                        <a href="#formPengajuanSection" class="btn primary">Buat Pengajuan Pertama</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                @if($isPaginator && $reimbursements->hasPages())
                    <div class="pagination-wrap">
                        {{ $reimbursements->links() }}
                    </div>
                @endif
            </section>

            <footer class="footer">
                ALIVARE &copy; {{ now()->year }} — Panel Administrasi
            </footer>
        </section>
    </main>
</div>

<!-- =========================================================
     MODAL 1: LIGHTBOX BUKTI TRANSAKSI
     ========================================================= -->
<div class="modal-overlay" id="receiptLightboxModal" aria-hidden="true">
    <div class="modal-card modal-lg" role="dialog" aria-modal="true" aria-labelledby="receiptModalTitle">
        <div class="modal-head">
            <h3 id="receiptModalTitle">Bukti Transaksi</h3>
            <button type="button" class="modal-close-btn" onclick="closeModal('receiptLightboxModal')" aria-label="Tutup">&times;</button>
        </div>
        <div class="modal-body">
            <div class="lightbox-img-wrap">
                <img id="lightboxImage" src="" alt="Bukti Transaksi" onclick="this.classList.toggle('zoomed')" title="Klik gambar untuk memperbesar / memperkecil">
            </div>
        </div>
        <div class="modal-foot">
            <button type="button" class="btn secondary" onclick="document.getElementById('lightboxImage').classList.toggle('zoomed')">Zoom Gambar</button>
            <a id="lightboxNewTabLink" href="#" target="_blank" rel="noopener" class="btn primary">Buka di Tab Baru</a>
        </div>
    </div>
</div>

<!-- =========================================================
     MODAL 2: DETAIL PENGAJUAN REIMBURSEMENT
     ========================================================= -->
<div class="modal-overlay" id="detailReimbursementModal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="detailModalTitle">
        <div class="modal-head">
            <h3 id="detailModalTitle">Detail Pengajuan Reimbursement</h3>
            <button type="button" class="modal-close-btn" onclick="closeModal('detailReimbursementModal')" aria-label="Tutup">&times;</button>
        </div>
        <div class="modal-body">
            <div class="modal-summary-box">
                <div class="summary-row"><span>Tanggal Pengajuan</span><strong id="detailDate">-</strong></div>
                <div class="summary-row"><span>Pengaju</span><strong id="detailRequester">-</strong></div>
                <div class="summary-row"><span>Kategori</span><strong id="detailCategory">-</strong></div>
                <div class="summary-row"><span>Nominal</span><strong id="detailAmount">-</strong></div>
                <div class="summary-row"><span>Persetujuan</span><strong id="detailApproval">-</strong></div>
                <div class="summary-row"><span>Pembayaran</span><strong id="detailPayment">-</strong></div>
                <div class="summary-row"><span>Penyelesaian</span><strong id="detailCompletion">-</strong></div>
            </div>

            <div class="field" style="margin-bottom: 12px;">
                <label>Keterangan Lengkap</label>
                <div id="detailDescription" style="padding: 12px; background: var(--bg); border: 1px solid var(--border); border-radius: 8px; font-size: 13.5px; line-height: 1.55; color: var(--navy-soft); white-space: pre-line;">-</div>
            </div>

            <div class="rejection-note" id="detailRejectionBox" style="display: none; max-width: 100%;">
                <strong>Alasan Penolakan:</strong> <span id="detailRejectionText"></span>
            </div>
        </div>
        <div class="modal-foot">
            <button type="button" class="btn secondary" onclick="closeModal('detailReimbursementModal')">Tutup</button>
            <button type="button" class="btn primary" id="detailViewReceiptBtn">Lihat Bukti Transaksi</button>
        </div>
    </div>
</div>

<!-- =========================================================
     MODAL 3: KONFIRMASI PERSETUJUAN (ACC)
     ========================================================= -->
<div class="modal-overlay" id="approveReimbursementModal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="approveModalTitle">
        <div class="modal-head">
            <h3 id="approveModalTitle">Setujui Pengajuan Reimbursement</h3>
            <button type="button" class="modal-close-btn" onclick="closeModal('approveReimbursementModal')" aria-label="Tutup">&times;</button>
        </div>
        <form method="POST" action="" id="approveModalForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="approval_status" value="Disetujui">
            <div class="modal-body">
                <p style="margin: 0 0 14px; font-size: 13.5px; color: var(--text-secondary); line-height: 1.5;">
                    Apakah Anda yakin ingin menyetujui (ACC) pengajuan reimbursement berikut? Setelah disetujui, pengajuan akan diteruskan ke Pemilik untuk proses pembayaran.
                </p>
                <div class="modal-summary-box" style="margin-bottom: 0;">
                    <div class="summary-row"><span>Pengaju</span><strong id="approveRequester">-</strong></div>
                    <div class="summary-row"><span>Kategori</span><strong id="approveCategory">-</strong></div>
                    <div class="summary-row"><span>Nominal</span><strong id="approveAmount">-</strong></div>
                </div>
            </div>
            <div class="modal-foot">
                <button type="button" class="btn secondary" onclick="closeModal('approveReimbursementModal')">Batal</button>
                <button type="submit" class="btn success">Ya, Setujui (ACC)</button>
            </div>
        </form>
    </div>
</div>

<!-- =========================================================
     MODAL 4: KONFIRMASI PENOLAKAN (ALASAN WAJIB DIISI)
     ========================================================= -->
<div class="modal-overlay" id="rejectReimbursementModal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="rejectModalTitle">
        <div class="modal-head">
            <h3 id="rejectModalTitle">Tolak Pengajuan Reimbursement</h3>
            <button type="button" class="modal-close-btn" onclick="closeModal('rejectReimbursementModal')" aria-label="Tutup">&times;</button>
        </div>
        <form method="POST" action="" id="rejectModalForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="approval_status" value="Ditolak">
            <div class="modal-body">
                <div class="modal-summary-box">
                    <div class="summary-row"><span>Pengaju</span><strong id="rejectRequester">-</strong></div>
                    <div class="summary-row"><span>Kategori</span><strong id="rejectCategory">-</strong></div>
                    <div class="summary-row"><span>Nominal</span><strong id="rejectAmount">-</strong></div>
                </div>
                <div class="field">
                    <label for="modalRejectionReason">Alasan Penolakan <span class="req-star">*</span></label>
                    <textarea
                        name="rejection_reason"
                        id="modalRejectionReason"
                        required
                        placeholder="Tuliskan alasan penolakan dengan jelas (misal: bukti transaksi tidak terbaca atau nominal tidak sesuai)..."
                    ></textarea>
                </div>
            </div>
            <div class="modal-foot">
                <button type="button" class="btn secondary" onclick="closeModal('rejectReimbursementModal')">Batal</button>
                <button type="submit" class="btn danger">Tolak Pengajuan</button>
            </div>
        </form>
    </div>
</div>

<!-- =========================================================
     MODAL 5: KONFIRMASI STATUS PENYELESAIAN
     ========================================================= -->
<div class="modal-overlay" id="completeReimbursementModal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="completeModalTitle">
        <div class="modal-head">
            <h3 id="completeModalTitle">Konfirmasi Status Penyelesaian</h3>
            <button type="button" class="modal-close-btn" onclick="closeModal('completeReimbursementModal')" aria-label="Tutup">&times;</button>
        </div>
        <form method="POST" action="" id="completeModalForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="modal-summary-box">
                    <div class="summary-row"><span>Pengaju</span><strong id="completeRequester">-</strong></div>
                    <div class="summary-row"><span>Kategori</span><strong id="completeCategory">-</strong></div>
                    <div class="summary-row"><span>Nominal</span><strong id="completeAmount">-</strong></div>
                </div>

                <div class="field">
                    <label>Pilih Status Penyelesaian Akhir <span class="req-star">*</span></label>
                    <div class="radio-card-group">
                        <label class="radio-card">
                            <input type="radio" name="completion_status" value="Selesai" id="statusRadioSelesai" required>
                            <span>
                                <span class="radio-card-title">Selesai</span>
                                <span class="radio-card-desc">Dana telah diterima &amp; transaksi tuntas.</span>
                            </span>
                        </label>

                        <label class="radio-card">
                            <input type="radio" name="completion_status" value="Belum Selesai" id="statusRadioBelumSelesai" required>
                            <span>
                                <span class="radio-card-title">Belum Selesai</span>
                                <span class="radio-card-desc">Masih menunggu konfirmasi penerimaan.</span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-foot">
                <button type="button" class="btn secondary" onclick="closeModal('completeReimbursementModal')">Batal</button>
                <button type="submit" class="btn primary">Simpan Status</button>
            </div>
        </form>
    </div>
</div>

<script>
    // =========================================================
    // 1. DROPDOWN PROFIL ADMIN (100% IDENTIK DASHBOARD ADMIN)
    // =========================================================
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

    // =========================================================
    // 2. FORMAT NOMINAL RUPIAH & SINKRONISASI NILAI NUMERIK
    // =========================================================
    const amountDisplay = document.getElementById('amount_display');
    const amountHidden = document.getElementById('amount');
    const createForm = document.getElementById('reimbursementCreateForm');

    function formatRupiahDigits(digits) {
        if (!digits) return '';
        return digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    if (amountDisplay && amountHidden) {
        amountDisplay.addEventListener('input', function () {
            const rawDigits = this.value.replace(/\D/g, '').replace(/^0+/, '');
            amountHidden.value = rawDigits;
            this.value = formatRupiahDigits(rawDigits);
        });
    }

    if (createForm && amountHidden && amountDisplay) {
        createForm.addEventListener('submit', function (e) {
            const numericVal = parseFloat(amountHidden.value || '0');
            if (!numericVal || numericVal < 1) {
                e.preventDefault();
                amountDisplay.classList.add('is-invalid');
                amountDisplay.focus();
            } else {
                amountDisplay.classList.remove('is-invalid');
            }
        });
    }

    // =========================================================
    // 3. PENGHITUNG KARAKTER KETERANGAN
    // =========================================================
    const descInput = document.getElementById('description');
    const descCounter = document.getElementById('descCharCount');
    if (descInput && descCounter) {
        const updateCounter = () => {
            descCounter.textContent = descInput.value.length + ' karakter';
        };
        descInput.addEventListener('input', updateCounter);
        updateCounter();
    }

    // =========================================================
    // 4. UPLOAD BUKTI TRANSAKSI (DRAG & DROP + PREVIEW + 5MB)
    // =========================================================
    const receiptInput = document.getElementById('receipt');
    const receiptDropzone = document.getElementById('receiptDropzone');
    const previewImg = document.getElementById('uploadPreviewImg');
    const fileNameEl = document.getElementById('uploadFileName');
    const fileSizeEl = document.getElementById('uploadFileSize');
    const clientErrorEl = document.getElementById('receiptClientError');
    let currentPreviewDataUrl = '';

    function formatBytes(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }

    function showReceiptError(msg) {
        if (!clientErrorEl) return;
        clientErrorEl.textContent = msg;
        clientErrorEl.style.display = 'block';
        receiptDropzone.classList.add('is-invalid');
    }

    function clearReceiptError() {
        if (!clientErrorEl) return;
        clientErrorEl.textContent = '';
        clientErrorEl.style.display = 'none';
        receiptDropzone.classList.remove('is-invalid');
    }

    function handleReceiptFile(file) {
        clearReceiptError();
        if (!file) {
            clearReceiptFile();
            return;
        }

        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        const maxSize = 5 * 1024 * 1024; // 5 MB

        if (!allowedTypes.includes(file.type)) {
            showReceiptError('Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau WEBP.');
            clearReceiptFile(false);
            return;
        }

        if (file.size > maxSize) {
            showReceiptError('Ukuran file melebihi batas maksimal 5 MB.');
            clearReceiptFile(false);
            return;
        }

        fileNameEl.textContent = file.name;
        fileSizeEl.textContent = formatBytes(file.size) + ' • Siap diunggah';

        const reader = new FileReader();
        reader.onload = function (e) {
            currentPreviewDataUrl = e.target.result;
            previewImg.src = currentPreviewDataUrl;
            receiptDropzone.classList.add('has-file');
        };
        reader.readAsDataURL(file);
    }

    function triggerReceiptPicker() {
        if (receiptInput) receiptInput.click();
    }

    function clearReceiptFile(resetError = true) {
        if (receiptInput) receiptInput.value = '';
        if (previewImg) previewImg.src = '';
        currentPreviewDataUrl = '';
        if (receiptDropzone) receiptDropzone.classList.remove('has-file');
        if (resetError) clearReceiptError();
    }

    function previewSelectedReceipt() {
        if (currentPreviewDataUrl) {
            openReceiptModal(currentPreviewDataUrl, fileNameEl.textContent || 'Pratinjau Bukti Transaksi');
        }
    }

    if (receiptInput && receiptDropzone) {
        receiptInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                handleReceiptFile(this.files[0]);
            }
        });

        ['dragenter', 'dragover'].forEach(evt => {
            receiptDropzone.addEventListener(evt, function (e) {
                e.preventDefault();
                e.stopPropagation();
                receiptDropzone.classList.add('dragover');
            });
        });

        ['dragleave', 'drop'].forEach(evt => {
            receiptDropzone.addEventListener(evt, function (e) {
                e.preventDefault();
                e.stopPropagation();
                receiptDropzone.classList.remove('dragover');
            });
        });

        receiptDropzone.addEventListener('drop', function (e) {
            const files = e.dataTransfer && e.dataTransfer.files;
            if (files && files[0]) {
                const dt = new DataTransfer();
                dt.items.add(files[0]);
                receiptInput.files = dt.files;
                handleReceiptFile(files[0]);
            }
        });
    }

    // =========================================================
    // 5. FILTER & PENCARIAN TABEL CLIENT-SIDE
    // =========================================================
    const searchInput = document.getElementById('tableSearchInput');
    const statusFilter = document.getElementById('tableStatusFilter');
    const tableBody = document.querySelector('#reimbursementTable tbody');

    function filterReimbursementTable() {
        if (!tableBody) return;
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        const status = statusFilter ? statusFilter.value : 'ALL';
        const rows = tableBody.querySelectorAll('tr[data-search]');

        rows.forEach(row => {
            const matchesSearch = !query || row.dataset.search.includes(query);
            let matchesStatus = true;
            if (status === 'Sudah Dibayar') {
                matchesStatus = row.dataset.payment === 'Sudah Dibayar';
            } else if (status !== 'ALL') {
                matchesStatus = row.dataset.approval === status;
            }
            row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
        });
    }

    if (searchInput) searchInput.addEventListener('input', filterReimbursementTable);
    if (statusFilter) statusFilter.addEventListener('change', filterReimbursementTable);

    // =========================================================
    // 6. MODAL MANAGEMENT (LIGHTBOX, DETAIL, ACC, TOLAK, SELESAI)
    // =========================================================
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
    }

    function openReceiptModal(imageUrl, titleText) {
        const img = document.getElementById('lightboxImage');
        const title = document.getElementById('receiptModalTitle');
        const link = document.getElementById('lightboxNewTabLink');
        if (!img) return;
        img.classList.remove('zoomed');
        img.src = imageUrl;
        if (title) title.textContent = titleText || 'Bukti Transaksi';
        if (link) link.href = imageUrl;
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

        const rejectionBox = document.getElementById('detailRejectionBox');
        const rejectionText = document.getElementById('detailRejectionText');
        if (btn.dataset.rejection) {
            rejectionText.textContent = btn.dataset.rejection;
            rejectionBox.style.display = 'block';
        } else {
            rejectionBox.style.display = 'none';
        }

        const viewReceiptBtn = document.getElementById('detailViewReceiptBtn');
        viewReceiptBtn.onclick = function () {
            closeModal('detailReimbursementModal');
            openReceiptModal(btn.dataset.receipt, btn.dataset.category + ' - ' + btn.dataset.amount);
        };

        openModal('detailReimbursementModal');
    }

    function openApproveModal(actionUrl, requester, category, amount) {
        document.getElementById('approveModalForm').action = actionUrl;
        document.getElementById('approveRequester').textContent = requester;
        document.getElementById('approveCategory').textContent = category;
        document.getElementById('approveAmount').textContent = amount;
        openModal('approveReimbursementModal');
    }

    function openRejectModal(actionUrl, requester, category, amount) {
        document.getElementById('rejectModalForm').action = actionUrl;
        document.getElementById('rejectRequester').textContent = requester;
        document.getElementById('rejectCategory').textContent = category;
        document.getElementById('rejectAmount').textContent = amount;
        const reasonInput = document.getElementById('modalRejectionReason');
        if (reasonInput) reasonInput.value = '';
        openModal('rejectReimbursementModal');
        setTimeout(() => { if (reasonInput) reasonInput.focus(); }, 120);
    }

    function openCompleteModal(actionUrl, requester, category, amount, currentStatus) {
        document.getElementById('completeModalForm').action = actionUrl;
        document.getElementById('completeRequester').textContent = requester;
        document.getElementById('completeCategory').textContent = category;
        document.getElementById('completeAmount').textContent = amount;

        const radioSelesai = document.getElementById('statusRadioSelesai');
        const radioBelum = document.getElementById('statusRadioBelumSelesai');
        if (currentStatus === 'Selesai') {
            radioSelesai.checked = true;
        } else {
            radioBelum.checked = true;
        }

        openModal('completeReimbursementModal');
    }

    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) {
                overlay.classList.remove('show');
                overlay.setAttribute('aria-hidden', 'true');
            }
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.show').forEach(overlay => {
                overlay.classList.remove('show');
                overlay.setAttribute('aria-hidden', 'true');
            });
        }
    });
</script>
</body>
</html>