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
use OxidProfessionalServices\PayPal\Api\Model\Disputes\AddressPortable;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\Money;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\RequestEscalate;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\RequestMakeOffer;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\RequestSendMessage;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\ResponseDispute;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Service\DisputeService;

class DisputeDetailsController extends AdminListController
{
    /**
     * @var ResponseDispute
     */
    private $dispute;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTemplateName('paypal_dispute_details.tpl');
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        try {
            $this->addTplParam('dispute', $this->getDispute());
        } catch (ApiException $exception) {
            if ($exception->shouldDisplay()) {
                $this->addTplParam(
                    'error',
                    Registry::getLang()->translateString(
                        'OXPS_PAYPAL_ERROR_' . $exception->getErrorIssue()
                    )
                );
            }
            Registry::getLogger()->error($exception);
        }

        return parent::render();
    }

    /**
     * @inheritDoc
     */
    public function executeFunction($functionName)
    {
        try {
            parent::executeFunction($functionName);
        } catch (ApiException $exception) {
            $this->addTplParam('error', $exception->getErrorDescription());
            Registry::getLogger()->error($exception);
        }
    }

    /**
     * Get dispute
     *
     * @return ResponseDispute
     */
    private function getDispute(): ResponseDispute
    {
        if (!$this->dispute) {
            /** @var ServiceFactory $serviceFactory */
            $disputeService = Registry::get(ServiceFactory::class)->getDisputeService();
            $this->dispute = $disputeService->showDisputeDetails($this->getEditObjectId());
        }

        return $this->dispute;
    }

    /**
     * Sends merchants dispute message
     *
     * @throws ApiException
     */
    public function sendMessage(): void
    {
        $disputeId = $this->getEditObjectId();
        $messageRequest = new RequestSendMessage();
        $messageRequest->message = Registry::getRequest()->getRequestEscapedParameter('message');
        $this->getDisputeService()->sendMessageAboutDisputeToOtherParty($disputeId, $messageRequest);
    }

    /**
     * Action for making offers to resolve disputes
     *
     * @throws ApiException
     */
    public function makeOffer(): void
    {
        $request = Registry::getRequest();
        $disputeId = $this->getEditObjectId();

        $offerRequest = new RequestMakeOffer();
        $offerRequest->note = (string) $request->getRequestEscapedParameter('note');
        $offerRequest->offer_type = (string) $request->getRequestEscapedParameter('offerType');

        $offerAmount = (array) $request->getRequestEscapedParameter('offerAmount');
        if (!empty($offerAmount['value'])) {
            $offerRequest->offer_amount = new Money($offerAmount);
        }

        $this->getDisputeService()->makeOfferToResolveDispute($disputeId, $offerRequest);
    }

    /**
     * Action for making offers to resolve disputes
     *
     * @throws ApiException
     */
    public function escalate(): void
    {
        $disputeId = $this->getEditObjectId();
        $request = new RequestEscalate(['note' => Registry::getRequest()->getRequestEscapedParameter('note')]);

        $this->getDisputeService()->escalateDisputeToClaim($disputeId, $request);
    }

    /**
     * @return DisputeService
     */
    protected function getDisputeService(): DisputeService
    {
        return Registry::get(ServiceFactory::class)->getDisputeService();
    }
}
