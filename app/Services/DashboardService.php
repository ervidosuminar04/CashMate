<?php

namespace App\Services;

use App\Models\Business;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardService
{
    /**
     * Get summary stats for the dashboard.
     */
    public function getSummary(Business $business): array
    {
        $stats = Transaction::where('business_id', $business->id)
            ->select(
                DB::raw("SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) as total_income"),
                DB::raw("SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) as total_expense")
            )
            ->first();

        $income = $stats->total_income ?? 0;
        $expense = $stats->total_expense ?? 0;

        return [
            'total_income' => $income,
            'total_expense' => $expense,
            'balance' => $income - $expense,
        ];
    }

    /**
     * Get recent transactions.
     */
    public function getRecentTransactions(Business $business, int $limit = 5)
    {
        return Transaction::with('category')
            ->where('business_id', $business->id)
            ->latest('transaction_date')
            ->latest('id')
            ->limit($limit)
            ->get();
    }

    /**
     * Get monthly cashflow data for Chart.js.
     */
    public function getMonthlyCashflow(Business $business): array
    {
        $startDate = now()->startOfMonth()->subMonths(5); // Last 6 months
        
        $driver = DB::getDriverName();
        $dateField = $driver === 'sqlite' 
            ? "strftime('%Y-%m', transaction_date)" 
            : "DATE_FORMAT(transaction_date, '%Y-%m')";

        $data = Transaction::where('business_id', $business->id)
            ->where('transaction_date', '>=', $startDate)
            ->select(
                DB::raw("$dateField as month"),
                DB::raw("SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) as income"),
                DB::raw("SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) as expense")
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $incomeData = [];
        $expenseData = [];

        // Fill missing months with 0
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i)->format('Y-m');
            $monthLabel = now()->subMonths($i)->translatedFormat('M');
            
            $labels[] = $monthLabel;
            
            $monthRecord = $data->firstWhere('month', $month);
            $incomeData[] = $monthRecord ? (float) $monthRecord->income : 0;
            $expenseData[] = $monthRecord ? (float) $monthRecord->expense : 0;
        }

        return [
            'labels' => $labels,
            'income' => $incomeData,
            'expense' => $expenseData,
        ];
    }
}
