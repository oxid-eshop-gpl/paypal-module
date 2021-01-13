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

use OxidEsales\Eshop\Core\Registry;

class PaypalSession
{
    /**
     * Paypal store checkoutOrderId
     *
     * @param $checkoutOrderId
     */
    public static function storePaypalOrderId($checkoutOrderId): void
    {
        Registry::getSession()->setVariable(
            Constants::SESSION_CHECKOUT_ORDER_ID,
            $checkoutOrderId
        );
    }

    /**
     * Paypal remove checkoutOrderId
     */
    public static function unsetPaypalOrderId()
    {
        Registry::getSession()->deleteVariable(
            Constants::SESSION_CHECKOUT_ORDER_ID
        );
    }

    /**
     * Checks if active Paypal Order exists
     *
     * @return bool
     */
    public static function isPaypalOrderActive(): bool
    {
        if (!self::getcheckoutOrderId()) {
            return false;
        }

        return true;
    }

    /**
     * Paypal checkout order id getter
     *
     * @return mixed
     */
    public static function getcheckoutOrderId()
    {
        return Registry::getSession()->getVariable(Constants::SESSION_CHECKOUT_ORDER_ID);
    }

    public static function subscriptionIsProcessing(): void
    {
        Registry::getSession()->setVariable('SessionIsProcessing', true);
    }

    public static function subscriptionIsDoneProcessing(): void
    {
        Registry::getSession()->deleteVariable('SessionIsProcessing');
    }

    public static function isSubscriptionProcessing(): bool
    {
        $isSubscriptionProcessing = Registry::getSession()->getVariable('SessionIsProcessing');
        return empty($isSubscriptionProcessing) ? false : true;
    }
}
