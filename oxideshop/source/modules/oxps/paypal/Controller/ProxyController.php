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

use Exception;
use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Order;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Core\OrderManager;
use OxidProfessionalServices\PayPal\Core\OrderRequestFactory;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;

/**
 * Server side interface for PayPal smart buttons.
 */
class ProxyController extends FrontendController
{

    public function createOrder()
    {
        $context = (string) Registry::getRequest()->getRequestEscapedParameter('context', 'continue');

        $basket = Registry::getSession()->getBasket();

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $service = $serviceFactory->getOrderService();

        /** @var OrderRequestFactory $requestFactory */
        $requestFactory = Registry::get(OrderRequestFactory::class);
        $request = $requestFactory->getRequest(
            $basket,
            OrderRequest::INTENT_CAPTURE,
            $context === 'continue' ?
                OrderRequestFactory::USER_ACTION_CONTINUE :
                OrderRequestFactory::USER_ACTION_PAY_NOW
        );

        try {
            $response = $service->createOrder($request, '', '');
        } catch (Exception $exception) {
            Registry::getLogger()->error("Error on order create call.", [$exception]);
        }

        $this->outputJson($response);
    }

    public function captureOrder()
    {
        $context = (string) Registry::getRequest()->getRequestEscapedParameter('context', 'continue');

        if ($orderId = (string) Registry::getRequest()->getRequestEscapedParameter('orderID')) {

            $orderManager = new OrderManager();

            /** @var ServiceFactory $serviceFactory */
            $serviceFactory = Registry::get(ServiceFactory::class);
            $service = $serviceFactory->getOrderService();

            $request = new OrderCaptureRequest();
            try {
                /** @var Order $response */
                if($context !== 'continue') {
                    $response = $service->capturePaymentForOrder('', $orderId, $request, '');
                    $orderManager->prepareOrderForPayNowFromCaptureOrderResponse($response);
                } else {
                    $orderManager->prepareOrderForContinueFromCaptureOrderResponse($response);
                }
            } catch (Exception $exception) {
                Registry::getLogger()->error("Error on order capture call.", [$exception]);
            }

            $this->outputJson($response);
        }
    }

    /**
     * Encodes and sends response as json
     *
     * @param $response
     */
    protected function outputJson($response)
    {
        $utils = Registry::getUtils();
        $utils->setHeader('Content-Type: application/json');
        $utils->showMessageAndExit(json_encode($response));
    }
}
