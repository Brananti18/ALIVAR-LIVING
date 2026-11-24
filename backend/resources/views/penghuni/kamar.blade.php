@extends('penghuni.layout')
@section('title', 'Kamar & Kontrak')
@section('content')
@php
    // Kamar hanya dianggap "ada" bila pemilik sudah membuat kamar di database
    // dan kamar itu sudah ditetapkan ke penghuni ini (tenants.room_id).
    $tenant   = $tenant ?? null;
    $room     = $tenant?->room;
    $hasRoom  = $room !== null;
    $property = $room?->property;

    $sisa = '-';
    if ($hasRoom && $tenant->move_out_date) {
        $sisa = $tenant->move_out_date->isFuture()
            ? (int) now()->diffInDays($tenant->move_out_date) . ' hari'
            : 'Berakhir';
    }
@endphp

<section class="page-heading">
    <div>
        <h1>Kamar &amp; Kontrak</h1>
        <p class="subtitle">Detail kamar, jatuh tempo sewa, dan kontrak Anda.</p>
    </div>
</section>

@unless ($hasRoom)
    {{-- ====== BELUM ADA KAMAR dari pemilik ====== --}}
    <section class="panel">
        <div style="padding:64px 24px;text-align:center;display:flex;flex-direction:column;align-items:center;gap:6px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width:44px;height:44px;margin-bottom:10px;">
                <path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><circle cx="6" cy="11" r="2"/>
            </svg>
            <strong style="font-size:16px;color:#0f172a;">Anda belum memiliki kamar</strong>
            <p style="margin:0;max-width:420px;font-size:13px;color:#64748b;line-height:1.6;">
                Kamar akan muncul di sini setelah pemilik menambahkan kamar dan menetapkannya untuk Anda.
                Detail kamar, jatuh tempo sewa, dan kontrak akan terisi otomatis.
            </p>
        </div>
    </section>
@else
    <section class="stats">
        <div class="stat-card"><div class="stat-info"><span class="stat-label">Nomor Kamar</span><span class="stat-number">{{ $room->room_number }}</span></div>
            <div class="stat-icon blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><circle cx="6" cy="11" r="2"/></svg></div></div>
        <div class="stat-card"><div class="stat-info"><span class="stat-label">Jatuh Tempo Sewa</span><span class="stat-number">{{ $nextBill?->due_date?->format('d M Y') ?? 'Lunas' }}</span></div>
            <div class="stat-icon orange"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></div></div>
        <div class="stat-card"><div class="stat-info"><span class="stat-label">Sisa Kontrak</span><span class="stat-number">{{ $sisa }}</span></div>
            <div class="stat-icon purple"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div></div>
        <div class="stat-card"><div class="stat-info"><span class="stat-label">Tagihan Aktif</span><span class="stat-number">{{ $unpaidCount ?? 0 }}</span></div>
            <div class="stat-icon green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg></div></div>
    </section>

    <section class="grid-2">
       <div class="panel">
    <div class="panel-head">
        <h2>Detail Kamar</h2>
    </div>

    {{-- Foto kamar --}}
    <div style="padding: 16px 20px;">
        @if ($room->photo)
            <img
                src="{{ asset('storage/' . $room->photo) }}"
                alt="Foto kamar {{ $room->room_number }}"
                style="
                    width: 100%;
                    max-height: 280px;
                    object-fit: cover;
                    border-radius: 12px;
                    display: block;
                "
            >
        @else
            <div style="
                width: 100%;
                min-height: 150px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #f1f5f9;
                color: #64748b;
                border-radius: 12px;
                font-size: 13px;
            ">
                Foto kamar belum tersedia
            </div>
        @endif
    </div>

    <dl class="detail-list">
                <div class="detail-row"><dt>Properti</dt><dd>{{ $property?->name ?? '-' }}</dd></div>
                <div class="detail-row"><dt>Alamat</dt><dd>{{ $property?->address ?? '-' }}</dd></div>
                <div class="detail-row"><dt>Nomor kamar</dt><dd>{{ $room->room_number }}</dd></div>
                <div class="detail-row"><dt>Harga sewa</dt><dd>Rp {{ number_format($room->price, 0, ',', '.') }} / bulan</dd></div>
                <div class="detail-row"><dt>Status kamar</dt><dd><span class="status {{ $room->status }}">{{ ucfirst($room->status) }}</span></dd></div>
            </dl>
        </div>
        <div class="panel">
            <div class="panel-head"><h2>Detail Kontrak</h2><span class="status {{ strtolower($tenant->status) }}">{{ ucfirst($tenant->status) }}</span></div>
            <dl class="detail-list">
                <div class="detail-row"><dt>Nama penyewa</dt><dd>{{ $tenant->name }}</dd></div>
                <div class="detail-row"><dt>Tanggal masuk</dt><dd>{{ $tenant->move_in_date?->format('d M Y') ?? '-' }}</dd></div>
                <div class="detail-row"><dt>Tanggal keluar / kontrak berakhir</dt><dd>{{ $tenant->move_out_date?->format('d M Y') ?? '-' }}</dd></div>
                <div class="detail-row"><dt>Telepon</dt><dd>{{ $tenant->phone ?: '-' }}</dd></div>
                <div class="detail-row"><dt>Catatan pengelola</dt><dd>{{ $tenant->notes ?: '-' }}</dd></div>
            </dl>
        </div>
    </section>
@endunless
@endsection
