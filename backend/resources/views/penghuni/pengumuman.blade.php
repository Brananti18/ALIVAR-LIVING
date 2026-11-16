@extends('penghuni.layout')
@section('title', 'Pengumuman')
@section('content')
<section class="page-heading">
    <div>
        <h1>Informasi &amp; Pengumuman</h1>
        <p class="subtitle">Pemberitahuan dari pengelola, seperti pemadaman listrik dan acara.</p>
    </div>
</section>
<section class="panel">
    @forelse ($announcements as $a)
        <article class="list-item">
            <h3>{{ $a->title }}</h3>
            <p>{{ $a->created_at->translatedFormat('d F Y') }}@if ($a->creator?->name) · {{ $a->creator->name }}@endif</p>
            <p style="margin-top:8px;color:var(--navy);font-size:14px;white-space:pre-line">{{ $a->content }}</p>
        </article>
    @empty
        <div class="notice"><strong>Belum ada pengumuman</strong>Pengumuman dari pengelola akan tampil di sini.</div>
    @endforelse
</section>
<div style="margin-top:16px">{{ $announcements->links() }}</div>
@endsection
