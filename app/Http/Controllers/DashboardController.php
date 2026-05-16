<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use App\Services\BusinessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(
        protected DashboardService $dashboardService,
        protected BusinessService $businessService
    ) {}

    public function index()
    {
        $user = Auth::user();
        $business = $user->businesses()->first();

        // Fallback for existing users without business
        if (!$business) {
            $business = $this->businessService->setupDefaultBusiness($user);
        }

        $summary = $this->dashboardService->getSummary($business);
        $recentTransactions = $this->dashboardService->getRecentTransactions($business);
        $cashflow = $this->dashboardService->getMonthlyCashflow($business);

        return view('dashboard', compact('summary', 'recentTransactions', 'cashflow', 'business'));
    }
}
