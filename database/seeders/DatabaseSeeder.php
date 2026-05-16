<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Business;
use App\Models\Category;
use App\Models\Transaction;
use App\Services\BusinessService;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $businessService = app(BusinessService::class);

        // Create Demo User
        $user = User::factory()->create([
            'name' => 'Pemilik UMKM',
            'email' => 'demo@cashmate.com',
            'password' => Hash::make('password'),
        ]);

        // Create Business for Demo User
        $business = Business::create([
            'user_id' => $user->id,
            'name' => 'Warung Demo CashMate',
            'address' => 'Jl. Merdeka No. 123, Jakarta',
            'phone' => '081234567890',
            'type' => 'warung',
        ]);

        // Seed Default Categories
        $businessService->seedDefaultCategories($business);

        // Create some transactions
        $categories = $business->categories;
        
        foreach ($categories as $category) {
            // Create 5 transactions for each category
            Transaction::factory()->count(5)->create([
                'business_id' => $business->id,
                'category_id' => $category->id,
                'type' => $category->type,
                'transaction_date' => now()->subDays(rand(0, 30)),
            ]);
        }
    }
}
