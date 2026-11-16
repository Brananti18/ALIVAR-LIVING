@extends('penghuni.layout')
@section('title', 'Pembayaran')
@section('content')
<section class="page-heading">
    <div>
        <h1>Pembayaran</h1>
        <p class="subtitle">Riwayat tagihan dan pembayaran sewa Anda.</p>
    </div>
    <div class="stat-card" style="gap:24px">
        <div class="stat-info"><span class="stat-label">Total belum dibayar</span><span class="stat-number">Rp {{ number_format($totalUnpaid, 0, ',', '.') }}</span></div>
    </div>
</section>

<section class="panel">
    <div class="panel-head"><h2>Riwayat Tagihan</h2><span class="subtitle">{{ $bills->count() }} tagihan</span></div>
    <div class="table-wrap">
        <table>
            <thead><tr><th>Tagihan</th><th>Jatuh Tempo</th><th>Jumlah</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
            @forelse ($bills as $bill)
                @php $status = $bill->status === 'belum_dibayar' && $bill->due_date->isPast() ? 'terlambat' : $bill->status; @endphp
                <tr>
                    <td><strong>{{ $bill->title }}</strong>@if ($bill->notes)<div class="subtitle" style="font-size:12px">{{ $bill->notes }}</div>@endif</td>
                    <td>{{ $bill->due_date->format('d M Y') }}</td>
                    <td>Rp {{ number_format($bill->amount, 0, ',', '.') }}</td>
                    <td><span class="status {{ $status }}">{{ str_replace('_', ' ', $status) }}</span></td>
                    <td>
                        @if ($bill->status !== 'dibayar')
                            <form method="POST" action="{{ route('penghuni.bayar', $bill) }}">@csrf
                                <button class="btn btn-primary btn-sm" type="submit">Bayar</button>
                            </form>
                        @else <span class="subtitle">-</span> @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="notice">Belum ada tagihan dari pengelola.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
