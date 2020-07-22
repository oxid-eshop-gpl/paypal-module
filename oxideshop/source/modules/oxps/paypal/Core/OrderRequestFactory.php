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

use DateTime;
use OxidEsales\Eshop\Application\Model\Basket;
use OxidEsales\Eshop\Application\Model\BasketItem;
use OxidEsales\Eshop\Application\Model\State;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Orders\AddressPortable;
use OxidProfessionalServices\PayPal\Api\Model\Orders\AmountBreakdown;
use OxidProfessionalServices\PayPal\Api\Model\Orders\AmountWithBreakdown;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Item;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Name;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderApplicationContext;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Payer;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PurchaseUnit;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PurchaseUnitRequest;
use OxidProfessionalServices\PayPal\Core\Utils\PriceToMoney;

/**
 * Class OrderRequestBuilder
 * @package OxidProfessionalServices\PayPal\Core
 */
class OrderRequestFactory
{
    /**
     * After you redirect the customer to the PayPal payment page, a Continue button appears.
     * Use this option when the final amount is not known when the checkout flow is initiated and you want to
     * redirect the customer to the merchant page without processing the payment.
     */
    public const USER_ACTION_CONTINUE = 'CONTINUE';

    /**
     * After you redirect the customer to the PayPal payment page, a Pay Now button appears. Use this option when the
     * final amount is known when the checkout is initiated and you want to process the payment immediately when the
     * customer clicks Pay Now
     */
    public const USER_ACTION_PAY_NOW = 'PAY_NOW';

    /**
     * @var OrderRequest
     */
    private $request;

    /**
     * @var Basket
     */
    private $basket;

    /**
     * @param Basket $basket
     * @param string $intent Order::INTENT_CAPTURE or Order::INTENT_AUTHORIZE constant values
     * @param string $userAction USER_ACTION_CONTINUE OR USER_ACTION_PAY_NOW constant values
     *
     * @return OrderRequest
     */
    public function getRequest(
        Basket $basket,
        string $intent,
        string $userAction = self::USER_ACTION_CONTINUE
    ): OrderRequest
    {
        $request = $this->request = new OrderRequest();
        $this->basket = $basket;

        $request->intent = $intent;
        if ($user = $basket->getUser()) {
            $request->payer = $this->getPayer();
        }
        $request->purchase_units = $this->getPurchaseUnits();
        $request->application_context = $this->getApplicationContext($userAction);

        return $request;
    }

    /**
     * Sets application context
     *
     * @param string $userAction
     *
     * @return OrderApplicationContext
     */
    protected function getApplicationContext(string $userAction): OrderApplicationContext
    {
        $context = new OrderApplicationContext();
        $context->brand_name = Registry::getConfig()->getActiveShop()->getFieldData('oxname');
        $context->shipping_preference = 'SET_PROVIDED_ADDRESS';
        $context->landing_page = 'LOGIN';
        $context->user_action = $userAction;

        return $context;
    }

    /**
     * @return PurchaseUnit[]
     */
    protected function getPurchaseUnits(): array
    {
        $purchaseUnit = new PurchaseUnitRequest();
        $purchaseUnit->amount = $this->getAmount();
        $purchaseUnit->items = $this->getItems();
        $purchaseUnit->payee = $this->getPayer();

        return [$purchaseUnit];
    }

    /**
     * @return AmountWithBreakdown
     */
    protected function getAmount(): AmountWithBreakdown
    {
        $amount = new AmountWithBreakdown();
        $basket = $this->basket;
        $currency = $this->basket->getBasketCurrency();

        //Total amount
        $amount->value = PriceToMoney::convert($this->basket->getPrice()->getBruttoPrice(), $currency);

        //Cost breakdown
        $breakdown = $amount->breakdown = new AmountBreakdown();

        //Item total cost
        $itemTotal = $basket->getProductsPrice()->getNettoSum();
        $breakdown->item_total = PriceToMoney::convert($itemTotal, $currency);

        //Shipping cost
        $shippingCost = $basket->getDeliveryCost()->getNettoPrice();
        $breakdown->shipping = PriceToMoney::convert($shippingCost, $currency);

        return $amount;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        $basket = $this->basket;
        $currency = $basket->getBasketCurrency();
        $items = [];

        /** @var BasketItem $basketItem */
        foreach ($basket->getContents() as $basketItem) {
            $item = new Item();
            $item->name = $basketItem->getTitle();
            $itemUnitPrice = $basketItem->getUnitPrice();
            $item->unit_amount = PriceToMoney::convert($itemUnitPrice->getNettoPrice(), $currency);
            $item->quantity = $basketItem->getAmount();
            $items[] = $item;
        }

        return $items;
    }

    /**
     * @return Payer
     */
    protected function getPayer(): Payer
    {
        $payer = new Payer();
        $user = $this->basket->getBasketUser();

        $name = $payer->name = new Name();
        $name->given_name = $user->getFieldData('oxfname');
        $name->surname = $user->getFieldData('oxlname');

        $payer->email_address = $user->getFieldData('oxusername');

        //TODO add phone number, need special format for that

        $birthDate = $user->getFieldData('oxbirthdate');
        if ($birthDate && $birthDate !== '0000-00-00') {
            /** @var DateTime $birthDate */
            $birthDate = oxNew(DateTime::class, $user->getFieldData('oxbirthdate'));
            $payer->birth_date = $birthDate->format('Y-m-d');
        }

        $state = oxNew(State::class);
        $state->load($user->getFieldData('oxstateid'));

        $address = $payer->address = new AddressPortable();
        $addressLine = $user->getFieldData('oxstreet') . " " . $user->getFieldData('oxstreetnr');
        $address->address_line_1 = $addressLine;
        $address->admin_area_1 = $state->getFieldData('oxtitle'); //TODO state codes
        $address->admin_area_2 = $user->getFieldData('oxcity');
        $address->country_code = $user->getFieldData('oxisoalpha2');
        $address->postal_code = $user->getFieldData('oxzip');

        return $payer;
    }
}