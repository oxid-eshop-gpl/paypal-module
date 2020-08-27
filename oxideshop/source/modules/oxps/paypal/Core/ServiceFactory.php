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
use OxidProfessionalServices\PayPal\Api\Service\GenericService;
use OxidProfessionalServices\PayPal\Api\Service\Catalog;

/**
 * Class ServiceFactory
 * @package OxidProfessionalServices\PayPal\Core
 *
 * Responsible for creation of PayPal service objects
 */
class ServiceFactory
{
    /**
     * @var Client
     */
    private $client;


    /**
     * @return Payments
     */
    public function getPaymentService(): Payments
    {
        return oxNew(Payments::class, $this->getClient());
    }

    /**
     * @return Orders
     */
    public function getOrderService(): Orders
    {
        return oxNew(Orders::class, $this->getClient());
    }

    /**
     * @return Catalog
     */
    public function getCatalogService(): Catalog
    {
        return new Catalog($this->getClient());
    }

    /**
     * @return GenericService
     */
    public function getNotificationService(): GenericService
    {
        return oxNew(
            GenericService::class,
            $this->getClient(),
            '/v1/notifications/verify-webhook-signature'
        );
    }

    /**
     * @return TransactionSearch
     */
    public function getTransactionSearchService(): TransactionSearch
    {
        return oxNew(TransactionSearch::class, $this->getClient());
    }

    /**
     * Get PayPal client object
     *
     * @return Client
     */
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
            //fixme: auth needs to be injected to avoid slow authentification
            //the token value should be stored in the db/oxconfig and it is valid for 8 hours

            $this->client = $client;
        }

        return $this->client;
    }
}
