<?php

use Illuminate\Support\Facades\Http;
use Kiyatilahun\ConvertCurrency\Facades\ConvertCurrency;

it('can test', function () {
    expect(true)->toBeTrue();
});
it('converts currency correctly', function () {
    // Arrange: Mock the API response
    Http::fake([
        'https://latest.currency-api.pages.dev/v1/currencies/usd.json' => Http::response([
            'usd' => [
                'eur' => 0.85, // Example exchange rate
            ],
        ], 200),
    ]);

    // Act: Call the convertAmount method
    $amount ='130.0';
    $fromCurrency = 'USD';
    $toCurrency = 'EUR';
    $response = ConvertCurrency::convertAmount($amount, $fromCurrency, $toCurrency);
    $data = $response->getData(true);

    // dd($data);
    // Assert: Verify the response
    expect($data['success'])->toBe(true);
    expect($data['message'])->toBe('Conversion successful');
    expect($data['data']['amount'])->toBe($amount);
    expect($data['data']['from_currency'])->toBe(strtolower($fromCurrency));
    expect($data['data']['to_currency'])->toBe(strtolower($toCurrency));
    expect($data['data']['converted_amount'])->toBe($data['data']['exchange_rate']*$data['data']['amount']);
});
it('fetches all currency symbols successfully without making a real HTTP request', function () {
    Http::fake([
        'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json' => Http::response([
            'usd' => 'USD',
            'eur' => 'EUR',
        ], 200)
    ]);

    $response = ConvertCurrency::getAllCurrenciesSymbol();
    $data = $response->getData(true);

    expect($data)->toBeArray();
});
