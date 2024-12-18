<?php

namespace Kiyatilahun\ConvertCurrency;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ConvertCurrency
{
    private $client;

    public function __construct()
    {
        $this->client = new Client;
    }

    public function convert(float $amount, string $fromCurrency, string $toCurrency)
    {
        $fromCurrency = strtolower($fromCurrency);
        $toCurrency = strtolower($toCurrency);
        $res = $this->client->request('GET', "https://latest.currency-api.pages.dev/v1/currencies/{$fromCurrency}.json", []);
        $data = json_decode($res->getBody()->getContents(), true);
        if (isset($data[$fromCurrency][$toCurrency])) {
            $exchangeRate = $data[$fromCurrency][$toCurrency];

            return $amount * $exchangeRate;
        } else {
            echo "Exchange rate data for {$toCurrency} not available.";
        }
    }

    public function getAllCurrencies(): JsonResponse
    {

        $client = new Client;
        $res = $client->request('GET', 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json', []);
        $data = json_decode($res->getBody()->getContents(), true);

        return response()->json($data);
    }

    public function getExchange($basecurrency): JsonResponse
    {

        $basecurrency = Str::lower($basecurrency);
        $client = new Client;
        $res = $client->request('GET', "https://latest.currency-api.pages.dev/v1/currencies/{$basecurrency}.json", []);
        $data = json_decode($res->getBody()->getContents(), true);

        return response()->json($data);
    }
}
