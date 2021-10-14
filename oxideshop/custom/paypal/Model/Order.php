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
 * @copyright (C) OXID eSales AG 2003-2018
 */

namespace OxidProfessionalServices\PayPal\Model;

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Capture;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Order as PayPalOrder;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product as PayPalProduct;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Subscription as PayPalSubscription;
use OxidProfessionalServices\PayPal\Api\Service\Orders;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Traits\AdminOrderFunctionTrait;
use OxidProfessionalServices\PayPal\Repository\SubscriptionRepository;

/**
 * PayPal oxOrder class
 *
 * @mixin \OxidEsales\Eshop\Application\Model\Order
 */
class Order extends Order_parent
{
    use AdminOrderFunctionTrait;

    /**
     * PayPal order information
     *
     * @var PayPalOrder
     */
    protected $payPalOrder;

    /**
     * PayPal order Id
     *
     * @var string
     */
    protected $payPalOrderId;

    /**
     * PayPal Billing Agreement Id;
     *
     * @var string
     */
    protected $payPalBillingAgreementId;

    /**
     * PayPal Product Id
     *
     * @var string
     */
    protected $payPalProductId;

    /**
     * PayPal Subscription
     *
     * @var obj
     */
    protected $payPalSubscription = null;

    /**
     * Get PayPal order object for the current active order object
     * Result is cached and returned on subsequent calls
     *
     * @return PayPalOrder
     * @throws ApiException
     */
    public function getPayPalOrder(): PayPalOrder
    {
        if (!$this->payPalOrder) {
            /** @var Orders $orderService */
            $orderService = Registry::get(ServiceFactory::class)->getOrderService();
            $this->payPalOrder = $orderService->showOrderDetails($this->getPayPalOrderIdForOxOrderId());
        }

        return $this->payPalOrder;
    }

    /**
     * Update order oxpaid to current time.
     */
    public function markOrderPaid()
    {
        parent::_setOrderStatus('OK');

        $db = DatabaseProvider::getDb();
        $utilsDate = Registry::getUtilsDate();
        $date = date('Y-m-d H:i:s', $utilsDate->getTime());

        $query = 'update oxorder set oxpaid=? where oxid=?';
        $db->execute($query, [$date, $this->getId()]);

        //updating order object
        $this->oxorder__oxpaid = new Field($date);
    }

    /**
     * Returns PayPal order id.
     *
     * @param string|null $oxId
     *
     * @return string
     */
    public function getPayPalOrderIdForOxOrderId(string $oxId = null)
    {
        if (is_null($this->payPalOrderId)) {
            $this->payPalOrderId = '';
            $oxId = is_null($oxId) ? $this->getId() : $oxId;
            $table = 'oxps_paypal_order';
            $shopId = $this->getShopId();
            $params = [$table . '.oxorderid' => $oxId, $table . '.oxshopid' => $shopId];

            $paypalOrderObj = oxNew(BaseModel::class);
            $paypalOrderObj->init($table);
            $select = $paypalOrderObj->buildSelectString($params);

            if ($data = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getRow($select)) {
                $this->payPalOrderId = $data['oxpaypalorderid'];
            }
        }
        return $this->payPalOrderId;
    }

    /**
     * Returns PayPal Session id.
     *
     * @param string|null $oxId
     *
     * @return string
     */
    public function getPayPalProductIdForOxOrderId(string $oxId = null)
    {
        if (is_null($this->payPalProductId)) {
            $this->payPalProductId = '';
            $oxId = is_null($oxId) ? $this->getId() : $oxId;
            $db = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);

            $sql = 'SELECT OXPAYPALSUBPRODID
                      FROM oxps_paypal_subscription
                     WHERE PAYPALBILLINGAGREEMENTID = ?';

            /** @var $paypalSubscriptionId $subProdId @Todo Specify this!*/
            $paypalSubscriptionId = null;

            $subProdId = $db->getOne(
                $sql,
                [
                    $paypalSubscriptionId
                ]
            );

            if ($subProdId) {
                $sql = 'SELECT PAYPALPRODUCTID
                          FROM oxps_paypal_subscription_product
                         WHERE OXID = ?';

                $this->payPalProductId = $db->getOne(
                    $sql,
                    [
                        $subProdId
                    ]
                );
            }
        }
        return $this->payPalProductId;
    }

    /**
     * Returns PayPal BillingAgreementId
     *
     * @param string|null $oxId
     *
     * @return string
     */
    public function getPayPalBillingAgreementIdForOxOrderId(string $oxId = null)
    {
        if (is_null($this->payPalBillingAgreementId)) {
            $this->payPalBillingAgreementId = '';
            $oxId = is_null($oxId) ? $this->getId() : $oxId;
            $table = 'oxps_paypal_subscription';
            $shopId = $this->getShopId();
            $params = [$table . '.oxorderid' => $oxId, $table . '.oxshopid' => $shopId];

            $paypalOrderObj = oxNew(BaseModel::class);
            $paypalOrderObj->init($table);
            $select = $paypalOrderObj->buildSelectString($params);

            if ($data = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getRow($select)) {
                $this->payPalBillingAgreementId = $data['paypalbillingagreementid'];
            }
        }
        return $this->payPalBillingAgreementId;
    }

    /**
     * Checks if the order was paid using PayPal
     *
     * @return bool
     */
    public function paidWithPayPal(): bool
    {
        return (bool) ($this->getPayPalOrderIdForOxOrderId() || $this->getPayPalBillingAgreementIdForOxOrderId());
    }

    /**
     * Get order payment capture or null if not captured
     *
     * @return Capture|null
     * @throws ApiException
     */
    public function getOrderPaymentCapture(): ?Capture
    {
        return $this->getPayPalOrder()->purchase_units[0]->payments->captures[0] ?? null;
    }

    /**
     * Is the object a subscription?
     * @return bool
     */
    public function isPayPalSubscription()
    {
        $repository = new SubscriptionRepository();
        $subscription = $repository->getSubscriptionByOrderId($this->getId());
        return (bool) (
            $this->oxorder__oxpaymenttype->value == 'oxidpaypal'
            && $subscription
            && $subscription['OXPARENTORDERID'] == ''
        );
    }

    /**
     * Is the object a subscription?
     * @return bool
     */
    public function isPayPalPartSubscription()
    {
        return (bool) (
            $this->oxorder__oxpaymenttype->value == 'oxidpaypal'
            && $this->getSubscription()
        );
    }

    /**
     * template-getter getPayPalSubscriptionForHistory
     * @return obj
     */
    public function getPayPalSubscriptionForHistory()
    {
        $billingAgreementId = $this->getPayPalBillingAgreementIdForOxOrderId();
        return $this->getPayPalSubscription($billingAgreementId);
    }

    /**
     * template-getter getpayPalSubscription
     * @return obj
     */
    public function getParentSubscriptionOrder()
    {
        $result = null;
        if ($subscription = $this->getSubscription()) {
            $parentOrder = oxNew(Order::class);
            if ($parentOrder->load($subscription['OXPARENTORDERID']))
            {
                $result = $parentOrder;
            }
        }
        return $result;
    }

    /**
     * Is the object a subscription?
     * @return bool
     */
    protected function getSubscription()
    {
        if (is_null($this->payPalSubscription)) {
            $repository = new SubscriptionRepository();
            $this->payPalSubscription = $repository->getSubscriptionByOrderId($this->getId());
        }
        return $this->payPalSubscription;
    }
}
