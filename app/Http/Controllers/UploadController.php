<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadReceiptRequest;
use App\Models\Receipt;
use App\Services\OcrService;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        // Load user's business receipts if business exists
        $business = auth()->user()->business;
        $receipts = $business ? $business->receipts()->latest()->get() : collect();

        return view('upload', compact('receipts'));
    }

    public function process(UploadReceiptRequest $request, OcrService $ocrService)
    {
        $business = auth()->user()->business;

        if (! $business) {
            return redirect()->back()->with('error', 'Profil usaha belum dibuat.');
        }

        $path = $request->file('receipt_image')->store('receipts', 'public');

        $receipt = Receipt::create([
            'business_id' => $business->id,
            'image_path' => $path,
            'status' => 'pending',
        ]);

        $fullPath = Storage::disk('public')->path($path);
        $mimeType = $request->file('receipt_image')->getMimeType();

        $extractedData = $ocrService->extractReceiptData($fullPath, $mimeType);

        if ($extractedData) {
            $receipt->update([
                'extracted_data' => $extractedData,
                'status' => 'processed',
            ]);

            return redirect()->route('review.show', $receipt->id)->with('success', 'Nota berhasil diproses.');
        } else {
            $receipt->update([
                'status' => 'failed',
            ]);

            return redirect()->back()->with('error', 'Gagal memproses nota dengan AI. Silakan coba gambar lain yang lebih jelas.');
        }
    }
}
