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

namespace OxidProfessionalServices\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Money;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\BillingCycle;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Frequency;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\PricingScheme;
use OxidProfessionalServices\PayPal\Api\Service\Subscriptions;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;

/**
 * Controller for admin > Paypal/Configuration page
 */
class PaypalBillingPlansController extends AdminController
{
    public const MODULE_ID = 'module:oxps/paypal';

    public function __construct()
    {
        parent::__construct();

        $this->_sThisTemplate = 'paypalbillingplanstemplate.tpl';
    }

    public function getBillingCycles()
    {
        $billingCycle = new BillingCycle();
        $billingCycle->pricing_scheme = new PricingScheme();

        $money = new Money();
        $money->value = 10;
        $money->currency_code = 'EUR';

        $billingCycle->pricing_scheme->fixed_price = $money;
        $billingCycle->frequency = Frequency::INTERVAL_UNIT_MONTH;
        $billingCycle->tenure_type = BillingCycle::TENURE_TYPE_REGULAR;
    }

    public function getPricingScheme($id): Product
    {
        /**
         * @var ServiceFactory $sf
         */
        $sf = Registry::get(ServiceFactory::class);

        /** @var Subscriptions $cs */
        $cs = $sf->getSubscriptionService();

//        $pricingScheme = new PricingScheme();
//        $pricingScheme->fixed_price = '';
//        $pricingScheme->tiers = '';

//        $cs->s

//        $billingcycle = new BillingCycle();
//        $billingcycle->pricing_scheme = new PricingScheme();
//        $billingcycle->pricing_scheme->tiers = new PricingTier();
    }

    /**
     * @return string
     */
    public function render()
    {
        $thisTemplate = parent::render();

        return $thisTemplate;
    }

    /**
     * Saves configuration values
     */
    public function save()
    {
        parent::save();
    }
}
