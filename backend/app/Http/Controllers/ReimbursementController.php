<?php

namespace App\Http\Controllers;

use App\Models\Reimbursement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ReimbursementController extends Controller
{
    // Menampilkan daftar reimbursement untuk Admin
    public function index()
    {
        $reimbursements = Reimbursement::with(['admin', 'payer'])
            ->latest()
            ->get();

        return view('reimbursements.admin.index', compact('reimbursements'));
    }

    // Admin membuat pengajuan reimbursement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1'],
            'description' => ['required', 'string'],
            'receipt' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $path = $request->file('receipt')->store('reimbursements', 'public');

        Reimbursement::create([
            'admin_id' => $request->user()->id,
            'category' => $validated['category'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'receipt_path' => $path,
        ]);

        return back()->with('success', 'Pengajuan reimbursement berhasil dibuat.');
    }

    // Admin menyetujui atau menolak pengajuan
    public function decide(Request $request, Reimbursement $reimbursement)
    {
        $validated = $request->validate([
            'approval_status' => [
                'required',
                Rule::in(['Disetujui', 'Ditolak']),
            ],
            'rejection_reason' => [
                'nullable',
                'required_if:approval_status,Ditolak',
                'string',
            ],
        ]);

        if ($reimbursement->approval_status !== 'Menunggu') {
            return back()->with('error', 'Pengajuan ini sudah diproses.');
        }

        $reimbursement->update([
            'approval_status' => $validated['approval_status'],
            'rejection_reason' => $validated['rejection_reason'] ?? null,
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Keputusan reimbursement berhasil disimpan.');
    }

    // Pemilik menandai reimbursement sudah dibayar
    public function markPaid(Reimbursement $reimbursement)
    {
        if ($reimbursement->approval_status !== 'Disetujui') {
            return back()->with('error', 'Hanya pengajuan yang disetujui yang dapat dibayar.');
        }

        if ($reimbursement->payment_status === 'Sudah Dibayar') {
            return back()->with('error', 'Reimbursement ini sudah ditandai dibayar.');
        }

        $reimbursement->update([
            'payment_status' => 'Sudah Dibayar',
            'paid_by' => request()->user()->id,
            'paid_at' => now(),
        ]);

        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    // Admin mengonfirmasi apakah dana sudah diterima
    public function complete(Request $request, Reimbursement $reimbursement)
    {
        $validated = $request->validate([
            'completion_status' => [
                'required',
                Rule::in(['Selesai', 'Belum Selesai']),
            ],
        ]);

        if ($reimbursement->payment_status !== 'Sudah Dibayar') {
            return back()->with('error', 'Pemilik belum menandai reimbursement sudah dibayar.');
        }

        $reimbursement->update([
            'completion_status' => $validated['completion_status'],
            'completed_at' => $validated['completion_status'] === 'Selesai'
                ? now()
                : null,
        ]);

        return back()->with('success', 'Status penyelesaian berhasil diperbarui.');

    }

    // Menampilkan daftar reimbursement untuk Pemilik
    public function ownerIndex()
    {
        $reimbursements = Reimbursement::with(['admin', 'payer'])
            ->latest()
            ->get();

        return view('reimbursements.owner.index', compact('reimbursements'));
    }

}
