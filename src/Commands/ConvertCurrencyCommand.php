<?php

namespace Kiyatilahun\ConvertCurrency\Commands;

use Illuminate\Console\Command;

class ConvertCurrencyCommand extends Command
{
    public $signature = 'ethiocurrencyconverter';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
