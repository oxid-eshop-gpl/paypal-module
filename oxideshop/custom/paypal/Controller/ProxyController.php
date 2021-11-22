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
use OxidEsales\Eshop\Application\Model\Address;
use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\Eshop\Application\Model\User;
use OxidEsales\Eshop\Application\Model\PaymentList;
use OxidEsales\Eshop\Application\Model\DeliverySetList;
use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Application\Component\UserComponent;
use OxidEsales\Eshop\Core\Exception\ArticleInputException;
use OxidEsales\Eshop\Core\Exception\NoArticleException;
use OxidEsales\Eshop\Core\Exception\OutOfStockException;
use OxidEsales\Eshop\Core\Email;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Controller\Admin\Service\SubscriptionService;
use OxidProfessionalServices\PayPal\Core\OrderRequestFactory;
use OxidProfessionalServices\PayPal\Core\PayPalSession;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Repository\SubscriptionRepository;

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
            OrderRequestFactory::USER_ACTION_CONTINUE
        );

        try {
            $response = $service->createOrder($request, '', '');
        } catch (Exception $exception) {
            Registry::getLogger()->error("Error on order create call.", [$exception]);
        }

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
                $response = $service->showOrderDetails($orderId);
            } catch (Exception $exception) {
                Registry::getLogger()->error("Error on order capture call.", [$exception]);
            }

            // create user if it is not exists
            if (!$user = $this->getUser()) {
                $userComponent = oxNew(UserComponent::class);
                $userComponent->createPayPalGuestUser($response);
                $this->setPayPalPaymentMethod();
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

        $billingAgreementId = Registry::getRequest()->getRequestEscapedParameter('billingAgreementId');
        $subscriptionPlanId = Registry::getRequest()->getRequestEscapedParameter('subscriptionPlanId');

        $repository = new SubscriptionRepository();
        $repository->saveSubscriptionOrder($billingAgreementId, $subscriptionPlanId);
    }

    public function cancelPayPalPayment()
    {
        PayPalSession::unsetPayPalOrderId();
        Registry::getSession()->getBasket()->setPayment(null);
        Registry::getUtils()->redirect(Registry::getConfig()->getShopHomeUrl() . 'cl=payment', false, 301);
    }

    public function sendCancelRequest()
    {
        $repository = new SubscriptionRepository();
        $lang = Registry::getLang();
        $orderId = Registry::getRequest()->getRequestEscapedParameter('orderId');

        if (
            $orderId &&
            !$repository->isCancelRequestSended($orderId)
        ) {
            $repository->setCancelRequestSended($orderId);

            $order = oxNew(Order::class);
            $order->load($orderId);

            $user = oxNew(User::class);
            $user->load($order->oxorder__oxuserid->value);

            $userName = $user->oxuser__oxfname->value . ' ' . $user->oxuser__oxlname->value;
            $customerNo = $user->oxuser__oxcustnr->value;
            $orderNo = $order->oxorder__oxordernr->value;

            $message = sprintf(
                $lang->translateString('OXPS_PAYPAL_SUBSCRIPTION_UNSUBSCRIBE_MAIL'),
                $userName,
                $customerNo,
                $orderNo
            );

            $mailer = oxNew(Email::class);
            $mailer->sendContactMail(
                '',
                $lang->translateString('OXPS_PAYPAL_SUBSCRIPTION_UNSUBSCRIBE_HEAD'),
                $message
            );
        }
        $this->outputJson([true]);
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
        $basket = Registry::getSession()->getBasket();
        $utilsView = Registry::getUtilsView();

        if ($aid = (string)Registry::getRequest()->getRequestEscapedParameter('aid')) {
            try {
                $basket->addToBasket($aid, $qty);
            } catch (OutOfStockException $exception) {
                $utilsView->addErrorToDisplay($exception);
            } catch (ArticleInputException $exception) {
                $utilsView->addErrorToDisplay($exception);
            } catch (NoArticleException $exception) {
                $utilsView->addErrorToDisplay($exception);
            }
            $basket->calculateBasket(false);
        }
    }

    public function setPayPalPaymentMethod(): void
    {
        $session = Registry::getSession();
        $basket = $session->getBasket();
        $countryId = $this->getDeliveryCountryId;
        $user = null;

        if ($activeUser = $this->getUser()) {
            $user = $activeUser;
        }

        if ($session->getVariable('paymentid') !== 'oxidpaypal') {
            $possibleDeliverySets = [];

            $deliverySetList = Registry::get(DeliverySetList::class)
            ->getDeliverySetList(
                $user,
                $countryId
            );
            foreach ($deliverySetList as $deliverySet) {
                $paymentList = Registry::get(PaymentList::class)->getPaymentList(
                    $deliverySet->getId(),
                    $basket->getPrice()->getBruttoPrice(),
                    $user
                );
                if (array_key_exists('oxidpaypal', $paymentList)) {
                    $possibleDeliverySets[] = $deliverySet->getId();
                }
            }

            if (count($possibleDeliverySets)) {
                $basket->setPayment('oxidpaypal');
                $shippingSetId = reset($possibleDeliverySets);
                $basket->setShipping($shippingSetId);
                $session->setVariable('sShipSet', $shippingSetId);
                $session->setVariable('paymentid', 'oxidpaypal');
            }
        }
    }

    /**
     * Tries to fetch user delivery country ID
     *
     * @return string
     */
    protected function getDeliveryCountryId()
    {
        $config = Registry::getConfig();
        $user = $this->getUser();

        $countryId = null;

        if (!$user) {
            $homeCountry = $config->getConfigParam('aHomeCountry');
            if (is_array($homeCountry)) {
                $countryId = current($homeCountry);
            }
        } else {
            if ($delCountryId = $config->getGlobalParameter('delcountryid')) {
                $countryId = $delCountryId;
            } elseif ($addressId = Registry::getSession()->getVariable('deladrid')) {
                $deliveryAddress = oxNew(Address::class);
                if ($deliveryAddress->load($addressId)) {
                    $countryId = $deliveryAddress->oxaddress__oxcountryid->value;
                }
            }

            if (!$countryId) {
                $countryId = $user->oxuser__oxcountryid->value;
            }
        }
        return $countryId;
    }
}
