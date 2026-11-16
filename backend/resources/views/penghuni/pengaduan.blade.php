@extends('penghuni.layout')
@section('title', 'Pengaduan')
@section('content')
<section class="page-heading">
    <div>
        <h1>Pengaduan</h1>
        <p class="subtitle">Kirim permintaan perbaikan atau pemeliharaan ke pengelola.</p>
    </div>
</section>
<section style="display:grid;grid-template-columns:minmax(0,2fr) minmax(0,3fr);gap:20px;align-items:start">
    <div class="panel">
        <div class="panel-head"><h2>Buat Pengaduan Baru</h2></div>
        <form class="form-stack" method="POST" action="{{ route('penghuni.pengaduan.store') }}">
            @csrf
            <div><label for="title">Judul *</label><input id="title" name="title" value="{{ old('title') }}" maxlength="255" required placeholder="Contoh: Lampu kamar mati"></div>
            <div><label for="category">Kategori *</label>
                <select id="category" name="category" required>
                    @foreach (['listrik' => 'Listrik', 'air' => 'Air & sanitasi', 'ac' => 'AC', 'furnitur' => 'Furnitur', 'lainnya' => 'Lainnya'] as $v => $l)
                        <option value="{{ $v }}" @selected(old('category') === $v)>{{ $l }}</option>
                    @endforeach
                </select></div>
            <div><label for="description">Deskripsi *</label><textarea id="description" name="description" rows="4" maxlength="2000" required placeholder="Jelaskan masalahnya...">{{ old('description') }}</textarea></div>
            <button class="btn btn-primary" type="submit">Kirim Pengaduan</button>
        </form>
    </div>
    <div class="panel">
        <div class="panel-head"><h2>Pengaduan Saya</h2><span class="subtitle">{{ $complaints->count() }} pengaduan</span></div>
        @forelse ($complaints as $c)
            <div class="list-item">
                <div style="display:flex;justify-content:space-between;gap:12px;align-items:center">
                    <h3>{{ $c->title }}</h3><span class="status {{ $c->status }}">{{ ucfirst($c->status) }}</span>
                </div>
                <p>{{ ucfirst($c->category) }} · diajukan {{ $c->created_at->translatedFormat('d M Y') }}</p>
                @if ($c->admin_note)<p style="margin-top:6px;color:var(--navy)">Catatan pengelola: {{ $c->admin_note }}</p>@endif
            </div>
        @empty
            <div class="notice"><strong>Belum ada pengaduan</strong>Pengaduan yang Anda kirim akan muncul di sini.</div>
        @endforelse
    </div>
</section>
@endsection
