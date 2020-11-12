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

namespace OxidProfessionalServices\PayPal\Controller;

use OxidEsales\Eshop\Core\Registry;

/**
 * Class OrderController
 * @package OxidProfessionalServices\PayPal\Controller
 *
 * @mixin \OxidEsales\Eshop\Application\Controller\OrderController
 */
class OrderController extends OrderController_parent
{
    public function init()
    {
        $isSubscribe = Registry::getRequest()->getRequestEscapedParameter('subscribe', 0);

        if ($isSubscribe) {
            $func = Registry::getRequest()->getRequestEscapedParameter('func');

            if ($func === 'doOrder') {
                $this->addTplParam('submitCart', 1);
                $session = $this->getSession();
                $session->setVariable('isSubscriptionCheckout', true);
            }
            $this->setPayPalAsPaymentMethod();
        }
        parent::init();
    }

    public function execute()
    {
        $ret = parent::execute();

        if (strpos($ret, 'thankyou') === false) {
            return $ret;
        }

        return $ret;
    }

    private function setPayPalAsPaymentMethod()
    {
        $payment = $this->getBasket()->getPaymentId();
        if (($payment !== 'oxidpaypal')) {
            $this->getBasket()->setPayment('oxidpaypal');
        }
    }
}
