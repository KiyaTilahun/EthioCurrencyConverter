<?php

namespace Kiyatilahun\ConvertCurrency\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kiyatilahun\ConvertCurrency\ConvertCurrency
 */
class ConvertCurrency extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Kiyatilahun\ConvertCurrency\ConvertCurrency::class;
    }
}
