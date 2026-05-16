<?php

use App\Models\Business;
use App\Models\Category;
use App\Models\User;

it('can view the settings page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('pengaturan'));

    $response->assertStatus(200);
    $response->assertSee('Pengaturan Usaha');
    $response->assertSee('Usaha Baru'); // Auto-created business name
});

it('can update business profile', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->post(route('pengaturan.profil.update'), [
        'name' => 'Toko Sinar Jaya',
        'type' => 'toko',
        'address' => 'Jl. Pahlawan',
        'phone' => '08123456789',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('businesses', [
        'id' => $business->id,
        'name' => 'Toko Sinar Jaya',
        'type' => 'toko',
    ]);
});

it('can create a custom category', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->post(route('pengaturan.kategori.store'), [
        'name' => 'Biaya Iklan',
        'type' => 'expense',
        'color' => '#ff0000',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('categories', [
        'business_id' => $business->id,
        'name' => 'Biaya Iklan',
        'type' => 'expense',
        'is_default' => 0,
    ]);
});

it('can delete a custom category', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create([
        'business_id' => $business->id,
        'is_default' => false,
    ]);

    $response = $this->actingAs($user)->delete(route('pengaturan.kategori.destroy', $category->id));

    $response->assertRedirect();
    $this->assertDatabaseMissing('categories', [
        'id' => $category->id,
    ]);
});
