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

use OxidEsales\Eshop\Application\Controller\Admin\AdminListController;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\ResponseDisputeSearch;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;

class DisputeController extends AdminListController
{
    /**
     * @var ResponseDisputeSearch
     */
    private $response;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTemplateName('paypal_disputes.tpl');
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        try {
            $this->addTplParam('filters', $this->getFilters());
            $this->addTplParam('disputes', $this->getResponse());
            $this->addTplParam('nextPageToken', $this->getNextPageToken());
        } catch (ApiException $exception) {
            if ($exception->shouldDisplay()) {
                $this->addTplParam('error', Registry::getLang()->translateString(
                    'OXPS_PAYPAL_ERROR_' . $exception->getErrorIssue()
                ));
            }
            Registry::getLogger()->error($exception);
        }

        return parent::render();
    }

    /**
     * @return ResponseDisputeSearch
     * @throws ApiException
     */
    protected function getResponse(): ResponseDisputeSearch
    {
        if (!$this->response) {
            /** @var ServiceFactory $serviceFactory */
            $serviceFactory = Registry::get(ServiceFactory::class);
            $filters = $this->getFilters();
            $disputeService = $serviceFactory->getDisputeService();
            $this->response = $disputeService->listDisputesSummary(
                //TODO: at this moment combination of page and page_size does not return correctly paginated result.
                0,
                1,
                $filters['transactionId'],
                $filters['disputeState'],
                $filters['startTime'],
                Registry::getRequest()->getRequestEscapedParameter('pagetoken')
            );
        }

        return $this->response;
    }

    /**
     * Get next page token
     *
     * @return string
     */
    protected function getNextPageToken(): string
    {
        $token = '';
        $response = $this->getResponse();

        foreach ($response->links as $link) {
            if ($link['rel'] == 'next') {
                $parts = parse_url($link['href']);
                parse_str($parts['query'], $params);
                $token = $params['next_page_token'];
            }
        }

        return $token;
    }

    /**
     * @return array
     */
    protected function getFilters(): array
    {
        return (array) Registry::getRequest()->getRequestEscapedParameter('filters');
    }
}
