<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request, ReportService $reportService)
    {
        $business = auth()->user()->business;

        if (! $business) {
            return redirect()->route('dashboard')->with('error', 'Silakan buat profil usaha terlebih dahulu.');
        }

        // Parse dates or use default (this month)
        $startDate = $request->filled('start_date')
            ? Carbon::parse($request->start_date)->startOfDay()
            : now()->startOfMonth();

        $endDate = $request->filled('end_date')
            ? Carbon::parse($request->end_date)->endOfDay()
            : now()->endOfMonth();

        $cashFlowData = $reportService->getCashFlow($business, $startDate, $endDate);
        $profitLossData = $reportService->getProfitLoss($business, $startDate, $endDate);
        $categoryBreakdown = $reportService->getCategoryBreakdown($business, $startDate, $endDate, 'expense');

        return view('laporan', compact(
            'startDate',
            'endDate',
            'cashFlowData',
            'profitLossData',
            'categoryBreakdown'
        ));
    }

    public function exportPdf(Request $request, ReportService $reportService)
    {
        $business = auth()->user()->business;

        if (! $business) {
            return redirect()->route('dashboard')->with('error', 'Silakan buat profil usaha terlebih dahulu.');
        }

        // Parse dates
        $startDate = $request->filled('start_date')
            ? Carbon::parse($request->start_date)->startOfDay()
            : now()->startOfMonth();

        $endDate = $request->filled('end_date')
            ? Carbon::parse($request->end_date)->endOfDay()
            : now()->endOfMonth();

        $cashFlowData = $reportService->getCashFlow($business, $startDate, $endDate);
        $profitLossData = $reportService->getProfitLoss($business, $startDate, $endDate);
        $categoryBreakdown = $reportService->getCategoryBreakdown($business, $startDate, $endDate, 'expense');

        $pdf = Pdf::loadView('reports.pdf', compact(
            'business',
            'startDate',
            'endDate',
            'cashFlowData',
            'profitLossData',
            'categoryBreakdown'
        ));

        return $pdf->download('laporan-keuangan-'.$startDate->format('Y-m-d').'-sd-'.$endDate->format('Y-m-d').'.pdf');
    }
}
