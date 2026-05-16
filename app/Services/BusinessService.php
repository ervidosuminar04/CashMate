<?php

namespace App\Services;

use App\Models\User;
use App\Models\Business;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BusinessService
{
    /**
     * Create a default business and categories for a new user.
     */
    public function setupDefaultBusiness(User $user): Business
    {
        return DB::transaction(function () use ($user) {
            $business = Business::create([
                'user_id' => $user->id,
                'name' => 'Bisnis ' . $user->name,
                'type' => 'warung',
            ]);

            $this->seedDefaultCategories($business);

            return $business;
        });
    }

    /**
     * Seed default categories for a business.
     */
    public function seedDefaultCategories(Business $business): void
    {
        $defaults = [
            // Pemasukan (Income)
            ['name' => 'Penjualan Produk', 'type' => 'income', 'icon' => 'shopping_bag', 'color' => '#4CAF50'],
            ['name' => 'Penjualan Jasa', 'type' => 'income', 'icon' => 'handyman', 'color' => '#8BC34A'],
            ['name' => 'Pendapatan Lainnya', 'type' => 'income', 'icon' => 'add_card', 'color' => '#CDDC39'],

            // Pengeluaran (Expense)
            ['name' => 'Bahan Baku', 'type' => 'expense', 'icon' => 'inventory_2', 'color' => '#F44336'],
            ['name' => 'Operasional', 'type' => 'expense', 'icon' => 'settings', 'color' => '#E91E63'],
            ['name' => 'Gaji Karyawan', 'type' => 'expense', 'icon' => 'payments', 'color' => '#9C27B0'],
            ['name' => 'Transportasi', 'type' => 'expense', 'icon' => 'local_shipping', 'color' => '#673AB7'],
            ['name' => 'Sewa', 'type' => 'expense', 'icon' => 'apartment', 'color' => '#3F51B5'],
            ['name' => 'Utilitas (Listrik/Air)', 'type' => 'expense', 'icon' => 'bolt', 'color' => '#2196F3'],
            ['name' => 'Kemasan', 'type' => 'expense', 'icon' => 'package_2', 'color' => '#03A9F4'],
            ['name' => 'Marketing', 'type' => 'expense', 'icon' => 'campaign', 'color' => '#00BCD4'],
            ['name' => 'Lainnya', 'type' => 'expense', 'icon' => 'more_horiz', 'color' => '#607D8B'],
        ];

        foreach ($defaults as $data) {
            Category::create(array_merge($data, [
                'business_id' => $business->id,
                'is_default' => true,
            ]));
        }
    }
}
