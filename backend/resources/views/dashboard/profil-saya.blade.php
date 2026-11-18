<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - ALIVARE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --navy-dark: #0f172a;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --primary-border: #bfdbfe;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --danger: #dc2626;
            --danger-hover: #b91c1c;
            --danger-light: #fef2f2;
            --danger-border: #fecaca;
            --success: #16a34a;
            --success-light: #f0fdf4;
            --success-border: #bbf7d0;
            --radius-sm: 8px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-xl: 16px;
            --shadow-xs: 0 1px 2px 0 rgba(15, 23, 42, 0.03);
            --shadow-sm: 0 1px 3px 0 rgba(15, 23, 42, 0.04), 0 1px 2px -1px rgba(15, 23, 42, 0.03);
            --shadow-md: 0 4px 12px -2px rgba(15, 23, 42, 0.06);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--slate-50);
            color: var(--slate-800);
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        .layout-wrapper {
            display: flex !important;
            min-height: 100vh !important;
            width: 100% !important;
        }

        /* =========================================================
           1. SIDEBAR (DIPERTAHANKAN SESUAI STRUKTUR DASHBOARD ALIVARE)
           ========================================================= */
        .sidebar-container {
            width: 154px;
            min-width: 154px;
            max-width: 154px;
            min-height: 100vh;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            padding: 0;
            background: #fff;
            border-right: 1px solid var(--slate-200);
            box-sizing: border-box;
        }

        .sidebar-brand {
            height: 48px;
            min-height: 48px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 12px;
            margin: 0;
            border-bottom: 1px solid var(--slate-200);
            box-sizing: border-box;
        }

        .sidebar-nav {
            display: block;
            width: 100%;
            padding: 12px !important;
            box-sizing: border-box;
        }

        .sidebar-nav .nav-label {
            display: block;
            width: 100%;
            padding: 10px 8px 8px;
            margin: 0;
            color: var(--slate-500);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .05em;
            text-transform: uppercase;
            box-sizing: border-box;
        }

        .sidebar-nav .nav-link {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
            width: 100%;
            height: 36px;
            padding: 0 10px;
            margin: 0 0 4px;
            border-radius: 8px;
            color: var(--slate-600);
            background: transparent;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            box-sizing: border-box;
        }

        .sidebar-nav .nav-link:hover {
            background: var(--slate-100);
        }

        .sidebar-nav .nav-link.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
        }

        .sidebar-nav .nav-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 16px;
            height: 16px;
            flex: 0 0 16px;
        }

        .sidebar-nav .nav-icon svg {
            display: block;
            width: 16px;
            height: 16px;
            min-width: 16px;
            min-height: 16px;
            max-width: 16px;
            max-height: 16px;
            stroke: currentColor;
            stroke-width: 2;
            flex-shrink: 0;
        }

        /* =========================================================
           2. TOPBAR (DIPERTAHANKAN SESUAI KOMPONEN TOPBAR-ACTIONS)
           ========================================================= */
        .main-content {
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
            min-width: 0 !important;
        }

        .topbar {
            width: 100%;
            height: 48px;
            min-height: 48px;
            box-sizing: border-box;
            background: #fff;
            border-bottom: 1px solid var(--slate-200);
            padding: 0 16px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            position: sticky;
            top: 0;
            z-index: 20;
            flex-shrink: 0;
        }

        .topbar .top-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-left: auto;
            flex-shrink: 0;
        }

        .topbar .icon-button,
        .topbar .avatar {
            flex-shrink: 0;
        }

        /* =========================================================
           3. MAIN CONTENT AREA & SAAS PROFILE REDESIGN
           ========================================================= */
        .content-body {
            padding: 32px 36px 56px;
            max-width: 1080px;
            width: 100%;
            margin: 0 auto;
            box-sizing: border-box;
        }

        /* Page Header */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .breadcrumb {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12.5px;
            color: var(--slate-500);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .breadcrumb a {
            color: var(--slate-500);
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb-separator {
            color: var(--slate-300);
            display: inline-flex;
            align-items: center;
        }

        .breadcrumb-current {
            color: var(--slate-800);
            font-weight: 600;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--navy-dark);
            letter-spacing: -0.025em;
            margin: 0 0 4px 0;
            line-height: 1.25;
        }

        .page-subtitle {
            font-size: 13.5px;
            color: var(--slate-500);
            margin: 0;
            line-height: 1.5;
        }

        .header-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            background: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: 99px;
            font-size: 12px;
            font-weight: 600;
            color: var(--slate-700);
            box-shadow: var(--shadow-xs);
            white-space: nowrap;
        }

        .status-dot-live {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: var(--success);
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.15);
        }

        /* Alert Feedback */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            border-radius: var(--radius-md);
            font-size: 13.5px;
            line-height: 1.5;
            margin-bottom: 24px;
            box-shadow: var(--shadow-xs);
        }

        .alert-success {
            background-color: var(--success-light);
            color: #14532d;
            border: 1px solid var(--success-border);
        }

        .alert-danger {
            background-color: var(--danger-light);
            color: #7f1d1d;
            border: 1px solid var(--danger-border);
        }

        .alert-icon {
            flex-shrink: 0;
            width: 18px;
            height: 18px;
            margin-top: 2px;
        }

        /* =========================================================
           4. PROFILE IDENTITY HERO CARD
           ========================================================= */
        .profile-hero-card {
            background: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-xl);
            overflow: hidden;
            margin-bottom: 32px;
            box-shadow: var(--shadow-sm);
        }

        .profile-hero-cover {
            height: 68px;
            background-color: #f1f5f9;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 16px 16px;
            border-bottom: 1px solid var(--slate-200);
            position: relative;
        }

        .profile-hero-cover::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(239, 246, 255, 0.65) 0%, rgba(248, 250, 252, 0.25) 100%);
        }

        .profile-hero-body {
            padding: 0 28px 24px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .profile-identity-left {
            display: flex;
            align-items: flex-end;
            gap: 18px;
            min-width: 0;
        }

        .avatar-circle {
            width: 76px;
            height: 76px;
            margin-top: -38px;
            position: relative;
            z-index: 2;
            border-radius: 50%;
            background: var(--primary-light);
            border: 4px solid #ffffff;
            outline: 1px solid var(--primary-border);
            color: var(--primary);
            display: grid;
            place-items: center;
            font-size: 28px;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: var(--shadow-md);
        }

        .profile-identity-text {
            padding-top: 14px;
            min-width: 0;
        }

        .profile-name-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 4px;
        }

        .profile-name {
            font-size: 19px;
            font-weight: 700;
            color: var(--navy-dark);
            letter-spacing: -0.015em;
            margin: 0;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 3px 10px;
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
            border-radius: 99px;
            font-size: 11.5px;
            font-weight: 600;
        }

        .role-badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: var(--primary);
        }

        .profile-email-row {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13.5px;
            color: var(--slate-500);
            margin: 0;
        }

        .profile-email-row svg {
            width: 14px;
            height: 14px;
            color: var(--slate-400);
            flex-shrink: 0;
        }

        .profile-meta-chips {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: var(--slate-50);
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-sm);
            font-size: 12px;
            color: var(--slate-600);
            font-weight: 500;
        }

        .meta-chip svg {
            width: 14px;
            height: 14px;
            color: var(--slate-400);
        }

        /* =========================================================
           5. SPLIT-SECTION SAAS SETTINGS ARCHITECTURE
           ========================================================= */
        .settings-section {
            display: grid;
            grid-template-columns: 270px 1fr;
            gap: 28px;
            padding-top: 28px;
            margin-top: 28px;
            border-top: 1px solid var(--slate-200);
            align-items: start;
        }

        .settings-section.first-section {
            padding-top: 0;
            margin-top: 0;
            border-top: none;
        }

        .section-aside {
            position: sticky;
            top: 72px;
        }

        .section-aside-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .section-icon-badge {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: var(--primary-light);
            border: 1px solid var(--primary-border);
            color: var(--primary);
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .section-icon-badge.danger {
            background: var(--danger-light);
            border-color: var(--danger-border);
            color: var(--danger);
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--navy-dark);
            margin: 0;
        }

        .section-description {
            font-size: 13px;
            color: var(--slate-500);
            line-height: 1.55;
            margin: 0;
        }

        .security-tips-box {
            margin-top: 16px;
            padding: 12px 14px;
            background: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-md);
            font-size: 12px;
            color: var(--slate-600);
            line-height: 1.5;
        }

        .security-tips-title {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            color: var(--slate-800);
            margin-bottom: 6px;
        }

        .security-tips-title svg {
            width: 14px;
            height: 14px;
            color: var(--primary);
        }

        .security-tips-list {
            margin: 0;
            padding-left: 16px;
            color: var(--slate-500);
        }

        .security-tips-list li {
            margin-bottom: 3px;
        }

        .security-tips-list li:last-child {
            margin-bottom: 0;
        }

        /* Settings Card */
        .settings-card {
            background: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .settings-card-body {
            padding: 24px 28px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--slate-700);
        }

        .readonly-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 600;
            color: var(--slate-500);
            background: var(--slate-100);
            padding: 2px 8px;
            border-radius: 99px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-leading-icon {
            position: absolute;
            left: 13px;
            color: var(--slate-400);
            display: grid;
            place-items: center;
            pointer-events: none;
            transition: color 0.15s ease;
        }

        .input-leading-icon svg {
            width: 16px;
            height: 16px;
        }

        .input-wrapper:focus-within .input-leading-icon {
            color: var(--primary);
        }

        .input-control {
            width: 100%;
            height: 42px;
            padding: 0 14px 0 38px;
            border: 1px solid var(--slate-200);
            border-radius: var(--radius-md);
            font-size: 13.5px;
            color: var(--slate-800);
            background-color: #ffffff;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
            box-sizing: border-box;
        }

        .input-control.has-toggle {
            padding-right: 40px;
        }

        .input-control:hover:not(:disabled):not([readonly]) {
            border-color: var(--slate-300);
        }

        .input-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .input-control.is-invalid {
            border-color: var(--danger);
            background-color: #fff5f5;
        }

        .input-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.12);
        }

        .input-control:disabled,
        .input-control[readonly] {
            background-color: var(--slate-50);
            color: var(--slate-600);
            cursor: not-allowed;
            border-color: var(--slate-200);
        }

        .password-toggle-btn {
            position: absolute;
            right: 10px;
            width: 28px;
            height: 28px;
            border-radius: 6px;
            background: transparent;
            border: none;
            padding: 0;
            color: var(--slate-400);
            cursor: pointer;
            display: grid;
            place-items: center;
            transition: background-color 0.15s ease, color 0.15s ease;
        }

        .password-toggle-btn:hover {
            background-color: var(--slate-100);
            color: var(--slate-700);
        }

        .field-hint {
            font-size: 12px;
            color: var(--slate-500);
            margin-top: 2px;
        }

        .error-message {
            font-size: 12px;
            color: var(--danger);
            font-weight: 500;
            margin-top: 2px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Card Footer Bar */
        .settings-card-footer {
            background-color: var(--slate-50);
            border-top: 1px solid var(--slate-100);
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .footer-note {
            font-size: 12px;
            color: var(--slate-500);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 38px;
            padding: 0 18px;
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s ease;
            border: 1px solid transparent;
            white-space: nowrap;
        }

        .btn svg {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
            box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(37, 99, 235, 0.25);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Session / Logout Card */
        .session-card-body {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .session-info-group {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .session-device-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: var(--slate-100);
            color: var(--slate-600);
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .session-info-text h3 {
            margin: 0 0 3px;
            font-size: 14px;
            font-weight: 700;
            color: var(--navy-dark);
        }

        .session-info-text p {
            margin: 0;
            font-size: 13px;
            color: var(--slate-500);
            line-height: 1.45;
        }

        .logout-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 38px;
            padding: 0 18px;
            background: #ffffff;
            color: var(--danger);
            border: 1px solid var(--danger-border);
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s ease;
            flex-shrink: 0;
        }

        .logout-button:hover {
            background: var(--danger-light);
            border-color: #fca5a5;
            color: var(--danger-hover);
        }

        /* =========================================================
           6. MODAL KONFIRMASI LOGOUT (SMOOTH & ANIMATED ICON)
           ========================================================= */
        .logout-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.28s cubic-bezier(0.16, 1, 0.3, 1),
                        visibility 0.28s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .logout-modal.show {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .logout-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.52);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .logout-modal.show .logout-modal-backdrop {
            opacity: 1;
        }

        .logout-modal-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
            padding: 28px;
            background: #ffffff;
            border: 1px solid var(--slate-200);
            border-radius: 16px;
            box-shadow: 0 20px 45px -10px rgba(15, 23, 42, 0.18), 0 8px 16px -6px rgba(15, 23, 42, 0.08);
            text-align: center;
            opacity: 0;
            transform: scale(0.9) translateY(16px);
            transition: transform 0.36s cubic-bezier(0.16, 1, 0.3, 1),
                        opacity 0.28s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity;
        }

        .logout-modal.show .logout-modal-card {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        .logout-modal-icon {
            display: grid;
            place-items: center;
            width: 56px;
            height: 56px;
            margin: 0 auto 16px;
            color: var(--danger);
            background: var(--danger-light);
            border: 1px solid var(--danger-border);
            border-radius: 50%;
            opacity: 0;
            transform: scale(0.35) rotate(-14deg);
        }

        .logout-modal.show .logout-modal-icon {
            animation: logoutIconPop 0.48s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.08s forwards;
        }

        .logout-modal.show .logout-modal-icon .logout-arrow {
            animation: logoutArrowSlide 0.4s cubic-bezier(0.16, 1, 0.3, 1) 0.22s both;
        }

        @keyframes logoutIconPop {
            0% {
                opacity: 0;
                transform: scale(0.35) rotate(-14deg);
            }
            65% {
                opacity: 1;
                transform: scale(1.08) rotate(3deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        @keyframes logoutArrowSlide {
            0% {
                opacity: 0;
                transform: translateX(-5px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .logout-modal-card h2 {
            margin: 0 0 8px;
            color: var(--navy-dark);
            font-size: 18px;
            font-weight: 700;
        }

        .logout-modal-card p {
            margin: 0;
            color: var(--slate-500);
            font-size: 13.5px;
            line-height: 1.55;
        }

        .logout-modal-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 24px;
        }

        .logout-modal-actions button {
            flex: 1;
            min-height: 40px;
            padding: 0 16px;
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.18s ease;
        }

        .logout-cancel {
            color: var(--slate-700);
            background: #ffffff;
            border: 1px solid var(--slate-300);
        }

        .logout-cancel:hover {
            background: var(--slate-50);
            border-color: var(--slate-400);
        }

        .logout-confirm {
            color: #ffffff;
            background: var(--danger);
            border: 1px solid var(--danger);
            box-shadow: 0 1px 2px rgba(220, 38, 38, 0.2);
        }

        .logout-confirm:hover {
            background: var(--danger-hover);
            border-color: var(--danger-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(220, 38, 38, 0.25);
        }

        .logout-confirm:active {
            transform: translateY(0);
        }

        /* =========================================================
           7. RESPONSIVE BREAKPOINTS
           ========================================================= */
        @media (max-width: 1024px) {
            .settings-section {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .section-aside {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .layout-wrapper {
                flex-direction: column !important;
            }
            .sidebar-container {
                width: 100%;
                min-width: 0;
                max-width: 100%;
                min-height: auto;
            }
            .sidebar-nav {
                padding: 8px !important;
            }
            .content-body {
                padding: 20px 16px 40px;
            }
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .profile-hero-body {
                padding: 0 20px 20px;
                flex-direction: column;
                align-items: flex-start;
            }
            .profile-identity-left {
                flex-direction: column;
                align-items: flex-start;
                gap: 0;
            }
            .settings-card-body {
                padding: 20px;
            }
            .settings-card-footer {
                padding: 14px 20px;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
            .form-group.full-width {
                grid-column: span 1;
            }
            .session-card-body {
                flex-direction: column;
                align-items: flex-start;
            }
            .logout-button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="layout-wrapper">
    <!-- Sidebar Container (Tanpa Logo Alivare) -->
    <aside class="sidebar-container">
        <div class="sidebar-brand"></div>

        <nav class="sidebar-nav">
            @include('components.sidebar-menu')
        </nav>
    </aside>

    <div class="main-content">
        <!-- Topbar Header (Tidak Diubah) -->
        <header class="topbar">
            @include('components.topbar-actions')
        </header>

        <!-- Body Profil -->
        <main class="content-body">
            <!-- Header Judul -->
            <div class="page-header">
                <div>
                    <nav class="breadcrumb" aria-label="Breadcrumb">
                        <a href="{{ route('dashboard.pemilik') }}">Dashboard</a>
                        <span class="breadcrumb-separator">/</span>
                        <span class="breadcrumb-current">Profil Saya</span>
                    </nav>
                    <h1 class="page-title">Profil Saya</h1>
                    <p class="page-subtitle">Kelola informasi pribadi, identitas akun, dan pengaturan keamanan Anda.</p>
                </div>

                <div class="header-status-pill" aria-label="Status Akun">
                    <span class="status-dot-live"></span>
                    <span>Sesi Aktif</span>
                </div>
            </div>

            <!-- Feedback Notifikasi -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="22 4 12 14.01 9 11.01" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <div>Terdapat beberapa kesalahan pada inputan Anda. Silakan periksa kembali form di bawah.</div>
                </div>
            @endif

            <!-- Profile Identity Hero Card -->
            <section class="profile-hero-card" aria-label="Ringkasan Identitas Akun">
                <div class="profile-hero-cover"></div>
                <div class="profile-hero-body">
                    <div class="profile-identity-left">
                        <div class="avatar-circle" aria-hidden="true">
                            {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                        </div>
                        <div class="profile-identity-text">
                            <div class="profile-name-row">
                                <h2 class="profile-name">{{ auth()->user()->name ?? 'Pengelola ALIVARE' }}</h2>
                                <span class="role-badge">
                                    <span class="role-badge-dot"></span>
                                    <span>{{ auth()->user()->role === 'pemilik' ? 'Pemilik Properti' : (auth()->user()->role === 'admin' ? 'Administrator' : 'Penyewa Properti') }}</span>
                                </span>
                            </div>
                            <p class="profile-email-row">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                </svg>
                                <span>{{ auth()->user()->email }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="profile-meta-chips">
                        <div class="meta-chip">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                            <span>ALIVARE Workspace</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 1: Informasi Pribadi -->
            <section class="settings-section first-section">
                <div class="section-aside">
                    <div class="section-aside-header">
                        <div class="section-icon-badge">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </div>
                        <h2 class="section-title">Informasi Pribadi</h2>
                    </div>
                    <p class="section-description">Perbarui nama lengkap dan alamat email utama yang digunakan pada akun ALIVARE Anda.</p>
                </div>

                <div class="settings-card">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="settings-card-body">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nama Lengkap</label>
                                    <div class="input-wrapper">
                                        <span class="input-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                                <circle cx="12" cy="7" r="4"/>
                                            </svg>
                                        </span>
                                        <input 
                                            type="text" 
                                            id="name" 
                                            name="name" 
                                            class="input-control @error('name') is-invalid @enderror" 
                                            value="{{ old('name', auth()->user()->name) }}" 
                                            required
                                            autocomplete="name"
                                        >
                                    </div>
                                    @error('name')
                                        <span class="error-message" role="alert">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">Alamat Email</label>
                                    <div class="input-wrapper">
                                        <span class="input-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="2" y="4" width="20" height="16" rx="2"/>
                                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                            </svg>
                                        </span>
                                        <input 
                                            type="email" 
                                            id="email" 
                                            name="email" 
                                            class="input-control @error('email') is-invalid @enderror" 
                                            value="{{ old('email', auth()->user()->email) }}" 
                                            required
                                            autocomplete="email"
                                        >
                                    </div>
                                    @error('email')
                                        <span class="error-message" role="alert">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group full-width">
                                    <div class="form-label-row">
                                        <label class="form-label" for="role_display">Role Akun</label>
                                        <span class="readonly-tag">Dikelola Sistem</span>
                                    </div>
                                    <div class="input-wrapper">
                                        <span class="input-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                            </svg>
                                        </span>
                                        <input 
                                            type="text" 
                                            id="role_display" 
                                            class="input-control" 
                                            value="{{ auth()->user()->role === 'pemilik' ? 'Pemilik Properti (ALIVARE Owner)' : (auth()->user()->role === 'admin' ? 'Administrator System' : 'Penyewa Properti') }}" 
                                            disabled 
                                            readonly
                                        >
                                    </div>
                                    <span class="field-hint">Role akun ditentukan oleh sistem dan tidak dapat diubah secara mandiri.</span>
                                </div>
                            </div>
                        </div>

                        <div class="settings-card-footer">
                            <span class="footer-note">Perubahan nama dan email akan langsung diterapkan ke akun Anda.</span>
                            <button type="submit" class="btn btn-primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                    <polyline points="17 21 17 13 7 13 7 21"/>
                                    <polyline points="7 3 7 8 15 8"/>
                                </svg>
                                <span>Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- SECTION 2: Keamanan Akun -->
            <section class="settings-section">
                <div class="section-aside">
                    <div class="section-aside-header">
                        <div class="section-icon-badge">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        </div>
                        <h2 class="section-title">Keamanan Akun</h2>
                    </div>
                    <p class="section-description">Perbarui kata sandi Anda secara berkala untuk menjaga keamanan akses dashboard.</p>

                    <div class="security-tips-box">
                        <div class="security-tips-title">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="16" x2="12" y2="12"/>
                                <line x1="12" y1="8" x2="12.01" y2="8"/>
                            </svg>
                            <span>Kriteria Kata Sandi</span>
                        </div>
                        <ul class="security-tips-list">
                            <li>Minimal 8 karakter</li>
                            <li>Kombinasi huruf & angka</li>
                            <li>Gunakan simbol untuk keamanan ekstra</li>
                        </ul>
                    </div>
                </div>

                <div class="settings-card">
                    <form method="POST" action="{{ route('profile.password') }}">
                        @csrf
                        @method('PUT')

                        <div class="settings-card-body">
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="form-label" for="current_password">Password Saat Ini</label>
                                    <div class="input-wrapper">
                                        <span class="input-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                            </svg>
                                        </span>
                                        <input 
                                            type="password" 
                                            id="current_password" 
                                            name="current_password" 
                                            class="input-control has-toggle @error('current_password') is-invalid @enderror" 
                                            required
                                            autocomplete="current-password"
                                        >
                                        <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('current_password', this)" aria-label="Tampilkan password">
                                            <svg class="eye-icon" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('current_password')
                                        <span class="error-message" role="alert">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password">Password Baru</label>
                                    <div class="input-wrapper">
                                        <span class="input-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/>
                                            </svg>
                                        </span>
                                        <input 
                                            type="password" 
                                            id="password" 
                                            name="password" 
                                            class="input-control has-toggle @error('password') is-invalid @enderror" 
                                            required
                                            autocomplete="new-password"
                                        >
                                        <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('password', this)" aria-label="Tampilkan password">
                                            <svg class="eye-icon" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <span class="field-hint">Minimal 8 karakter. Kombinasikan huruf, angka, dan simbol.</span>
                                    @error('password')
                                        <span class="error-message" role="alert">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password_confirmation">Konfirmasi Password Baru</label>
                                    <div class="input-wrapper">
                                        <span class="input-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                        </span>
                                        <input 
                                            type="password" 
                                            id="password_confirmation" 
                                            name="password_confirmation" 
                                            class="input-control has-toggle" 
                                            required
                                            autocomplete="new-password"
                                        >
                                        <button type="button" class="password-toggle-btn" onclick="togglePasswordVisibility('password_confirmation', this)" aria-label="Tampilkan password">
                                            <svg class="eye-icon" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="settings-card-footer">
                            <span class="footer-note">Pastikan konfirmasi password cocok dengan password baru.</span>
                            <button type="submit" class="btn btn-primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                                <span>Perbarui Password</span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- SECTION 3: Sesi & Keluar dari Akun -->
            <section class="settings-section">
                <div class="section-aside">
                    <div class="section-aside-header">
                        <div class="section-icon-badge danger">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <polyline points="16 17 21 12 16 7"/>
                                <line x1="21" y1="12" x2="9" y2="12"/>
                            </svg>
                        </div>
                        <h2 class="section-title">Sesi Akun</h2>
                    </div>
                    <p class="section-description">Kelola sesi login aktif Anda pada perangkat yang sedang digunakan.</p>
                </div>

                <div class="settings-card">
                    <div class="session-card-body">
                        <div class="session-info-group">
                            <div class="session-device-icon" aria-hidden="true">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                                    <line x1="8" y1="21" x2="16" y2="21"/>
                                    <line x1="12" y1="17" x2="12" y2="21"/>
                                </svg>
                            </div>
                            <div class="session-info-text">
                                <h3>Keluar dari Akun</h3>
                                <p>Akhiri sesi login Anda di ALIVARE. Anda perlu masuk kembali untuk mengakses dashboard.</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                            @csrf
                            <button
                                type="button"
                                class="logout-button"
                                onclick="openLogoutModal()"
                            >
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="logout-modal" aria-hidden="true">
    <div class="logout-modal-backdrop" onclick="closeLogoutModal()"></div>

    <div class="logout-modal-card"
         role="dialog"
         aria-modal="true"
         aria-labelledby="logoutModalTitle">

        <div class="logout-modal-icon">
            <svg width="24" height="24" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <g class="logout-arrow">
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </g>
            </svg>
        </div>

        <h2 id="logoutModalTitle">Keluar dari Akun?</h2>
        <p>Apakah Anda yakin ingin keluar dari akun ALIVARE?</p>

        <div class="logout-modal-actions">
            <button type="button" class="logout-cancel"
                    onclick="closeLogoutModal()">
                Batal
            </button>

            <button type="button" class="logout-confirm"
                    onclick="document.getElementById('logoutForm').submit()">
                Ya, Keluar
            </button>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId, button) {
        const input = document.getElementById(inputId);
        if (!input) return;

        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';

        const svg = button.querySelector('svg');
        if (isPassword) {
            svg.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
            button.setAttribute('aria-label', 'Sembunyikan password');
        } else {
            svg.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
            button.setAttribute('aria-label', 'Tampilkan password');
        }
    }

    function openLogoutModal() {
        const modal = document.getElementById('logoutModal');
        if (!modal) return;
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
    }

    function closeLogoutModal() {
        const modal = document.getElementById('logoutModal');
        if (!modal) return;
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeLogoutModal();
        }
    });
</script>
</body>
</html>