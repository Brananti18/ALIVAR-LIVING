<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class IncomeReportController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'bulan' => ['nullable', 'integer', 'between:1,12'],
            'tahun' => ['nullable', 'integer', 'between:2000,2100'],
        ]);

        $month = (int) $request->input('bulan', now()->month);
        $year = (int) $request->input('tahun', now()->year);
        $userId = auth()->id();

        $bills = Bill::query()
            ->where('user_id', $userId)
            ->with('tenant')
            ->whereYear('due_date', $year)
            ->whereMonth('due_date', $month)
            ->orderByDesc('due_date')
            ->get();

        $paidBills = $bills->where('status', 'dibayar');

        $totalIncome = $paidBills->sum('amount');

        // Modul pengeluaran belum tersedia.
        $totalExpense = 0;

        $incomeCategories = $paidBills
            ->groupBy('title')
            ->map(fn ($items) => $items->sum('amount'));

      
        // Total pemasukan setiap bulan pada tahun yang dipilih.
        $monthlyIncome = collect();

        for ($m = 1; $m <= 12; $m++) {
            $monthlyIncome[$m] = Bill::query()
                ->where('user_id', $userId)
                ->where('status', 'dibayar')
                ->whereYear('due_date', $year)
                ->whereMonth('due_date', $m)
                ->sum('amount');
        }


        return view('dashboard.laporan-pendapatan', [
            'month' => $month,
            'year' => $year,
            'bills' => $bills,
            'paidBills' => $paidBills,
            'transactions' => $bills,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'incomeCategories' => $incomeCategories,
            'monthlyIncome' => $monthlyIncome,
        ]);
    }
}
