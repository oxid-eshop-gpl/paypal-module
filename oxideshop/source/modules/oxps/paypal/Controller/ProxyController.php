<?php

/**
 * This file is part of OXID eSales PayPal module.
 *
 * OXID eSales PayPal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales PayPal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales PayPal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Controller;

use Exception;
use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Core\Exception\ArticleInputException;
use OxidEsales\Eshop\Core\Exception\NoArticleException;
use OxidEsales\Eshop\Core\Exception\OutOfStockException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Order;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Controller\Admin\Service\SubscriptionService;
use OxidProfessionalServices\PayPal\Core\OrderRequestFactory;
use OxidProfessionalServices\PayPal\Core\PayPalSession;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Model\Subscription;

/**
 * Server side interface for PayPal smart buttons.
 */
class ProxyController extends FrontendController
{
    public function createOrder()
    {
        $context = (string)Registry::getRequest()->getRequestEscapedParameter('context', 'continue');

        $this->addToBasket();
        $this->setPayPalPaymentMethod();

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $service = $serviceFactory->getOrderService();

        /** @var OrderRequestFactory $requestFactory */
        $requestFactory = Registry::get(OrderRequestFactory::class);
        $request = $requestFactory->getRequest(
            Registry::getSession()->getBasket(),
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

        $this->setPayPalPaymentMethod();

        if ($response->id) {
            PayPalSession::storePayPalOrderId($response->id);
        }

        $this->outputJson($response);
    }

    public function captureOrder()
    {
        $context = (string)Registry::getRequest()->getRequestEscapedParameter('context', 'continue');

        if ($orderId = (string)Registry::getRequest()->getRequestEscapedParameter('orderID')) {
            /** @var ServiceFactory $serviceFactory */
            $serviceFactory = Registry::get(ServiceFactory::class);
            $service = $serviceFactory->getOrderService();
            $request = new OrderCaptureRequest();

            try {
                /** @var Order $response */
                if ($context === 'pay_now') {
                    $response = $service->capturePaymentForOrder('', $orderId, $request, '');
                } else {
                    $response = $service->showOrderDetails($orderId);
                }
            } catch (Exception $exception) {
                Registry::getLogger()->error("Error on order capture call.", [$exception]);
            }

            $this->outputJson($response);
        }
    }

    public function createSubscriptionOrder()
    {
        // Remove all items from the basket
        // because subscriptions can only work with one subscription product at a time
        $session = Registry::getSession();
        $session->getBasket()->deleteBasket();

        $subscriptionPlanId = Registry::getRequest()->getRequestEscapedParameter('subscriptionPlanId');
        $session->setVariable('subscriptionPlanIdForBasket', $subscriptionPlanId);

        $this->addToBasket();
        $this->setPayPalPaymentMethod();
        $this->outputJson([true]);
    }

    public function saveSubscriptionOrder()
    {
        PayPalSession::subscriptionIsProcessing();

        $subscriptionPlanId = Registry::getRequest()->getRequestEscapedParameter('subscriptionPlanId');
        $subscriptionId = Registry::getRequest()->getRequestEscapedParameter('subscriptionId');

        $subscriptionService = new SubscriptionService();
        $subscription = $subscriptionService->subscriptionService->showPlanDetails('string', $subscriptionPlanId, 1);

        $time = date('Y-m-d H:i:s');

        $data = [];
        $data['plan_id'] = $subscriptionPlanId;
        $data['subscription_id'] = $subscriptionId;
        $data['email_address'] = Registry::getSession()->getUser()->getFieldData('OXUSERNAME');
        $data['status'] = $subscription->status;
        $data['create_time'] = $time;
        $data['update_time'] = $time;
        $data['start_time'] = $time;
        $data['status_update_time'] = $time;

        $model = new Subscription();
        $model->saveSubscription($data);
        $model->saveSubscriptionProductOrder($subscriptionPlanId, $subscriptionId);
    }

    public function cancelPayPalPayment()
    {
        PayPalSession::unsetPayPalOrderId();
        Registry::getSession()->getBasket()->setPayment(null);
        Registry::getUtils()->redirect(Registry::getConfig()->getShopHomeUrl() . 'cl=payment', false, 301);
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

    public function addToBasket($qty = 1): void
    {
        if ($aid = (string)Registry::getRequest()->getRequestEscapedParameter('aid')) {
            try {
                Registry::getSession()->getBasket()->addToBasket($aid, $qty);
            } catch (OutOfStockException $exception) {
                Registry::getUtilsView()->addErrorToDisplay($exception);
            } catch (ArticleInputException $exception) {
                Registry::getUtilsView()->addErrorToDisplay($exception);
            } catch (NoArticleException $exception) {
                Registry::getUtilsView()->addErrorToDisplay($exception);
            }
            Registry::getSession()->getBasket()->calculateBasket(false);
        }
    }

    public function setPayPalPaymentMethod(): void
    {
        Registry::getSession()->getBasket()->setPayment('oxidpaypal');
        Registry::getSession()->setVariable('paymentid', 'oxidpaypal');
    }
}
