<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Bill;
use App\Models\Complaint;
use App\Models\Tenant;
use Illuminate\Http\Request;

/**
 * Portal penyewa. Semua data dibaca dari tabel yang sama dengan dashboard
 * pemilik/admin: Tenant (+ Room + Property), Bill, Announcement.
 * Akun penyewa dikaitkan ke data Tenant lewat email yang sama.
 */
class PenghuniController extends Controller
{
    /** Tenant milik akun yang sedang login (null jika belum didaftarkan pemilik). */
    private function tenant(): ?Tenant
    {
        abort_unless(auth()->user()->role === 'user', 403);

        return Tenant::with('room.property')
            ->whereRaw('LOWER(email) = ?', [strtolower(auth()->user()->email)])
            ->latest('id')
            ->first();
    }

    public function kamar()
    {
        $tenant = $this->tenant();
        $nextBill = $tenant
            ? Bill::where('tenant_id', $tenant->id)->where('status', '!=', 'dibayar')->orderBy('due_date')->first()
            : null;
        $unpaidCount = $tenant ? Bill::where('tenant_id', $tenant->id)->where('status', '!=', 'dibayar')->count() : 0;

        return view('penghuni.kamar', compact('tenant', 'nextBill', 'unpaidCount'));
    }

    public function pembayaran()
    {
        $tenant = $this->tenant();
        $bills = $tenant ? Bill::where('tenant_id', $tenant->id)->orderByDesc('due_date')->get() : collect();
        $totalUnpaid = $bills->where('status', '!=', 'dibayar')->sum('amount');

        return view('penghuni.pembayaran', compact('tenant', 'bills', 'totalUnpaid'));
    }

    public function bayar(Bill $bill)
    {
        $tenant = $this->tenant();
        abort_unless($tenant && $bill->tenant_id === $tenant->id, 403);

        if ($bill->status === 'dibayar') {
            return back()->with('success', 'Tagihan ini sudah dibayar.');
        }

        // TODO: buat transaksi di payment gateway (mis. Midtrans Snap) lalu redirect ke URL pembayaran.
        // Ubah status menjadi 'dibayar' hanya dari webhook/callback gateway, bukan dari sini.
        return back()->withErrors(['bayar' => 'Pembayaran online belum diaktifkan. Hubungi pengelola untuk pembayaran manual.']);
    }

    public function pengaduan()
    {
        $tenant = $this->tenant();
        $complaints = $tenant ? Complaint::where('tenant_id', $tenant->id)->latest()->get() : collect();

        return view('penghuni.pengaduan', compact('tenant', 'complaints'));
    }

    public function storePengaduan(Request $request)
    {
        $tenant = $this->tenant();
        abort_unless($tenant && $tenant->status === 'aktif', 403);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|in:listrik,air,ac,furnitur,lainnya',
            'description' => 'required|string|max:2000',
        ]);

        Complaint::create($data + ['tenant_id' => $tenant->id, 'room_id' => $tenant->room_id]);

        return back()->with('success', 'Pengaduan terkirim ke pengelola.');
    }

    public function pengumuman()
    {
        $tenant = $this->tenant();
        $announcements = Announcement::with('creator')->latest()->paginate(10);

        return view('penghuni.pengumuman', compact('tenant', 'announcements'));
    }
}
