<?php

/**
 * This file is part of OXID eSales Paypal module.
 *
 * OXID eSales Paypal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Paypal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Paypal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Core;

class Currency
{
    /**
     * ISO-4217 currency codes that PayPal supports
     */
    private const CODES = [
        'AUD', 'BRL', 'CAD', 'CNY', 'CZK', 'DKK', 'EUR', 'HKD', 'HUF', 'INR', 'ILS', 'JPY', 'MYR', 'MXN', 'TWD',
        'NZD', 'NOK', 'PHP', 'PLN', 'GBP', 'RUB', 'SGD', 'SEK', 'CHF', 'THB', 'USD'
    ];


    /**
     * Currency codes that PayPal does not support fractions for
     */
    private const NON_DECIMAL = [
        'JPY', 'HUF', 'TWD'
    ];

    /**
     * Get supported currency codes
     *
     * @return string[]
     */
    public static function getCurrencyCodes(): array
    {
        return self::CODES;
    }

    /**
     * Returns the amount value as a string in the lowest denomination of the currency
     * In case no currency is provided it formats the amount as a currency with 2 decimal positions
     *
     * @param $value
     * @param $currency
     *
     * @return string
     */
    public static function formatAmountInLowestDenominator(float $value, string $currency = null): string
    {
        $decimals = in_array($currency, self::NON_DECIMAL) ? 0 : 2;

        return number_format($value, $decimals, '', '');
    }
}
