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

namespace OxidProfessionalServices\PayPal\Model;

use Exception;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Core\PaypalSession;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;

/**
 * Class PaymentGateway
 * @package OxidProfessionalServices\PayPal\Model
 *
 * @mixin \OxidEsales\Eshop\Application\Model\PaymentGateway
 */
class PaymentGateway extends PaymentGateway_parent
{
     /**
     * Executes payment, returns true on success.
     *
     * @param double                               $amount Goods amount
     * @param \OxidEsales\PayPalModule\Model\Order $order  User ordering object
     *
     * @return bool
     */
    public function executePayment($amount, &$order)
    {
        $success = parent::executePayment($amount, $order);
        $session = $this->getSession();

        if ( ($session->getVariable('paymentid') == 'oxidpaypal')
             || ($session->getBasket()->getPaymentId() == 'oxidpaypal')
        ) {
            $success = $this->doAuthorizePayment($order);
        }

        return $success;
    }


    /**
     * Executes Authorize to PayPal
     *
     * @param \OxidEsales\PayPalModule\Model\Order $order  User ordering object
     *
     * @return bool
     */
    public function doAuthorizePayment(&$order)
    {
        $success = false;

        try {
            // updating order state
            if ($order) {

                if ($checkoutOrderId = PaypalSession::getcheckoutOrderId()) {

                    /** @var ServiceFactory $serviceFactory */
                    $serviceFactory = Registry::get(ServiceFactory::class);
                    $service = $serviceFactory->getOrderService();

                    $request = new OrderCaptureRequest();

                    try {
                        $response = $service->capturePaymentForOrder('', $checkoutOrderId, $request, '');
                    } catch (Exception $exception) {
                        Registry::getLogger()->error("Error on order capture call.", [$exception]);
                    }
                    $success = true;

                    // destroy Paypal-Session
                    PaypalSession::storePaypalOrderId('');
                }
            } else {

                $exception = oxNew(StandardException::class, 'OEPAYPAL_ORDER_ERROR');
                throw $exception;
            }
        } catch (Exception $exception) {

            $this->_iLastErrorNo = \OxidEsales\Eshop\Application\Model\Order::ORDER_STATE_PAYMENTERROR;

            Registry::getLogger()->error("Error on doAuthorizePayment call.", [$exception]);
        }

        return $success;
    }

}
