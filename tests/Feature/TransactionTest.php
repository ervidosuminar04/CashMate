<?php

use App\Models\Business;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;

it('can view the transaction page with list of transactions', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create(['business_id' => $business->id]);

    $transaction = Transaction::create([
        'business_id' => $business->id,
        'category_id' => $category->id,
        'type' => 'expense',
        'amount' => 50000,
        'description' => 'Beli Tepung',
        'transaction_date' => now()->toDateString(),
        'source' => 'manual',
    ]);

    $response = $this->actingAs($user)->get(route('transaksi'));

    $response->assertStatus(200);
    $response->assertSee('Beli Tepung');
    $response->assertSee('50.000');
});

it('can filter transactions by description', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create(['business_id' => $business->id]);

    Transaction::create([
        'business_id' => $business->id,
        'category_id' => $category->id,
        'type' => 'expense',
        'amount' => 50000,
        'description' => 'Beli Tepung',
        'transaction_date' => now()->toDateString(),
        'source' => 'manual',
    ]);

    Transaction::create([
        'business_id' => $business->id,
        'category_id' => $category->id,
        'type' => 'income',
        'amount' => 150000,
        'description' => 'Jual Roti',
        'transaction_date' => now()->toDateString(),
        'source' => 'manual',
    ]);

    $response = $this->actingAs($user)->get(route('transaksi', ['search' => 'Tepung']));

    $response->assertStatus(200);
    $response->assertSee('Beli Tepung');
    $response->assertDontSee('Jual Roti');
});

it('can create a new transaction manually', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create(['business_id' => $business->id]);

    $response = $this->actingAs($user)->post(route('transaksi.store'), [
        'type' => 'income',
        'category_id' => $category->id,
        'amount' => 200000,
        'description' => 'Pendapatan Hari Ini',
        'transaction_date' => now()->toDateString(),
    ]);

    $response->assertRedirect(route('transaksi'));

    $this->assertDatabaseHas('transactions', [
        'business_id' => $business->id,
        'amount' => 200000,
        'description' => 'Pendapatan Hari Ini',
        'source' => 'manual',
    ]);
});

it('can update an existing transaction', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create(['business_id' => $business->id]);

    $transaction = Transaction::create([
        'business_id' => $business->id,
        'category_id' => $category->id,
        'type' => 'expense',
        'amount' => 50000,
        'description' => 'Beli Tepung',
        'transaction_date' => now()->toDateString(),
        'source' => 'manual',
    ]);

    $response = $this->actingAs($user)->put(route('transaksi.update', $transaction->id), [
        'type' => 'expense',
        'category_id' => $category->id,
        'amount' => 75000,
        'description' => 'Beli Tepung Premium',
        'transaction_date' => now()->toDateString(),
    ]);

    $response->assertRedirect(route('transaksi'));

    $this->assertDatabaseHas('transactions', [
        'id' => $transaction->id,
        'amount' => 75000,
        'description' => 'Beli Tepung Premium',
    ]);
});

it('can delete a transaction', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create(['business_id' => $business->id]);

    $transaction = Transaction::create([
        'business_id' => $business->id,
        'category_id' => $category->id,
        'type' => 'expense',
        'amount' => 50000,
        'description' => 'Beli Tepung',
        'transaction_date' => now()->toDateString(),
        'source' => 'manual',
    ]);

    $response = $this->actingAs($user)->delete(route('transaksi.destroy', $transaction->id));

    $response->assertRedirect(route('transaksi'));

    $this->assertDatabaseMissing('transactions', [
        'id' => $transaction->id,
    ]);
});
