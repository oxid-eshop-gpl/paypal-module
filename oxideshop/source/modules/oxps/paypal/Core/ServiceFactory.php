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
use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Service\Orders;

/**
 * Class ServiceFactory
 * @package OxidProfessionalServices\PayPal\Core
 */
class ServiceFactory
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @return Orders
     */
    public function getOrderService(): Orders
    {
        return oxNew(Orders::class, $this->getClient());
    }

    private function getClient(): Client
    {
        if ($this->client === null) {
            /** @var Config $config */
            $config = oxNew(Config::class);

            $client = new Client(
                Registry::getLogger(),
                $config->isSandbox() ? Client::SANDBOX_URL : Client::PRODUCTION_URL,
                $config->getClientId(),
                $config->getClientSecret(),
                '',
                // must be empty. We do not have the merchant's payerid
                //and confirmed by paypal we should not use it for auth and
                //so not ask for it on the configuration page
                false
            );

            $this->client = $client;
        }

        return $this->client;
    }
}
