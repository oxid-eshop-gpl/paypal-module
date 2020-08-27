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
use OxidEsales\Eshop\Application\Model\Country;
use OxidEsales\Eshop\Application\Model\User;
use OxidEsales\Eshop\Core\Field;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Order;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Core\OrderManager;
use OxidProfessionalServices\PayPal\Core\OrderRequestFactory;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Core\PaypalSession;
use VIISON\AddressSplitter\AddressSplitter;
use VIISON\AddressSplitter\Exceptions\SplittingException;
use OxidEsales\Eshop\Core\Exception\OutOfStockException;
use OxidEsales\Eshop\Core\Exception\ArticleInputException;
use OxidEsales\Eshop\Core\Exception\NoArticleException;
/**
 * Server side interface for PayPal smart buttons.
 */
class ProxyController extends FrontendController
{
    public function createOrder()
    {
        $context = (string) Registry::getRequest()->getRequestEscapedParameter('context', 'continue');

        $session = Registry::getSession();
        $basket = $session->getBasket();
        $basket = Registry::getSession()->getBasket();
        // we put something to the basket
        if ($aid = (string) Registry::getRequest()->getRequestEscapedParameter('aid')) {
            try {
                $basket->addToBasket(
                    $aid,
                    1
                );
            } catch (OutOfStockException $exception) {
                Registry::getUtilsView()->addErrorToDisplay(
                    $exception,
                    false,
                    (bool) $errorDestination,
                    $errorDestination
                );
            } catch (ArticleInputException $exception) {
                Registry::getUtilsView()->addErrorToDisplay(
                    $exception,
                    false,
                    (bool) $errorDestination,
                    $errorDestination
                );
            } catch (NoArticleException $exception) {
            }
            $basket->calculateBasket(false);
        }
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

        $basket->setPayment('oxidpaypal');
        $session->setVariable('paymentid', 'oxidpaypal');

        if ($response->id) {
            PaypalSession::storePaypalOrderId($response->id);
        }

        $this->outputJson($response);
    }

    public function captureOrder()
    {
        $session = Registry::getSession();
        $context = (string) Registry::getRequest()->getRequestEscapedParameter('context', 'continue');

        if ($orderId = (string) Registry::getRequest()->getRequestEscapedParameter('orderID')) {
            $orderManager = new OrderManager();

            /** @var ServiceFactory $serviceFactory */
            $serviceFactory = Registry::get(ServiceFactory::class);
            $service = $serviceFactory->getOrderService();
            $request = new OrderCaptureRequest();

            try {
                /** @var Order $response */
                if ($context === 'pay_now') {
                    $response = $service->capturePaymentForOrder('', $orderId, $request, '');
                    $orderManager->prepareOrderForPayNowFromCaptureOrderResponse($response);
                } else {
                    // if we start the payment-process from the detailspage without having a customer
                    // we collect the customer-information from the created paypal-order
                    $response = $service->showOrderDetails($orderId);
                    $orderManager->prepareOrderForContinue($orderId);

                    $basket = $session->getBasket();

                    // no active customer? We create a guest!
                    if (!$basket->getUser()) {
                        try {
                            $country = oxNew(Country::class);
                            $oxCountryId = $country->getIdByCode(
                                $response->purchase_units[0]->shipping->address->country_code
                            );

                            try {
                                $addressData = AddressSplitter::splitAddress(
                                    $response->purchase_units[0]->shipping->address->address_line_1
                                );
                            } catch (SplittingException $e) {
                                Registry::getLogger()->error($e->getMessage(), ['status' => $e->getCode()]);
                            }

                            /** @var \OxidEsales\Eshop\Application\Model\User $oUser */
                            $user = oxNew(User::class);
                            $user->oxuser__oxusername = new Field($response->payer->email_address, Field::T_RAW);
                            $user->oxuser__oxfname = new Field($response->payer->name->given_name, Field::T_RAW);
                            $user->oxuser__oxlname = new Field($response->payer->name->surname, Field::T_RAW);
                            $user->oxuser__oxstreet = new Field($addressData['streetName'], Field::T_RAW);
                            $user->oxuser__oxstreetnr = new Field($addressData['houseNumber'], Field::T_RAW);
                            $user->oxuser__oxcity = new Field(
                                $response->purchase_units[0]->shipping->address->admin_area_2,
                                Field::T_RAW
                            );
                            $user->oxuser__oxcountryid = $oxCountryId;
                            $user->oxuser__oxzip = new Field(
                                $user->oxuser__oxcountryid = new Field($oxCountryId, Field::T_RAW),
                                Field::T_RAW
                            );
                            $user->createUser();
                            $session->setVariable('usr', $user->getId());
                            $basket->setBasketUser($user);
                        } catch (Exception $exception) {
                            Registry::getLogger()->error(
                                'Error on creation a guest-account with paypal-informations.',
                                [$exception]
                            );
                        }
                    }
                }
            } catch (Exception $exception) {
                Registry::getLogger()->error("Error on order capture call.", [$exception]);
            }

            $this->outputJson($response);
        }
    }

    public function cancelPaypalPayment()
    {
        PaypalSession::unsetPaypalOrderId();
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
}
