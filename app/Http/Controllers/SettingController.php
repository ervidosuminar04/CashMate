<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $business = auth()->user()->business;

        // If business doesn't exist, create an empty one or redirect
        if (! $business) {
            $business = Business::create([
                'user_id' => auth()->id(),
                'name' => 'Usaha Baru',
                'type' => 'lainnya',
            ]);
        }

        $categories = Category::where('business_id', $business->id)->get();

        return view('pengaturan', compact('business', 'categories'));
    }

    public function updateProfile(Request $request)
    {
        $business = auth()->user()->business;

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'type' => 'required|string|in:warung,toko,jasa,lainnya',
        ]);

        $business->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Profil usaha berhasil diperbarui.');
    }

    public function storeCategory(Request $request)
    {
        $business = auth()->user()->business;

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:income,expense',
            'color' => 'nullable|string|max:7',
        ]);

        Category::create([
            'business_id' => $business->id,
            'name' => $request->name,
            'type' => $request->type,
            'color' => $request->color ?? '#cccccc',
            'is_default' => false,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroyCategory(Category $category)
    {
        if ($category->business_id !== auth()->user()->business->id) {
            abort(403);
        }

        if ($category->is_default) {
            return redirect()->back()->with('error', 'Kategori bawaan (default) tidak dapat dihapus.');
        }

        // Check if there are transactions using this category
        if ($category->transactions()->exists()) {
            return redirect()->back()->with('error', 'Kategori tidak dapat dihapus karena sudah memiliki transaksi. Silakan ubah kategori transaksi tersebut terlebih dahulu.');
        }

        $category->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
