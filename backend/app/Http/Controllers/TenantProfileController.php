<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\View\View;

class TenantProfileController extends Controller
{
    /**
     * Menampilkan profil sewa milik pemilik yang login.
     */
    public function show(Tenant $tenant): View
    {
        abort_unless(
            (int) $tenant->user_id === (int) auth()->id(),
            403
        );

        $tenant->load([
    'room.property',
    'bills' => function ($query) {
        $query->where('user_id', auth()->id())
            ->latest();
    },
]);

        $bills = $tenant->bills;

        $totalBills = $bills->sum('amount');

        $unpaidBills = $bills
            ->where('status', 'belum_dibayar');

        $totalUnpaid = $unpaidBills->sum('amount');

        $paidBills = $bills->where('status', 'dibayar');

        $totalPaid = $paidBills->sum('amount');

        return view('dashboard.profil-sewa', compact(
            'tenant',
            'bills',
            'totalBills',
            'totalUnpaid',
            'totalPaid',
            'unpaidBills',
            'paidBills'
        ));
    }
}
