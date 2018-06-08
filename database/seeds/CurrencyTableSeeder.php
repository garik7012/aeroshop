<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = ["UAH" => 1, "USD" => 26, "GBP" => 35, "EUR" => 31, "JPY" => 0.24];
        foreach ($currencies as $code => $rate) {
            $currency = new Currency();
            $currency->code = $code;
            $currency->rate = $rate;
            $currency->save();
        }
    }
}
