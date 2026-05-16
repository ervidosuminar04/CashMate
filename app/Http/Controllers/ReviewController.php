<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Receipt;
use App\Models\ReceiptItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function show(Receipt $receipt)
    {
        // Ensure the receipt belongs to the user
        if ($receipt->business_id !== auth()->user()->business->id) {
            abort(403);
        }

        if ($receipt->status !== 'processed') {
            return redirect()->route('upload')->with('error', 'Nota belum diproses atau sudah direview.');
        }

        // Get categories for the user to select
        $categories = Category::where('business_id', $receipt->business_id)->get();

        return view('review', compact('receipt', 'categories'));
    }

    public function approve(Request $request, Receipt $receipt)
    {
        // Ensure the receipt belongs to the user
        if ($receipt->business_id !== auth()->user()->business->id) {
            abort(403);
        }

        $request->validate([
            'items' => 'required|array',
            'items.*.item_name' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.total_price' => 'required|numeric|min:0',
            'items.*.category_id' => 'required|exists:categories,id',
        ]);

        try {
            DB::beginTransaction();

            $totalAmount = 0;

            foreach ($request->items as $itemData) {
                // Save the receipt item
                ReceiptItem::create([
                    'receipt_id' => $receipt->id,
                    'item_name' => $itemData['item_name'],
                    'quantity' => $itemData['quantity'],
                    'unit_price' => $itemData['unit_price'],
                    'total_price' => $itemData['total_price'],
                ]);

                // Create a transaction for each item
                Transaction::create([
                    'business_id' => $receipt->business_id,
                    'category_id' => $itemData['category_id'],
                    'receipt_id' => $receipt->id,
                    'type' => 'expense', // default to expense for receipts
                    'amount' => $itemData['total_price'],
                    'description' => $itemData['item_name'],
                    'transaction_date' => now()->toDateString(), // or extract from receipt if available
                    'source' => 'ocr',
                ]);

                $totalAmount += $itemData['total_price'];
            }

            // Update receipt status
            $receipt->update([
                'status' => 'reviewed',
            ]);

            DB::commit();

            return redirect()->route('transaksi')->with('success', "Nota berhasil direview. $totalAmount ditambahkan sebagai pengeluaran.");
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: '.$e->getMessage());
        }
    }
}
