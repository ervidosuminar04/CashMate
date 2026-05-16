<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $business = auth()->user()->business;

        if (! $business) {
            return redirect()->route('dashboard')->with('error', 'Silakan buat profil usaha terlebih dahulu.');
        }

        $query = Transaction::where('business_id', $business->id)->with('category', 'receipt');

        // Filter: Search by description
        if ($request->filled('search')) {
            $query->where('description', 'like', '%'.$request->search.'%');
        }

        // Filter: By Category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter: By Type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter: By Date Range
        if ($request->filled('date_from')) {
            $query->whereDate('transaction_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('transaction_date', '<=', $request->date_to);
        }

        // Clone query for chart data before pagination
        $chartQuery = clone $query;

        $transactions = $query->latest('transaction_date')->latest('id')->paginate(10)->withQueryString();

        $categories = Category::where('business_id', $business->id)->get();

        // Data for bubble chart (last 30 days if no date filter is applied, otherwise use filtered range)
        if (! $request->filled('date_from') && ! $request->filled('date_to')) {
            $chartQuery->whereDate('transaction_date', '>=', now()->subDays(30));
        }

        $chartData = $chartQuery->get()->map(function ($trx) {
            return [
                'x' => Carbon::parse($trx->transaction_date)->timestamp * 1000,
                'y' => (float) $trx->amount,
                'r' => min(max($trx->amount / 10000, 5), 25), // Map amount to radius (5-25px)
                'type' => $trx->type,
                'category' => $trx->category->name ?? 'Unknown',
                'description' => $trx->description,
            ];
        });

        return view('transaksi', compact('transactions', 'categories', 'chartData'));
    }

    public function store(StoreTransactionRequest $request)
    {
        $business = auth()->user()->business;

        Transaction::create([
            'business_id' => $business->id,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'description' => $request->description,
            'transaction_date' => $request->transaction_date,
            'source' => 'manual',
        ]);

        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        if ($transaction->business_id !== auth()->user()->business->id) {
            abort(403);
        }

        $transaction->update([
            'category_id' => $request->category_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'description' => $request->description,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil diubah.');
    }

    public function destroy(Transaction $transaction)
    {
        if ($transaction->business_id !== auth()->user()->business->id) {
            abort(403);
        }

        $transaction->delete();

        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }
}
