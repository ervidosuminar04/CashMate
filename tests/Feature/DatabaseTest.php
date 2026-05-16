<?php

use App\Models\User;
use App\Models\Business;
use App\Models\Transaction;
use App\Services\BusinessService;
use App\Services\DashboardService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('new user automatically gets a business and default categories', function () {
    $businessService = app(BusinessService::class);
    $user = User::factory()->create();
    
    $business = $businessService->setupDefaultBusiness($user);

    expect($business)->toBeInstanceOf(Business::class);
    expect($business->user_id)->toBe($user->id);
    expect($business->categories)->toHaveCount(12); // 3 income + 9 expense
});

test('dashboard summary calculates correctly', function () {
    $dashboardService = app(DashboardService::class);
    $business = Business::factory()->create();
    
    // Create income
    Transaction::factory()->create([
        'business_id' => $business->id,
        'type' => 'income',
        'amount' => 100000,
    ]);

    // Create expense
    Transaction::factory()->create([
        'business_id' => $business->id,
        'type' => 'expense',
        'amount' => 40000,
    ]);

    $summary = $dashboardService->getSummary($business);

    expect($summary['total_income'])->toEqual(100000);
    expect($summary['total_expense'])->toEqual(40000);
    expect($summary['balance'])->toEqual(60000);
});

test('dashboard controller handles users without business', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/dashboard');
    
    $response->assertStatus(200);
    $this->assertDatabaseHas('businesses', ['user_id' => $user->id]);
});
