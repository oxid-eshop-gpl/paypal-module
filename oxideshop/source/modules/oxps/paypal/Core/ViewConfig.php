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

/**
 * @mixin \OxidEsales\Eshop\Core\ViewConfig
 */
class ViewConfig extends ViewConfig_parent
{
    /**
     * This could be
     *
     * @string continue allows adding multiple items with checkout
     * @string pay_now direct payment and capture
     *
     * @var string
     */
    private $paymentFlowStrategy = 'continue';

    /**
     * @return string
     */
    public function getPaymentFlowStrategy(): string
    {
        return $this->paymentFlowStrategy;
    }

    /**
     * @return bool
     */
    public function isPayPalActive(): bool
    {
        return $this->getPayPalConfig()->isActive();
    }

    /**
     * @return Config
     */
    public function getPayPalConfig(): Config
    {
        return oxNew(Config::class);
    }

    /**
     * Gets PayPal JS SDK url
     *
     * @return string
     */
    public function getPayPalJsSdkUrl(): string
    {
        $payPalConfig = $this->getPayPalConfig();
        $config = Registry::getConfig();

        $params = [];

        $params['client-id'] = $payPalConfig->getClientId();
        $params['integration-date'] = Constants::PAYPAL_INTEGRATION_DATE;
        $params['intent'] = strtolower(Constants::PAYPAL_ORDER_INTENT_CAPTURE);

        if ($currency = $config->getActShopCurrencyObject()) {
            $params['currency'] = strtoupper($currency->name);
        }

        $params['commit'] = $config->getTopActiveView() == 'order' ? 'true' : 'false';

        return Constants::PAYPAL_JS_SDK_URL . '?' . http_build_query($params);
    }
}
