<?php

namespace App\Helpers;

use App\Currency;

use Illuminate\Support\Facades\Cookie;

class HelperCurrency
{
    public static function getToDolarPrice()
    {
        $currency = 'IDR';
        if (Cookie::has('currency')) {
            $currency = Cookie::get('currency');
        }

        $priceToDolar = Currency::select('to_dolar')->where('currency', $currency)->first();

        return $priceToDolar->to_dolar;
    }
}
