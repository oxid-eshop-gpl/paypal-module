<?php

/**
 * This file is part of OXID eSales PayPal module.
 *
 * OXID eSales PayPal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales PayPal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales PayPal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Model;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Application\Model\RequiredAddressFields;

/**
 * PayPal oxOrder class
 *
 * @mixin \OxidEsales\Eshop\Application\Model\Order
 */
class User extends User_parent
{
    /**
     * @return false if User has no subscriped the product
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     */
    public function hasSubscribed($subscriptionPlanId = '')
    {
        $select = 'SELECT oxps_paypal_subscription.`oxid`
            FROM oxps_paypal_subscription
            LEFT JOIN oxps_paypal_subscription_product
            ON (oxps_paypal_subscription.`oxpaypalsubprodid` = oxps_paypal_subscription_product.`oxid`)
            WHERE oxps_paypal_subscription.`oxuserid` = ?
            AND oxps_paypal_subscription_product.`paypalsubscriptionplanid` = ?';

        $result = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getRow(
            $select,
            [
                $this->getId(),
                $subscriptionPlanId
            ]
        );

        return $result ? true : false;
    }

    /**
     * get the InvoiceAddress from user with all required fields
     * @return array
     */
    public function getInvoiceAddress()
    {
        $result = [];
        $requiredAddressFields = oxNew(RequiredAddressFields::class);
        foreach ($requiredAddressFields->getBillingFields() as $requiredAddressField) {
            $result[$requiredAddressField] = $this->{$requiredAddressField}->value;
        }

        return $result;
    }
}
