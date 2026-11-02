<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Tampilan daftar pengumuman untuk Admin.
     */
    public function index()
    {
        $announcements = Announcement::with('creator')
            ->latest()
            ->paginate(10);

        return view('admin.announcements', compact('announcements'));
    }

    /**
     * Simpan pengumuman baru oleh Admin.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        Announcement::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'is_active' => $request->boolean('is_active'),
            'created_by' => Auth::id(),
        ]);

        return redirect()
            ->route('admin.announcements')
            ->with('success', 'Pengumuman berhasil dibuat.');
    }

    /**
     * Hapus pengumuman oleh Admin.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()
            ->route('admin.announcements')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }

    /**
     * Tampilan pengumuman aktif untuk Pemilik Properti.
     */
    public function ownerIndex()
    {
        $announcements = Announcement::with('creator')
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return view('dashboard.pengumuman', compact('announcements'));
    }
}