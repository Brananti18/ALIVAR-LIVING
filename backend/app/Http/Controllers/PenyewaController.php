<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenyewaController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // 1. Informasi Kamar & Kontrak (join tenants, rooms, dan properties)
        $kontrak = DB::table('tenants')
            ->leftJoin('rooms', 'tenants.room_id', '=', 'rooms.id')
            ->leftJoin('properties', 'rooms.property_id', '=', 'properties.id')
            ->where('tenants.user_id', $userId)
            ->select(
                'tenants.*',
                'rooms.room_number',
                'rooms.price as room_price',
                'properties.name as property_name'
            )
            ->first();

        // 2. Riwayat Tagihan & Pembayaran (tabel bills)
        $tagihan = $kontrak
            ? DB::table('bills')->where('tenant_id', $kontrak->id)->orderByDesc('created_at')->get()
            : collect();

        // 3. Daftar Pengaduan / Perbaikan milik penyewa
        $pengaduan = DB::table('complaints')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();

        // 4. Informasi & Pengumuman dari Admin (tabel announcements)
        $pengumuman = DB::table('announcements')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('dashboard.user', compact('kontrak', 'tagihan', 'pengaduan', 'pengumuman'));
    }

    // Fitur Kirim Pengaduan / Permintaan Perbaikan
    public function storePengaduan(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        DB::table('complaints')->insert([
            'user_id' => Auth::id(),
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Pengaduan perbaikan berhasil dikirim ke Admin.');
    }

    // Fitur Konfirmasi Pembayaran Tagihan
    public function bayarTagihan($id)
    {
        DB::table('bills')->where('id', $id)->update([
            'status' => 'paid',
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Pembayaran tagihan berhasil dikonfirmasi!');
    }
}
