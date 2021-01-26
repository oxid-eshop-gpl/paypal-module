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

namespace OxidProfessionalServices\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Capture;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Order as PayPalOrder;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Payments\RefundRequest;
use OxidProfessionalServices\PayPal\Api\Service\Payments;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;

/**
 * Order class wrapper for PayPal module
 */
class PayPalOrderController extends AdminDetailsController
{
    /**
     * @var Order
     */
    protected $order;

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
     * @var PayPalOrder
     */
    protected $payPalOrderHistory;

    /**
     * @return string
     * @throws StandardException
     */
    public function render()
    {
        parent::render();

        $lang = Registry::getLang();

        try {
            $order = $this->getOrder();
            $this->addTplParam('oxid', $this->getEditObjectId());
            $this->addTplParam('order', $order);
            $this->addTplParam('payPalOrder', null);

            if ($order->paidWithPayPal()) {
                $this->addTplParam('payPalOrder', $order->getPayPalOrder());
                $this->addTplParam('capture', $order->getOrderPaymentCapture());
            }
        } catch (ApiException $exception) {
            $this->addTplParam('error', $lang->translateString('OXPS_PAYPAL_ERROR_' . $exception->getErrorIssue()));
            Registry::getLogger()->error($exception);
        }

        if (!$order->paidWithPayPal()) {
            $this->addTplParam('error', $lang->translateString('OXPS_PAYPAL_ERROR_NOT_PAID_WITH_PAYPAL'));
        }

        return "paypalorder.tpl";
    }

    /**
     * Capture payment action
     *
     * @throws ApiException
     * @throws StandardException
     */
    public function capture(): void
    {
        $order = $this->getOrder();
        $orderId = $order->getPayPalOrder()->id;

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $service = $serviceFactory->getOrderService();
        $request = new OrderCaptureRequest();
        $response = $service->capturePaymentForOrder('', $orderId, $request, '');

        if (
            $response->status == PayPalOrder::STATUS_COMPLETED &&
            $response->purchase_units[0]->payments->captures[0]->status == Capture::STATUS_COMPLETED
        ) {
            $order->markOrderPaid();
        }
    }

    /**
     * Refund payment action
     *
     * @throws ApiException
     * @throws StandardException
     */
    public function refund(): void
    {
        $request = Registry::getRequest();
        $refundAmount = $request->getRequestEscapedParameter('refundAmount');
        $invoiceId = $request->getRequestEscapedParameter('invoiceId');
        $refundAll = $request->getRequestEscapedParameter('refundAll');
        $noteToPayer = $request->getRequestParameter('noteToPayer');

        $capture = $this->getOrder()->getOrderPaymentCapture();

        $request = new RefundRequest();
        $request->note_to_payer = $noteToPayer;
        $request->invoice_id = !empty($invoiceId) ? $invoiceId : null;
        if (!$refundAll) {
            $request->initAmount();
            $request->amount->currency_code = $capture->amount->currency_code;
            $request->amount->value = $refundAmount;
        }

        /** @var Payments $paymentService */
        $paymentService = Registry::get(ServiceFactory::class)->getPaymentService();
        $paymentService->refundCapturedPayment($capture->id, $request, '');
    }

    /**
     * @return PayPalOrder
     * @throws StandardException
     * @throws ApiException
     */
    protected function getPayPalOrder(): ?PayPalOrder
    {
        return $this->getOrder()->getPayPalOrder();
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
     * Get order payment capture id
     *
     * @return Capture
     * @throws StandardException|ApiException
     */
    protected function getOrderPaymentCapture(): Capture
    {
        return $this->getPayPalOrder()->purchase_units[0]->payments->captures[0];
    }

    /**
     * Template getter getPayPalPaymentStatus
     */
    public function getPayPalPaymentStatus()
    {
        return $this->getPayPalOrder()->status;
    }

    /**
     * Template getter getPayPalTotalOrderSum
     */
    public function getPayPalTotalOrderSum()
    {
        return $this->getPayPalOrder()->purchase_units[0]->amount->breakdown->item_total->value;
    }

    /**
     * Template getter getPayPalCapturedAmount
     */
    public function getPayPalCapturedAmount()
    {
        return $this->getPayPalOrder()->purchase_units[0]->payments->captures[0]->amount->value;
    }

    /**
     * Template getter getPayPalRefundedAmount
     */
    public function getPayPalRefundedAmount()
    {
        return $this->getPayPalOrder()->purchase_units[0]->payments->refunds[0]->amount->value;
    }

    /**
     * Template getter getPayPalRemainingRefundAmount
     */
    public function getPayPalRemainingRefundAmount()
    {
        return $this->getPayPalCapturedAmount() - $this->getPayPalRefundedAmount();
    }

    /**
     * Template getter getPayPalVoidedAmount
     */
    public function getPayPalVoidedAmount()
    {
        return 'toBeDone';
    }

    /**
     * Template getter getPayPalAuthorizationId
     */
    public function getPayPalAuthorizationId()
    {
        return $this->getPayPalOrder()->purchase_units[0]->payments->authorizations[0]->id->value;
    }

    /**
     * Template getter getPayPalCurrency
     */
    public function getPayPalCurrency()
    {
        return $this->getPayPalOrder()->purchase_units[0]->amount->breakdown->item_total->currency_code;
    }

    /**
     * Template getter getPayPalPaymentList
     */
    public function getPayPalPaymentList()
    {
        return null;
    }

    /**
     * Template getter for price formatting
     *
     * @param double $price price
     *
     * @return string
     */
    public function formatPrice($price)
    {
        return Registry::getLang()->formatCurrency($price);
    }

    /**
     * Returns formatted date
     *
     * @return string
     */
    public function formatDate($date, $forSort = false)
    {
        $timestamp = strtotime($date);
        return date(
            $forSort ? 'YmdHis' : 'd.m.Y H:i:s',
            $timestamp
        );
    }

    /**
     * Template getter for order History
     *
     * @return PayPalTransactions
     * @throws StandardException|ApiException
     */
    public function getPayPalHistory()
    {
        if (!$this->payPalOrderHistory) {
            $this->payPalOrderHistory = [];
            foreach ($this->getPayPalOrder()->purchase_units[0]->payments->captures as $capture) {
                $this->payPalOrderHistory[$this->formatDate($capture->create_time, true)] = [
                    'action'        => 'CAPTURED',
                    'amount'        => $capture->amount->value,
                    'date'          => $this->formatDate($capture->create_time),
                    'status'        => $capture->status,
                    'transactionid' => $capture->id,
                    'comment'       => '',
                    'invoiceid'     => $capture->invoice_id
                ];
            }
            foreach ($this->getPayPalOrder()->purchase_units[0]->payments->refunds as $refund) {
                $this->payPalOrderHistory[$this->formatDate($refund->create_time, true)] = [
                    'action'        => 'REFUNDED',
                    'amount'        => $refund->amount->value,
                    'date'          => $this->formatDate($refund->create_time),
                    'status'        => $refund->status,
                    'transactionid' => $refund->id,
                    'comment'       => $refund->note_to_payer,
                    'invoiceid'     => $refund->invoice_id
                ];
            }
            foreach ($this->getPayPalOrder()->purchase_units[0]->payments->authorizations as $authorization) {
                $this->payPalOrderHistory[$this->formatDate($authorization->create_time, true)] = [
                    'action'        => 'AUTHORIZATION',
                    'amount'        => $authorization->amount->value,
                    'date'          => $this->formatDate($authorization->create_time),
                    'status'        => $authorization->status,
                    'transactionid' => $authorization->id,
                    'comment'       => '',
                    'invoiceid'     => $authorization->invoice_id
                ];
            }
            ksort($this->payPalOrderHistory);
        }
        return $this->payPalOrderHistory;
    }
}
