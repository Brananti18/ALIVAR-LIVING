<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Tenant;
use Illuminate\Http\Request;

class BillController extends Controller
{
    // Menampilkan daftar tagihan.
    public function index()
    {
        $bills = Bill::where('user_id', auth()->id())
            ->with('tenant')
            ->latest()
            ->get();

        $tenants = Tenant::where('user_id', auth()->id())
            ->where('status', 'aktif')
            ->get();

        return view('dashboard.tagihan', compact('bills', 'tenants'));
    }

    // Menyimpan tagihan baru.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tenant_id' => ['required', 'integer', 'exists:tenants,id'],
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:1'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'in:belum_dibayar,dibayar,terlambat'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $tenant = Tenant::where('user_id', auth()->id())
            ->findOrFail($validated['tenant_id']);

        $validated['user_id'] = auth()->id();

        Bill::create($validated);

        return redirect()
            ->route('dashboard.tagihan')
            ->with('success', 'Tagihan berhasil ditambahkan.');
    }

    // Memperbarui tagihan.
    public function update(Request $request, Bill $bill)
    {
        $this->authorizeBill($bill);

        $validated = $request->validate([
            'tenant_id' => ['required', 'integer', 'exists:tenants,id'],
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:1'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'in:belum_dibayar,dibayar,terlambat'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        Tenant::where('user_id', auth()->id())
            ->findOrFail($validated['tenant_id']);

        $bill->update($validated);

        return redirect()
            ->route('dashboard.tagihan')
            ->with('success', 'Tagihan berhasil diperbarui.');
    }

    // Menghapus tagihan.
    public function destroy(Bill $bill)
    {
        $this->authorizeBill($bill);

        $bill->delete();

        return redirect()
            ->route('dashboard.tagihan')
            ->with('success', 'Tagihan berhasil dihapus.');
    }

    private function authorizeBill(Bill $bill): void
    {
        abort_unless(
            (int) $bill->user_id === (int) auth()->id(),
            403
        );
    }
}
