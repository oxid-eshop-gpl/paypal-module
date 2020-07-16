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

use OxidEsales\Eshop\Application\Model\Order;
use OxidProfessionalServices\PayPal\Api\Model\Orders\AmountBreakdown;
use OxidProfessionalServices\PayPal\Api\Model\Orders\AmountWithBreakdown;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PurchaseUnit;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PurchaseUnitRequest;

/**
 * Class OrderRequestBuilder
 * @package OxidProfessionalServices\PayPal\Core
 */
class OrderRequestFactory
{
    /**
     * @var OrderRequest
     */
    private $request;

    /**
     * @param Order $order
     * @param string $intent INTENT_CAPTURE or INTENT_AUTHORIZE constant values
     *
     * @return OrderRequest
     */
    public function getRequest(Order $order, string $intent): OrderRequest
    {
        $request = $this->request = new OrderRequest();

        $request->intent = $intent;

        $purchaseUnit = new PurchaseUnitRequest();
        $purchaseUnit->reference_id = $order->getId();
        $request->purchase_units = [$purchaseUnit];

        $amount = $purchaseUnit->amount = new AmountWithBreakdown();
        $amount->currency_code = $order->getOrderCurrency()->name;

        //TODO test with different currencies
        $amount->value = $order->getTotalOrderSum();

        return $request;
    }
}