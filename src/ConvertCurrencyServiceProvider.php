<?php

namespace Kiyatilahun\ConvertCurrency;

use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Kiyatilahun\ConvertCurrency\Commands\ConvertCurrencyCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

class ConvertCurrencyServiceProvider extends ServiceProvider
{
    // public function configurePackage(Package $package): void
    // {
    //     /*
    //      * This class is a Package Service Provider
    //      *
    //      * More info: https://github.com/spatie/laravel-package-tools
    //      */
    //     $package
    //         ->name('ethiocurrencyconverter')
    //         ->hasInstallCommand(function (InstallCommand $command) {
    //             $command
    //                 ->publishConfigFile()
    //                 ->publishAssets()
    //                 ->publishMigrations()
    //                 ->copyAndRegisterServiceProviderInApp();
    //         });
    // }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $config = realpath(__DIR__.'/../config/ethiocurrencyconverter.php');

            $this->publishes([
                $config => config_path('ethiocurrencyconverter.php')
            ]);

        }
    }


      /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/ethiocurrencyconverter.php', 'ethiocurrencyconverter');

        // Register the main class to use with the facade
        $this->app->singleton('convert_currency', function ($app) {
            return new ConvertCurrency();
        });


        $this->app->alias('convert_currency', "KiyaTilahun\ConvertCurrency\ConvertCurrency");

    }
}
