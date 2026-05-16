<?php

use App\Models\Business;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;

it('can view the report page and generate data', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create(['business_id' => $business->id]);

    Transaction::create([
        'business_id' => $business->id,
        'category_id' => $category->id,
        'type' => 'income',
        'amount' => 500000,
        'description' => 'Sales',
        'transaction_date' => now()->toDateString(),
        'source' => 'manual',
    ]);

    $response = $this->actingAs($user)->get(route('laporan'));

    $response->assertStatus(200);
    $response->assertSee('Laporan Keuangan');
    $response->assertSee('500.000');
});

it('can download the financial report as PDF', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create(['business_id' => $business->id]);

    Transaction::create([
        'business_id' => $business->id,
        'category_id' => $category->id,
        'type' => 'income',
        'amount' => 500000,
        'description' => 'Sales',
        'transaction_date' => now()->toDateString(),
        'source' => 'manual',
    ]);

    $response = $this->actingAs($user)->get(route('laporan.pdf'));

    $response->assertStatus(200);
    $response->assertHeader('Content-Type', 'application/pdf');
});
