<?php

namespace OxidProfessionalServices\PayPal\Repository;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\UtilsObject;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\BillingCycle;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Plan;

class SubscriptionRepository
{
    /**
     * @param $oxid
     * @return array
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    public function getLinkedProductByOxid($oxid)
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll(
            'SELECT * FROM oxps_paypal_subscription_product WHERE OXARTID = ?',
            [$oxid]
        );
    }

    /**
     * @param string $productId
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getSubscriptionIdPlanByProductId($productId)
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll(
            'SELECT OXPAYPALSUBSCRIPTIONPLANID
                FROM oxps_paypal_subscription_product
                WHERE OXPAYPALPRODUCTID = ?',
            [$productId]
        );
    }

    /**
     * @param string $subscriptionPlanId
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getUserIdFromSubscriptedPlan($subscriptionPlanId)
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll(
            'SELECT OXUSERID
                FROM oxps_paypal_subscription_product_order
                WHERE OXPAYPALSUBSCRIPTIONPLANID = ?',
            [$subscriptionPlanId]
        );
    }

    /**
     * @param string $productId
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getOxIdByProductId($productId)
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll(
            'SELECT OXARTID
                FROM oxps_paypal_subscription_product
                WHERE OXPAYPALPRODUCTID = ?',
            [$productId]
        );
    }

    /**
     * @param Product $response
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function saveLinkedProduct(Product $response, $oxid): void
    {
        $existingProduct = $this->getSubscriptionIdPlanByProductId($response->id);

        if ($existingProduct) {
            return;
        }

        $sql = 'INSERT INTO oxps_paypal_subscription_product (';
        $sql .= 'OXID, OXSHOPID, OXARTID, ';
        $sql .= 'OXPAYPALPRODUCTID) VALUES(?,?,?,?)';

        DatabaseProvider::getDb()->execute($sql, [
            UtilsObject::getInstance()->generateUId(),
            Registry::getConfig()->getShopId(),
            $oxid,
            $response->id
        ]);
    }

    public function getSubscriptionIdPlanByProductIdSubscriptionPlanId($productId, $subscriptionPlanId)
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getRow(
            'SELECT *
                FROM oxps_paypal_subscription_product
                WHERE OXPAYPALPRODUCTID = ?
                AND OXPAYPALSUBSCRIPTIONPLANID = ?',
            [$productId, $subscriptionPlanId]
        );
    }

    /**
     * @param string $subscriptionPlanId
     * @param string $productId
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function saveSubscriptionPlan($subscriptionPlanId, $productId, $articleId): void
    {
        $existingProduct = $this->getSubscriptionIdPlanByProductIdSubscriptionPlanId($productId, $subscriptionPlanId);

        if ($existingProduct) {
            return;
        }

        $existingProduct = $this->getSubscriptionIdPlanByProductId($productId);

        if (count($existingProduct) == 1  && empty($existingProduct[0]['OXPAYPALSUBSCRIPTIONPLANID'])) {
            $sql = 'UPDATE oxps_paypal_subscription_product SET ';
            $sql .= 'OXPAYPALSUBSCRIPTIONPLANID = ?,';
            $sql .= 'OXARTID = ? ';
            $sql .= 'WHERE OXPAYPALPRODUCTID = ?';

            DatabaseProvider::getDb()->execute($sql, [
                $subscriptionPlanId,
                $articleId,
                $productId,
            ]);
        } else {
            $sql = 'INSERT INTO oxps_paypal_subscription_product (';
            $sql .= 'OXID, OXSHOPID, OXARTID, ';
            $sql .= 'OXPAYPALPRODUCTID, OXPAYPALSUBSCRIPTIONPLANID) VALUES(?,?,?,?,?)';

            DatabaseProvider::getDb()->execute($sql, [
                UtilsObject::getInstance()->generateUId(),
                Registry::getConfig()->getShopId(),
                $articleId,
                $productId,
                $subscriptionPlanId
            ]);
        }
    }

    /**
     * @param string $paypalProductId
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deleteLinkedProduct($paypalProductId): void
    {
        $sql = 'DELETE FROM oxps_paypal_subscription_product WHERE OXPAYPALPRODUCTID = ?';

        DatabaseProvider::getDb()->execute($sql, [
            $paypalProductId
        ]);
    }

    /**
     * @param string $planId
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deleteLinkedPlan($planId): void
    {
        $sql = 'DELETE FROM oxps_paypal_subscription_product WHERE OXPAYPALSUBSCRIPTIONPLANID = ?';

        DatabaseProvider::getDb()->execute($sql, [
            $planId
        ]);
    }

    /**
     * @param string $paypalProductId
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deleteLinkedOrders($paypalProductId): void
    {
        $sql = 'DELETE FROM oxps_paypal_subscription_product_order WHERE OXPAYPALPRODUCTID = ?';

        DatabaseProvider::getDb()->execute($sql, [
            $paypalProductId
        ]);
    }

    /**
     * @return object
     */
    public function getEditObject($oxid)
    {
        $article = oxNew(Article::class);
        $article->load($oxid);

        return $article;
    }
}
