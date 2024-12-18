<?php

namespace Kiyatilahun\ConvertCurrency;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

use function Pest\Laravel\json;

class ConvertCurrency {

     /**
     * Predefined exchange rates.
     * The rates are defined as ['FROM_CURRENCY' => ['TO_CURRENCY' => RATE]].
     *
     * @var array
     */
    protected $exchangeRates = [
        'USD' => [
            'EUR' => 0.85,
            'GBP' => 0.75,
            // Add more target currencies as needed
        ],
        'EUR' => [
            'USD' => 1.18,
            'GBP' => 0.88,
            // Add more target currencies as needed
        ],
        // Add more base currencies as needed
    ];

    /**
     * Convert an amount from one currency to another using predefined exchange rates.
     *
     * @param float $amount
     * @param string $fromCurrency
     * @param string $toCurrency
     * @return float
     * @throws InvalidArgumentException if the currency pair is not supported
     */
    public function convert(float $amount, string $fromCurrency, string $toCurrency): float
    {
        $fromCurrency = strtoupper($fromCurrency);
        $toCurrency = strtoupper($toCurrency);

        // Check if the base currency and target currency are supported
        if (!isset($this->exchangeRates[$fromCurrency][$toCurrency])) {
            throw new InvalidArgumentException("Conversion from {$fromCurrency} to {$toCurrency} is not supported.");
        }

        // Retrieve the exchange rate
        $rate = $this->exchangeRates[$fromCurrency][$toCurrency];

        // Calculate the converted amount
        $convertedAmount = $amount * $rate;

        return round($convertedAmount, 2);
    }
    public function getAllCurrencies() : JsonResponse {

        $client = new Client();
        $res = $client->request('GET', 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json', [
]);
        $data = json_decode($res->getBody()->getContents(), true);

return response()->json($data);
    }
}
