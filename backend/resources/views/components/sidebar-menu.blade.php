<div class="nav-label">MENU UTAMA</div>

<a class="nav-link {{ request()->routeIs('dashboard.pemilik') ? 'active' : '' }}"
   href="{{ route('dashboard.pemilik') }}">
    <span class="nav-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 21V7l9-4 9 4v14M7 21v-4h4v4M7 9h2m6 0h2M7 13h2m6 0h2"/>
        </svg>
    </span>
    <span>Properti</span>
</a>

<a class="nav-link {{ request()->routeIs('dashboard.kamar') ? 'active' : '' }}"
   href="{{ route('dashboard.kamar') }}">
    <span class="nav-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="16" rx="2"/>
            <path d="M3 13h18M7 9h3a2 2 0 0 1 2 2v2H5v-2a2 2 0 0 1 2-2z"/>
        </svg>
    </span>
    <span>Kamar</span>
</a>

<a class="nav-link {{ request()->routeIs('dashboard.penyewa') ? 'active' : '' }}"
   href="{{ route('dashboard.penyewa') }}">
    <span class="nav-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="8" r="3"/>
            <path d="M3 20v-2a6 6 0 0 1 12 0v2H3M16 5a3 3 0 0 1 0 6m2 3a5 5 0 0 1 3 4v2"/>
        </svg>
    </span>
    <span>Penyewa</span>
</a>


<a class="nav-link {{ request()->routeIs('dashboard.tagihan') ? 'active' : '' }}"
   href="{{ route('dashboard.tagihan') }}">

    <span class="nav-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="5" y="3" width="14" height="18" rx="2"/>
            <path d="M9 8h6M9 12h6M9 16h4"/>
        </svg>
    </span>
    <span>Tagihan</span>
</a>

<div class="nav-label" style="margin-top:25px">AKUN</div>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="nav-link" type="submit"
            style="border:0;background:white;width:100%;text-align:left;cursor:pointer">
        ↪ Keluar
    </button>
</form>
