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

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Model\Mixin\DbNamingConventionsTrait;

class Subscription extends BaseModel
{
    use DbNamingConventionsTrait;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->_sCoreTable = 'oxps_paypal_subscription';
        // Disable or otherwise list loading does not work
        // need to check if maybe there is a better way
        $this->disableLazyLoading();

        parent::__construct();
    }

    /**
     * Get subscription PayPal ID
     *
     * @return string
     */
    public function getPayPalId()
    {
        return $this->getFieldData('id');
    }

    /**
     * Loads subscription by PayPal ID, if successful returns true
     *
     * @param string $id
     *
     * @return bool
     */
    public function loadByPayPalId(string $id): bool
    {
        $query = $this->buildSelectString(['oxpspaypalid' => $id]);

        return $this->_isLoaded = $this->assignRecord($query);
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public function saveSubscription($data)
    {
        $subscriptionPlanId = $data['plan_id'];

        $fieldValues = array_filter([
            'id' => $data['subscription_id'] ?? '',
            'planid' => $subscriptionPlanId ?? '',
            'email' => $data['email_address'] ?? '',
            'status' => $data['status'] ?? '',
            'createtime' => $data['create_time'] ?? '',
            'updatetime' => $data['update_time'] ?? '',
            'starttime' => $data['start_time'] ?? '',
            'statusupdatetime' => $data['status_update_time'] ?? '',
        ]);

        $this->assign($fieldValues);
        $this->save();
    }

    /**
     * @param string|null $articleId
     * @param $subscriptionPlanId
     * @return array
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    public function findSubscriptionProductId(?string $articleId, $subscriptionPlanId): string
    {
        $subscriptionProductSQL = "SELECT OXPS_PAYPAL_PRODUCT_ID FROM oxps_paypal_subscription_product ";
        $subscriptionProductSQL .= "WHERE OXPS_PAYPAL_OXARTICLE_ID = ?";
        $subscriptionProductSQL .= "AND OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID = ?";

        $subscriptionProduct = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)
            ->getAll($subscriptionProductSQL, [
                $articleId,
                $subscriptionPlanId
            ]);

        return $subscriptionProduct[0]['OXPS_PAYPAL_PRODUCT_ID'];
    }

    /**
     * @param string $subscriptionPlanId
     * @param string $subscriptionId
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function saveSubscriptionProductOrder(string $subscriptionPlanId, string $subscriptionId): void
    {
        $id = Registry::getUtilsObject()->generateUId();
        $articleId = Registry::getRequest()->getRequestEscapedParameter('aid');

        $subscriptionProductId = $this->findSubscriptionProductId($articleId, $subscriptionPlanId);

        $sql = "INSERT INTO oxps_paypal_subscription_product_order(
                    `OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ORDER_ID`,
                    `OXPS_PAYPAL_USER_ID`,
                    `OXPS_PAYPAL_OXARTICLE_ID`,
                    `OXPS_PAYPAL_PRODUCT_ID`,
                    `OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID`,
                    `OXPS_PAYPAL_SESSION_ID`) 
                    VALUES (?,?,?,?,?,?)";

        $userId = Registry::getSession()->getUser()->getId();

        DatabaseProvider::getDb()->execute($sql, [
            $id,
            $userId,
            $articleId,
            $subscriptionProductId,
            $subscriptionPlanId,
            $subscriptionId
        ]);
    }
}
