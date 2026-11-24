
@extends('penghuni.layout')

@section('title', 'Pengumuman')

@section('content')

<style>
    .announcement-page {
        max-width: 1280px;
        margin: 0 auto;
    }

   .announcement-page .page-heading {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 4px;
    margin-bottom: 28px;
}

.announcement-page .page-heading h1 {
    margin: 0;
}

.announcement-page .page-heading .subtitle {
    display: block;
    width: 100%;
    margin: 0;
}

    .announcement-page h1 {
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.5px;
        color: var(--navy, #0f172a);
        margin-bottom: 4px;
    }

    .announcement-page .subtitle {
        color: var(--slate-500, #64748b);
        font-size: 14px;
        margin: 0;
    }

    .announcement-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
        margin-bottom: 24px;
    }

    .announcement-card {
        background: #fff;
        border: 1px solid var(--slate-200, #e2e8f0);
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
        transition: transform .2s, box-shadow .2s;
    }

    .announcement-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,.05);
    }

    .announcement-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 12px;
    }

    .announcement-title {
        font-size: 17px;
        font-weight: 700;
        color: var(--navy, #0f172a);
        line-height: 1.4;
        margin: 0;
    }

    .badge-active {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 11px;
        font-weight: 700;
        background: #ecfdf5;
        color: #10b981;
        flex-shrink: 0;
    }

    .badge-active::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #10b981;
    }

    .announcement-body {
        font-size: 14px;
        color: var(--slate-700, #334155);
        line-height: 1.6;
        white-space: pre-line;
        word-break: break-word;
        margin-bottom: 18px;
    }

    .announcement-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding-top: 14px;
        border-top: 1px solid #f1f5f9;
        font-size: 12px;
        color: var(--slate-500, #64748b);
    }

    .author-info {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: var(--navy, #0f172a);
    }

    .author-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #eff6ff;
        color: #2563eb;
        display: grid;
        place-items: center;
        font-size: 11px;
        font-weight: 700;
    }

    .time-info {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .time-info svg {
        width: 14px;
        height: 14px;
    }

    .empty-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 56px 24px;
        text-align: center;
    }

    .pagination {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        font-size: 13px;
    }

    .pagination nav p {
        display: none;
    }

    .pagination nav div {
        display: flex;
        gap: 4px;
    }

    .pagination nav a,
    .pagination nav span span {
        padding: 6px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        color: #0f172a;
        background: #fff;
        font-size: 12px;
    }

    .pagination nav span[aria-current="page"] span {
        background: #2563eb;
        color: #fff;
        border-color: #2563eb;
    }

    @media (max-width: 768px) {
        .announcement-header {
            flex-direction: column;
            gap: 8px;
        }
    }
</style>

<div class="announcement-page">

    <div class="page-heading">
        <h1>Pengumuman</h1>
        <p class="subtitle">
            Informasi dan pemberitahuan resmi dari tim administrasi ALIVARE.
        </p>
    </div>

    <div class="announcement-list">
        @forelse ($announcements as $announcement)

            <article class="announcement-card">

                <div class="announcement-header">
                    <h2 class="announcement-title">
                        {{ $announcement->title }}
                    </h2>

                    @if ($announcement->is_active)
                        <span class="badge-active">
                            Pengumuman Aktif
                        </span>
                    @endif
                </div>

                <div class="announcement-body">
                    {{ $announcement->content }}
                </div>

                <div class="announcement-meta">

                    <div class="author-info">
                        <div class="author-avatar">
                            {{ strtoupper(substr($announcement->creator?->name ?? 'A', 0, 1)) }}
                        </div>

                        <span>
                            {{ $announcement->creator?->name ?? 'Administrator' }}
                        </span>
                    </div>

                    <div class="time-info">
                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>

                        <span>
                            {{ $announcement->created_at
                                ? $announcement->created_at->translatedFormat('d M Y, H:i')
                                : '-' }} WIB
                        </span>
                    </div>

                </div>
            </article>

        @empty

            <div class="empty-card">
                <strong>Belum ada pengumuman saat ini.</strong>
                <p>
                    Pengumuman terbaru dari tim administrasi ALIVARE
                    akan muncul di sini.
                </p>
            </div>

        @endforelse
    </div>

    @if ($announcements->hasPages())
        <div class="pagination">
            {{ $announcements->links() }}
        </div>
    @endif

    <footer style="
        padding-top:16px;
        color:#64748b;
        font-size:12px;
        text-align:center;
        border-top:1px solid #e2e8f0;
        margin-top:32px;
    ">
        ALIVARE &copy; {{ date('Y') }} — Panel Penyewa
    </footer>

</div>

@endsection
