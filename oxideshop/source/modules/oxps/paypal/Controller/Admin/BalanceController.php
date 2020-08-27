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
use OxidEsales\Eshop\Application\Controller\Admin\AdminListController;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Api\Model\TransactionSearch\BalancesResponse;

class BalanceController extends AdminListController
{
    /**
     * Current class template name.
     *
     * @var string
     */
    protected $_sThisTemplate = 'paypal_balances.tpl';

    /**
     * @return string
     */
    public function getAsOfTime()
    {
        return (string) Registry::getRequest()->getRequestEscapedParameter('asOfTime');
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return (string) Registry::getRequest()->getRequestEscapedParameter('currencyCode');
    }

    /**
     * @return BalancesResponse|null
     */
    public function getBalances()
    {
        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $transactionService = $serviceFactory->getTransactionSearchService();

        try {
            $response = $transactionService->listAllBalances(
                (new DateTime($this->getAsOfTime()))->format(DateTime::ISO8601),
                $this->getCurrencyCode()
            );
        } catch (ApiException $exception) {
            Registry::getLogger()->error('Error when fetching balance data', [$exception]);
        }

        return $response;
    }
}
