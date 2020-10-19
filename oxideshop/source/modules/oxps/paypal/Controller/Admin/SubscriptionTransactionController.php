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

use DateTime;
use Exception;
use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\TransactionsList;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;

class SubscriptionTransactionController extends AdminController
{
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTemplateName('paypal_subscription_transactions.tpl');
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        try {
            $this->addTplParam('subscriptionId', $this->getSubscriptionId());
            $this->addTplParam('filters', $this->getFilters());
            $this->addTplParam('transactions', $this->getTransactions());
        } catch (ApiException $exception) {
            if ($exception->shouldDisplay()) {
                $this->addTplParam('error', $exception->getErrorDescription());
            }
            Registry::getLogger()->error($exception);
        }

        return parent::render();
    }

    /**
     * Get transaction list subscription
     *
     * @return TransactionsList
     * @throws ApiException
     * @throws Exception
     */
    private function getTransactions(): TransactionsList
    {
        $filters = $this->getFilters();
        $subscriptionId = $this->getSubscriptionId();

        if (!$subscriptionId || empty($filters['startTime']) || empty($filters['endTime'])) {
            return new TransactionsList();
        }

        /**
         * @var ServiceFactory $serviceFactory
         */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        return $subscriptionService->listTransactionsForSubscription(
            $subscriptionId,
            (new DateTime($filters['startTime']))->format('Y-m-d\TH:i:s\.v\Z'),
            (new DateTime($filters['endTime']))->format('Y-m-d\TH:i:s\.v\Z')
        );
    }

    /**
     * Get used filter values
     *
     * @return array
     */
    private function getFilters(): array
    {
        return Registry::getRequest()->getRequestEscapedParameter('filters', []);
    }

    /**
     * Get subscription ID
     *
     * @return string
     */
    private function getSubscriptionId(): string
    {
        return Registry::getRequest()->getRequestEscapedParameter('subscriptionId', '');
    }
}
