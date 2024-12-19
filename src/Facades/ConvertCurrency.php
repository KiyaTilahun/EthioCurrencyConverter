<?php

namespace Kiyatilahun\ConvertCurrency\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kiyatilahun\ConvertCurrency\ConvertCurrency
 * @method static \Illuminate\Http\JsonResponse convertAmount(float $amount, string $fromCurrency, string $toCurrency)
 * @method static \Illuminate\Http\JsonResponse getAllCurrenciesSymbol()
 * @method static \Illuminate\Http\JsonResponse getExchangeRate(string $fromCurrency,string $tocurrency)
 * @method static \Illuminate\Http\JsonResponse getBirrExchangeRate(string $toCurrency)
 *
 */

class ConvertCurrency extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'convert_currency';
    }
}
