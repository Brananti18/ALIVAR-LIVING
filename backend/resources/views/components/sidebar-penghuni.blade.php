@php
    $items = [
        ['penghuni.kamar', 'Kamar & Kontrak', '<path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><circle cx="6" cy="11" r="2"/>'],
        ['penghuni.pembayaran', 'Pembayaran', '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h8"/>'],
        ['penghuni.pengaduan', 'Pengaduan', '<path d="M14.7 6.3a4 4 0 0 0-5 5L3 18l3 3 6.7-6.7a4 4 0 0 0 5-5l-2.5 2.5-2-2z"/>'],
        ['penghuni.pengumuman', 'Pengumuman', '<path d="M3 11v2a1 1 0 0 0 1 1h3l6 4V6L7 10H4a1 1 0 0 0-1 1zM17 9a4 4 0 0 1 0 6"/>'],
    ];
@endphp
<div class="menu-title">MENU UTAMA</div>
<nav class="side-nav">
    @foreach ($items as [$name, $label, $icon])
        <a href="{{ route($name) }}" class="side-link {{ request()->routeIs($name) ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $icon !!}</svg>
            {{ $label }}
        </a>
    @endforeach
</nav>
