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

namespace OxidProfessionalServices\PayPal\Model;

use Exception;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\UtilsObject;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Core\PayPalSession;
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

        if ($session->getVariable('isSubscriptionCheckout')) {
            $this->getSession()->deleteVariable('isSubscriptionCheckout');
            return true;
        }

        if (
            ($session->getVariable('paymentid') == 'oxidpaypal')
             || ($session->getBasket()->getPaymentId() == 'oxidpaypal')
        ) {
            $success = $this->doAuthorizePayment($order);
        }

        return $success;
    }

    /**
     * Executes Authorize to PayPal
     *
     * @param Order $order  User ordering object
     *
     * @return bool
     */
    public function doAuthorizePayment(&$order)
    {
        $success = false;

        try {
            // updating order state
            if ($order) {
                if ($checkoutOrderId = PayPalSession::getcheckoutOrderId()) {

                    /** @var ServiceFactory $serviceFactory */
                    $serviceFactory = Registry::get(ServiceFactory::class);
                    $service = $serviceFactory->getOrderService();

                    // Capture Order
                    try {
                        $request = new OrderCaptureRequest();
                        $response = $service->capturePaymentForOrder('', $checkoutOrderId, $request, '');
                    } catch (Exception $exception) {
                        Registry::getLogger()->error("Error on order capture call.", [$exception]);
                        $exception = oxNew(StandardException::class, 'OXPS_PAYPAL_ORDEREXECUTION_ERROR');
                        throw $exception;
                    }

                    $sql = 'INSERT INTO oxps_paypal_order (';
                    $sql .= 'OXID, OXSHOPID, OXORDERID, ';
                    $sql .= 'OXPAYPALORDERID) VALUES(?,?,?,?)';

                    DatabaseProvider::getDb()->execute($sql, [
                        UtilsObject::getInstance()->generateUId(),
                        Registry::getConfig()->getShopId(),
                        $order->getId(),
                        $checkoutOrderId
                    ]);

                    $success = true;
                }
            } else {
                $exception = oxNew(StandardException::class, 'OXPS_PAYPAL_ORDEREXECUTION_ERROR');
                throw $exception;
            }
        } catch (Exception $exception) {
            $this->_iLastErrorNo = \OxidEsales\Eshop\Application\Model\Order::ORDER_STATE_PAYMENTERROR;
            Registry::getLogger()->error("Error on doAuthorizePayment call.", [$exception]);

            Registry::getUtilsView()->addErrorToDisplay($exception);
        }

        // destroy PayPal-Session
        PayPalSession::storePayPalOrderId('');

        return $success;
    }
}
