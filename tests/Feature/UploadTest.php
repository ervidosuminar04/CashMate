<?php

use App\Models\Business;
use App\Models\Category;
use App\Models\Receipt;
use App\Models\User;
use App\Services\OcrService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery\MockInterface;

it('can display the upload page', function () {
    $user = User::factory()->create();
    Business::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->get(route('upload'));

    $response->assertStatus(200);
    $response->assertSee('Scan Nota Baru');
});

it('can process an uploaded receipt', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);

    // Mock OcrService
    $this->mock(OcrService::class, function (MockInterface $mock) {
        $mock->shouldReceive('extractReceiptData')
            ->once()
            ->andReturn([
                ['item_name' => 'Kopi', 'quantity' => 2, 'unit_price' => 15000, 'total_price' => 30000],
            ]);
    });

    $file = UploadedFile::fake()->image('receipt.jpg');

    $response = $this->actingAs($user)->post(route('upload.process'), [
        'receipt_image' => $file,
    ]);

    $receipt = Receipt::first();
    expect($receipt)->not->toBeNull()
        ->business_id->toBe($business->id)
        ->status->toBe('processed');

    $response->assertRedirect(route('review.show', $receipt->id));
});

it('can approve a receipt and create a transaction', function () {
    $user = User::factory()->create();
    $business = Business::factory()->create(['user_id' => $user->id]);
    $category = Category::factory()->create(['business_id' => $business->id]);

    $receipt = Receipt::create([
        'business_id' => $business->id,
        'image_path' => 'fake_path.jpg',
        'status' => 'processed',
        'extracted_data' => [],
    ]);

    $response = $this->actingAs($user)->post(route('review.approve', $receipt->id), [
        'items' => [
            [
                'item_name' => 'Kopi',
                'quantity' => 2,
                'unit_price' => 15000,
                'total_price' => 30000,
                'category_id' => $category->id,
            ],
        ],
    ]);

    $response->assertRedirect(route('transaksi'));

    $this->assertDatabaseHas('receipts', [
        'id' => $receipt->id,
        'status' => 'reviewed',
    ]);

    $this->assertDatabaseHas('transactions', [
        'business_id' => $business->id,
        'receipt_id' => $receipt->id,
        'amount' => 30000,
    ]);

    $this->assertDatabaseHas('receipt_items', [
        'receipt_id' => $receipt->id,
        'item_name' => 'Kopi',
    ]);
});
