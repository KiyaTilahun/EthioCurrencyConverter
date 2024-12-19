<?php

namespace Kiyatilahun\ConvertCurrency;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;
use Illuminate\Support\Str;
use function Pest\Laravel\json;

class ConvertCurrency
{

    private $client;
    public function __construct()
    {

    }

    /**
     * convert
     *
     * @param  mixed $amount
     * @param  mixed $fromCurrency
     * @param  mixed $toCurrency
     * @return void
     */
    public static function convertAmount(float $amount, string $fromCurrency, string $toCurrency):JsonResponse
    {
        $fromCurrency = strtolower($fromCurrency);
        $toCurrency = strtolower($toCurrency);
         $client = new Client();
        $res = $client->request('GET', "https://latest.currency-api.pages.dev/v1/currencies/{$fromCurrency}.json", []);
        $data = json_decode($res->getBody()->getContents(), true);
        if (isset($data[$fromCurrency][$toCurrency])) {
            $exchangeRate = $data[$fromCurrency][$toCurrency];
            return response()->json([
                'success' => true,
                'message' => 'Conversion successful',
                'data' => [
                    'amount' =>  number_format($amount, 1),
                    'from_currency' => $fromCurrency,
                    'to_currency' => $toCurrency,
                    'exchange_rate'=>$exchangeRate,
                    'converted_amount' => $amount*$exchangeRate,
                ],
            ]);
        } else {
            return response()->json("No Response",404);
        }
    }

    /**
     * getAllCurrenciesSymbol
     *
     * @return JsonResponse
     */
    public function getAllCurrenciesSymbol(): JsonResponse
    {
        try{
        $client = new Client();
        $res = $client->request('GET', 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json', []);
        $data = json_decode($res->getBody()->getContents());
        return response()->json($data);
        }
        catch (\Exception $e){
            return response()->json("No Response",404);
        }
    }

    /**
     * getExchangeRates
     *
     * @param  mixed $basecurrency
     * @return JsonResponse
     */
    public function getExchangeRate(string $fromCurrency,$toCurrency): JsonResponse
    {
        $fromCurrency = strtolower($fromCurrency);
        $toCurrency = strtolower($toCurrency);
         $client = new Client();
        $res = $client->request('GET', "https://latest.currency-api.pages.dev/v1/currencies/{$fromCurrency}.json", []);
        $data = json_decode($res->getBody()->getContents(), true);
        if (isset($data[$fromCurrency][$toCurrency])) {
            $exchangeRate = $data[$fromCurrency][$toCurrency];
            return response()->json([
                'success' => true,
                'message' => 'Conversion successful',
                'data' => [
                    'from_currency' => $fromCurrency,
                    'to_currency' => $toCurrency,
                    'exchange_rate'=>$exchangeRate,
                ],
            ]);
        } else {
            //

            return response()->json("No Response",404);
        }
    }


    /**
     * getBirrExchange
     *
     * @param  mixed $toCurrency
     * @return void
     */
    public function getBirrExchangeRate($toCurrency){
        $toCurrency = strtolower($toCurrency);

        $client = new Client();
        $res = $client->request('GET', "https://latest.currency-api.pages.dev/v1/currencies/etb.json", []);
        $data = json_decode($res->getBody()->getContents(), true);
        if (isset($data['etb'][$toCurrency])) {
            $exchangeRate = $data['etb'][$toCurrency];
            return response()->json([
                'success' => true,
                'message' => 'Conversion successful',
                'data' => [
                    'from_currency' => 'etb',
                    'to_currency' => $toCurrency,
                    'exchange_rate'=>$exchangeRate,

                ],
            ]);
        } else {
            return response()->json("No Response",404);
        }
    }

}
