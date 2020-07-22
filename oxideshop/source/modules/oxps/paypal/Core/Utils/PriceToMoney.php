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

namespace OxidProfessionalServices\PayPal\Core\Utils;

use OxidEsales\Eshop\Core\Price;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Money;
use stdClass;

class PriceToMoney
{
    public const BRUTTO_MODE = 1;
    public const NETTO_MODE = 2;

    /**
     * @param Price | double $price
     * @param int $mode sets which price value to use with BRUTTO_MODE or NETTO_MODE constants.
     * If not set uses the mode set in the price object.
     * @param stdClass $currency currency object. If not set uses the active shop currency.
     *
     * @return Money
     */
    public static function convert($price, $currency = null, int $mode = 0): Money
    {
        if ($price instanceof Price) {
            if ($mode === self::BRUTTO_MODE) {
                $value = $price->getBruttoPrice();
            } else if ($mode === self::NETTO_MODE) {
                $value = $price->getNettoPrice();
            } else {
                $value = $price->getPrice();
            }
        } else {
            $value = (double) $price;
        }

        if (!$currency) {
            $currency = Registry::getConfig()->getActShopCurrencyObject();
        }
        $value = Registry::getUtils()->fRound($value, $currency);
        $value = number_format($value, $currency->decimal, '.', '');

        $money = new Money();
        $money->currency_code = $currency->name;
        $money->value = $value;

        return $money;
    }
}