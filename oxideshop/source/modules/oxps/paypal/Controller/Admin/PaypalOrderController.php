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

use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Order as PayPalOrder;
use OxidProfessionalServices\PayPal\Api\Model\Payments\Capture;
use OxidProfessionalServices\PayPal\Api\Model\Payments\RefundRequest;
use OxidProfessionalServices\PayPal\Api\Service\Orders;
use OxidProfessionalServices\PayPal\Api\Service\Payments;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;

/**
 * Order class wrapper for PayPal module
 */
class PaypalOrderController extends AdminDetailsController
{
    /**
     * @var Order
     */
    protected $order;

    /**
     * @var PayPalOrder
     */
    protected $payPalOrder;

    /**
     * Executes parent method parent::render(), creates oxOrder object,
     * passes it's data to Smarty engine and returns
     * name of template file "paypalorder.tpl".
     *
     * @return string
     * @throws ApiException
     * @throws StandardException
     */
    public function render()
    {
        parent::render();

        $order = $this->getOrder();
        $this->addTplParam('oxid', $this->getEditObjectId());
        $this->addTplParam('order', $order);

        if ($order->paidWithPayPal()) {
            $this->addTplParam('payPalOrder', $this->getPayPalOrder());
            $this->addTplParam('capture', $this->getOrderPaymentCapture());
        } else {
            $this->addTplParam('payPalOrder', null);
        }

        return "paypalorder.tpl";
    }

    /**
     * Refund order payment action
     */
    public function refund(): void
    {
        if (!Registry::getSession()->checkSessionChallenge()) {
            return;
        }

        $request = Registry::getRequest();
        $refundAmount = $request->getRequestEscapedParameter('refundAmount');
        $invoiceId = $request->getRequestEscapedParameter('invoiceId');
        $refundAll = $request->getRequestEscapedParameter('refundAll');
        $noteToPayer = $request->getRequestParameter('noteToPayer');

        $capture = $this->getOrderPaymentCapture();

        $request = new RefundRequest();

        if (!$refundAll) {
            $request->initAmount();
            $request->amount->currency_code = $capture->amount->currency_code;
            $request->amount->value = $refundAmount;
            $request->invoice_id = $invoiceId;
            $request->note_to_payer = $noteToPayer;
        }

        /** @var Payments $paymentService */
        $paymentService = Registry::get(ServiceFactory::class)->getPaymentService();
        $paymentService->refundCapturedPayment($capture->id, $refundAll, '');

        //Reset so that new information would be fetched
        $this->payPalOrder = null;
    }

    /**
     * Get PayPal order object for the active order
     *
     * @return PayPalOrder
     * @throws ApiException|StandardException
     */
    protected function getPayPalOrder(): PayPalOrder
    {
        if (!$this->payPalOrder) {
            $order = $this->getOrder();
            /** @var Orders $orderService */
            $orderService = Registry::get(ServiceFactory::class)->getOrderService();
            $this->payPalOrder = $orderService->showOrderDetails($order->getPaypalOrderIdForOxOrderId());
        }

        return $this->payPalOrder;
    }

    /**
     * Get active order
     *
     * @return Order
     * @throws StandardException
     */
    protected function getOrder(): Order
    {
        if (!$this->order) {
            $order = oxNew(Order::class);
            $orderId = $this->getEditObjectId();
            if ($orderId === null || !$order->load($orderId)) {
                throw new StandardException('Order not found');
            }
            $this->order = $order;
        }

        return $this->order;
    }

    /**
     * Get order payment capture or null if not captured
     *
     * @return Capture|null
     * @throws StandardException|ApiException
     */
    protected function getOrderPaymentCapture(): ?Capture
    {
        return $this->getPayPalOrder()->purchase_units[0]->payments->captures[0] ?? null;
    }
}