# This is my package ethiocurrencyconverter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kiyatilahun/ethiocurrencyconverter.svg?style=flat-square)](https://packagist.org/packages/kiyatilahun/ethiocurrencyconverter)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/kiyatilahun/ethiocurrencyconverter/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/kiyatilahun/ethiocurrencyconverter/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/kiyatilahun/ethiocurrencyconverter/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/kiyatilahun/ethiocurrencyconverter/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kiyatilahun/ethiocurrencyconverter.svg?style=flat-square)](https://packagist.org/packages/kiyatilahun/ethiocurrencyconverter)


## Installation

You can install the package via composer:

```bash
composer require kiyatilahun/ethiocurrencyconverter
```

## Usage
To convert From one currency to another  
```php
ConvertCurrency::convertAmount($amount, $fromcurrency, $tocurrency);
ConvertCurrency::convertAmount(100, 'usd', 'etb');
```
To get all currency symbols
```php
ConvertCurrency::getAllCurrenciesSymbol();
```
To get all currency symbols
```php
ConvertCurrency::getAllCurrenciesSymbol();
```

To get the exchange rate between two currencies
```php
ConvertCurrency::getExchangeRate($fromcurrency, $tocurrency);
ConvertCurrency::getExchangeRate('usd', 'etb');
```

To get the exchange rate from Ethiopian Birr (ETB) to another currency
```php
ConvertCurrency::getBirrExchangeRate($tocurrency);
ConvertCurrency::getBirrExchangeRate('usd');
```



## Credits

- [kiyatilahun](https://github.com/KiyaTilahun)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
