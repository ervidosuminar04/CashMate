<?php

namespace App\Services;

use App\Models\Business;
use App\Models\Transaction;
use Carbon\Carbon;

class ReportService
{
    public function getCashFlow(Business $business, Carbon $startDate, Carbon $endDate)
    {
        $transactions = Transaction::where('business_id', $business->id)
            ->whereBetween('transaction_date', [$startDate->toDateString(), $endDate->toDateString()])
            ->selectRaw('DATE(transaction_date) as date, type, SUM(amount) as total')
            ->groupBy('date', 'type')
            ->orderBy('date')
            ->get();

        $labels = [];
        $incomeData = [];
        $expenseData = [];

        // Generate daily data points
        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $dateString = $currentDate->toDateString();
            $labels[] = $dateString;
            $incomeData[$dateString] = 0;
            $expenseData[$dateString] = 0;
            $currentDate->addDay();
        }

        foreach ($transactions as $trx) {
            if ($trx->type === 'income') {
                $incomeData[$trx->date] = (float) $trx->total;
            } else {
                $expenseData[$trx->date] = (float) $trx->total;
            }
        }

        return [
            'labels' => $labels,
            'income' => array_values($incomeData),
            'expense' => array_values($expenseData),
        ];
    }

    public function getProfitLoss(Business $business, Carbon $startDate, Carbon $endDate)
    {
        $totals = Transaction::where('business_id', $business->id)
            ->whereBetween('transaction_date', [$startDate->toDateString(), $endDate->toDateString()])
            ->selectRaw('type, SUM(amount) as total')
            ->groupBy('type')
            ->pluck('total', 'type');

        $totalIncome = (float) ($totals['income'] ?? 0);
        $totalExpense = (float) ($totals['expense'] ?? 0);
        $netProfit = $totalIncome - $totalExpense;

        return [
            'total_income' => $totalIncome,
            'total_expense' => $totalExpense,
            'net_profit' => $netProfit,
            'profit_margin' => $totalIncome > 0 ? ($netProfit / $totalIncome) * 100 : 0,
        ];
    }

    public function getCategoryBreakdown(Business $business, Carbon $startDate, Carbon $endDate, string $type = 'expense')
    {
        return Transaction::where('transactions.business_id', $business->id)
            ->where('transactions.type', $type)
            ->whereBetween('transactions.transaction_date', [$startDate->toDateString(), $endDate->toDateString()])
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->selectRaw('categories.name, categories.color, SUM(transactions.amount) as total')
            ->groupBy('categories.id', 'categories.name', 'categories.color')
            ->orderByDesc('total')
            ->get();
    }
}
