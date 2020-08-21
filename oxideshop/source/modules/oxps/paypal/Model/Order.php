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

use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Model\BaseModel;

/**
 * PayPal oxOrder class
 *
 * @mixin \OxidEsales\Eshop\Application\Model\Order
 */
class Order extends Order_parent
{
    /**
     * PayPal order information
     *
     * @var paypalOrderService
     */
    protected $payPalOrder = null;

    /**
     * PayPal order Id
     *
     * @var string
     */
    protected $payPalOrderId = null;

    /**
     * Returns PayPal order object.
     *
     * @param string $oxId
     *
     * @return paypalOrderService
     */
    public function getPayPalOrder($oxId = null)
    {
        if (is_null($this->payPalOrder)) {
            $this->payPalOrder = false;
            $oxId = is_null($oxId) ? $this->getId() : $oxId;
            if ($orderId = $this->getPaypalOrderIdForOxOrderId($oxId)) {
                $serviceFactory = Registry::get(ServiceFactory::class);
                $service = $serviceFactory->getOrderService();
                $response = $service->showOrderDetails($orderId);
                $this->payPalOrder = $response;
            }
        }
        return $this->payPalOrder;
    }

    /**
     * Returns PayPal order id.
     *
     * @param string $oxId
     *
     * @return string
     */
    public function getPaypalOrderIdForOxOrderId($oxId = null)
    {
        if (is_null($this->payPalOrderId)) {
            $this->payPalOrderId = '';
            $table = 'oxps_paypal_order';
            $shopId = $this->getShopId();
            $params = [$table . '.oxps_paypal_oxorderid' => $oxId, $table . '.oxps_paypal_oxshopid' => $shopId];

            $paypalOrderObj = oxNew(BaseModel::class);
            $paypalOrderObj->init($table);
            $select = $paypalOrderObj->buildSelectString($params);

            if ($data = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getRow($select)) {
                $this->payPalOrderId = $data['oxps_paypal_paypalorderid'];
            }
        }
        return $this->payPalOrderId;
    }

    /**
     * Checks if the order was paid using PayPal
     *
     * @TODO
     * @return bool
     */
    public function paidWithPayPal(): bool
    {
        return true;
    }

    /**
     * Get order ID used by PayPal
     *
     * @TODO
     * @return string
     */
    public function getPayPalOrderId(): string
    {
        return '123';
    }
}