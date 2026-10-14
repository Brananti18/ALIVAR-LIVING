<div class="top-actions">
    <!-- Tombol Notifikasi -->
    <button class="icon-button" type="button" aria-label="Notifikasi">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
        </svg>
    </button>

    <!-- Menu Profil & Dropdown -->
    <div class="account-menu">
        <button class="avatar" id="accountMenuButton" type="button" aria-expanded="false" aria-controls="accountDropdown">
            {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
        </button>
        
        <div class="account-dropdown" id="accountDropdown" hidden>
            <div class="account-info">
                <strong>{{ auth()->user()->name ?? 'Pengelola' }}</strong>
                <small>{{ auth()->user()->email ?? '' }}</small>
            </div>
            <div class="account-divider"></div>
           
<a href="{{ route('profile.edit') }}" class="account-item" style="text-decoration: none;">
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
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                    </span>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    header.topbar, .topbar {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        width: 100% !important;
        box-sizing: border-box !important;
    }

    .top-actions { 
        margin-left: auto !important; 
        display: flex !important; 
        align-items: center !important; 
        gap: 16px !important; 
    }

    .icon-button { 
        width: 38px; height: 38px; display: grid; place-items: center; 
        border: 0; border-radius: 50%; background: transparent; color: var(--slate-500, #64748b); transition: 0.2s; cursor: pointer;
    }
    .icon-button:hover { background: var(--slate-100, #f1f5f9); color: var(--navy, #0f172a); }
    .icon-button svg { width: 20px; height: 20px; }
    
    .avatar { 
        width: 38px; height: 38px; 
        border: 1.5px solid #bfdbfe !important; 
        border-radius: 50% !important; 
        background: #dbeafe !important; 
        color: #1d4ed8 !important; 
        display: grid; place-items: center; 
        font-weight: 700; font-size: 15px; cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 1px 3px rgba(37, 99, 235, 0.12);
    }
    .avatar:hover { background: #bfdbfe !important; border-color: #93c5fd !important; color: #1e40af !important; }

    .account-menu { position: relative; }
    .account-dropdown { 
        position: absolute; top: calc(100% + 8px); right: 0; width: 240px; padding: 8px; 
        background: var(--card-bg, #ffffff); border: 1px solid var(--slate-200, #e2e8f0); 
        border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.08); z-index: 100; 
    }
    .account-dropdown[hidden] { display: none; }
    .account-info { padding: 8px 12px; display: flex; flex-direction: column; }
    .account-info strong { font-size: 14px; color: var(--navy, #0f172a); }
    .account-info small { color: var(--slate-500, #64748b); font-size: 12px; }
    .account-divider { height: 1px; background: var(--slate-200, #e2e8f0); margin: 6px 0; }
    .account-item { 
        width: 100%; display: flex; align-items: center; gap: 10px; padding: 10px 12px; 
        border: 0; border-radius: var(--radius-sm, 6px); background: transparent; 
        color: var(--slate-800, #1e293b); font-size: 13px; font-weight: 500; transition: 0.2s; cursor: pointer;
    }
    .account-item:hover { background: var(--slate-100, #f1f5f9); color: var(--primary, #2563eb); }
    .account-icon { color: var(--slate-500, #64748b); display: flex; }
    .account-item:hover .account-icon { color: var(--primary, #2563eb); }
    .account-icon svg { width: 16px; height: 16px; }
    .account-logout { color: var(--danger, #ef4444); }
    .account-logout:hover { background: var(--danger-bg, #fef2f2); color: var(--danger, #ef4444); }
    .account-logout .account-icon { color: var(--danger, #ef4444); }
    .account-logout:hover .account-icon { color: var(--danger, #ef4444); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accBtn = document.getElementById('accountMenuButton');
        const accDrop = document.getElementById('accountDropdown');
        if (accBtn && accDrop) {
            accBtn.addEventListener('click', e => { e.stopPropagation(); accDrop.hidden = !accDrop.hidden; accBtn.setAttribute('aria-expanded', !accDrop.hidden); });
            accDrop.addEventListener('click', e => e.stopPropagation());
            document.addEventListener('click', () => { accDrop.hidden = true; accBtn.setAttribute('aria-expanded', 'false'); });
        }
    });
</script>