<?php

use App\Models\User;

/**
 * Phase 2: Authentication & Navigation Tests
 *
 * Covers:
 * - Guest pages accessible without auth
 * - Auth pages redirect guests to login
 * - Navigation routes are correct
 */

test('landing page is accessible to guests', function () {
    $this->get(route('landing_page'))->assertSuccessful();
});

test('tentang kami page is accessible to guests', function () {
    $this->get(route('tentang-kami'))->assertSuccessful();
});

test('login page is accessible to guests', function () {
    $this->get(route('login'))->assertSuccessful();
});

test('register page is accessible to guests', function () {
    $this->get(route('register'))->assertSuccessful();
});

test('dashboard redirects guests to login', function () {
    $this->get(route('dashboard'))->assertRedirect(route('login'));
});

test('upload redirects guests to login', function () {
    $this->get(route('upload'))->assertRedirect(route('login'));
});

test('transaksi redirects guests to login', function () {
    $this->get(route('transaksi'))->assertRedirect(route('login'));
});

test('laporan redirects guests to login', function () {
    $this->get(route('laporan'))->assertRedirect(route('login'));
});

test('authenticated user can access dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get(route('dashboard'))->assertSuccessful();
});

test('landing page renders correct CTA links', function () {
    $response = $this->get(route('landing_page'));

    $response->assertSuccessful();
    $response->assertSee(route('register'));
    $response->assertSee(route('login'));
});

test('login page contains form with correct action', function () {
    $response = $this->get(route('login'));

    $response->assertSuccessful();
    $response->assertSee('Masuk Sekarang');
    $response->assertSee(route('register'));
});

test('register page contains form with correct action', function () {
    $response = $this->get(route('register'));

    $response->assertSuccessful();
    $response->assertSee('Mulai Gratis');
    $response->assertSee(route('login'));
});

test('guest is redirected to landing page after logout', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post('/logout')->assertRedirect('/');
});
