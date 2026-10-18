<style>
    .nav-label {
        padding: 8px 12px;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
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
        border-radius: 8px;
        text-decoration: none;
        color: #64748b;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .nav-link:hover {
        background: #f8fafc;
        color: #0f172a;
    }

    .nav-link.active {
        background: #eff6ff;
        color: #2563eb;
        font-weight: 600;
    }

    .nav-link.active .nav-icon {
        color: #2563eb;
    }

    .nav-icon {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        width: 20px !important;
        height: 20px !important;
        min-width: 20px;
        flex: 0 0 20px;
        color: #64748b;
    }

    .nav-icon svg {
        display: block;
        width: 20px !important;
        height: 20px !important;
        min-width: 20px;
        max-width: 20px;
        min-height: 20px;
        max-height: 20px;
        flex-shrink: 0;
    }
</style>

@if (!request()->routeIs('profile.edit'))
    <div class="nav-label">Menu Utama</div>

    <a href="{{ route('dashboard.pemilik') }}" class="nav-link {{ request()->routeIs('dashboard.pemilik') ? 'active' : '' }}">
        <span class="nav-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 21V7l9-4 9 4v14"/><path d="M7 21v-4h4v4M7 9h2m6 0h2m-10 4h2m6 0h2"/>
            </svg>
        </span>
        <span>Properti</span>
    </a>

    <a href="{{ route('dashboard.kamar') }}" class="nav-link {{ request()->routeIs('dashboard.kamar') ? 'active' : '' }}">
        <span class="nav-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2 4v16"/>
                <path d="M2 8h18a2 2 0 0 1 2 2v10"/>
                <path d="M2 17h20"/>
                <circle cx="6" cy="11" r="2"/>
            </svg>
        </span>
        <span>Kamar</span>
    </a>

    <a href="{{ route('dashboard.penyewa') }}" class="nav-link {{ request()->is('*penyewa*') ? 'active' : '' }}">
        <span class="nav-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </span>
        <span>Penyewa</span>
    </a>

    <a href="{{ route('dashboard.tagihan') }}" class="nav-link {{ request()->routeIs('dashboard.tagihan') ? 'active' : '' }}">
        <span class="nav-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="16" y1="13" x2="8" y2="13"/>
                <line x1="16" y1="17" x2="8" y2="17"/>
                <polyline points="10 9 9 9 8 9"/>
            </svg>
        </span>
        <span>Tagihan</span>
    </a>

    <a href="{{ route('dashboard.laporan-pendapatan') }}" class="nav-link {{ request()->routeIs('dashboard.laporan-pendapatan') ? 'active' : '' }}">
        <span class="nav-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 3v18h18"/>
                <path d="M8 16v-5"/>
                <path d="M13 16V8"/>
                <path d="M18 16V5"/>
            </svg>
        </span>
        <span>Laporan Pendapatan</span>
    </a>
@endif