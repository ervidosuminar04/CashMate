<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OcrService
{
    /**
     * Parse receipt image using Google Gemini API.
     *
     * @param  string  $imagePath  Local absolute path to the image
     * @param  string  $mimeType  Mime type of the image (e.g. image/jpeg, image/png)
     * @return array|null Returns an array of extracted items or null on failure
     */
    public function extractReceiptData(string $imagePath, string $mimeType = 'image/jpeg'): ?array
    {
        $apiKey = config('services.gemini.key');

        if (empty($apiKey)) {
            Log::error('Gemini API key is not configured.');

            return null;
        }

        try {
            // Read and encode the image file
            if (! file_exists($imagePath)) {
                Log::error("Image file not found at path: {$imagePath}");

                return null;
            }

            $imageData = base64_encode(file_get_contents($imagePath));

            // Gemini 1.5 Flash endpoint
            $endpoint = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent';

            $payload = [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => "Extract the purchased items from this receipt image. Focus on finding the item name, quantity, unit price, and total price for each item. Format the response as a JSON array of objects, where each object has exactly these keys: 'item_name' (string), 'quantity' (integer), 'unit_price' (number), and 'total_price' (number). If the quantity is missing, assume 1. Output ONLY a valid JSON array, without any markdown formatting.",
                            ],
                            [
                                'inline_data' => [
                                    'mime_type' => $mimeType,
                                    'data' => $imageData,
                                ],
                            ],
                        ],
                    ],
                ],
                'generationConfig' => [
                    'response_mime_type' => 'application/json',
                ],
            ];

            // Send request to Gemini API
            $response = Http::post($endpoint.'?key='.$apiKey, $payload);

            if ($response->successful()) {
                $result = $response->json();

                if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
                    $jsonText = $result['candidates'][0]['content']['parts'][0]['text'];

                    // Sometimes the API might still wrap the response in markdown code blocks despite instructions
                    $jsonText = preg_replace('/```json\s*/', '', $jsonText);
                    $jsonText = preg_replace('/```\s*/', '', $jsonText);

                    $extractedData = json_decode(trim($jsonText), true);

                    if (json_last_error() === JSON_ERROR_NONE) {
                        return $extractedData;
                    } else {
                        Log::error('OCR Service JSON Decode Error: '.json_last_error_msg().' for string: '.$jsonText);
                    }
                }
            } else {
                Log::error('Gemini API Error: '.$response->status().' - '.$response->body());
            }
        } catch (\Exception $e) {
            Log::error('OCR Service Exception: '.$e->getMessage());
        }

        return null;
    }
}
