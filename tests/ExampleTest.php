<?php

use Kiyatilahun\ConvertCurrency\Facades\ConvertCurrency;

it('can test', function () {
    expect(true)->toBeTrue();
});
it('converts currency correctly', function () {
    // Arrange: Mock the ConvertCurrency facade


    // Act: Call the convert method
    // $result = ConvertCurrency::convert(100, 'USD', 'EUR');
    $result = ConvertCurrency::getAllCurrencies();
     dd($result);

    // Assert: Verify the result
    expect($result)->toBe(85.0);
});
