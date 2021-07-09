<?php

namespace OxidProfessionalServices\PayPal\Repository;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\UtilsObject;
use OxidEsales\Eshop\Core\TableViewNameGenerator;
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
            'SELECT PAYPALSUBSCRIPTIONPLANID
                FROM oxps_paypal_subscription_product
                WHERE PAYPALPRODUCTID = ?',
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
                FROM oxps_paypal_subscription
                WHERE PAYPALSUBSCRIPTIONPLANID = ?',
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
                WHERE PAYPALPRODUCTID = ?',
            [$productId]
        );
    }

    /**
     * @param array $filter
     * @param int $page
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getSubscriptionOrders($filter = [], $page = 0)
    {

        $limit = 10;
        $from = $page ? $page * $limit : 0;

        $subscriptionOrders = oxNew(\OxidEsales\Eshop\Core\Model\ListModel::class);
        $subscriptionOrders->init('oxbase', 'oxps_paypal_subscription');

        $viewNameGenerator = Registry::get(TableViewNameGenerator::class);

        $orderView = $viewNameGenerator->getViewName('oxorder');
        $subscriptionProductView = $viewNameGenerator->getViewName('oxps_paypal_subscription_product');
        $subscriptionOrderView = $viewNameGenerator->getViewName('oxps_paypal_subscription');

        $select = "select {$orderView}.`oxbillemail`, {$orderView}.`oxorderdate`,
            {$subscriptionProductView}.`paypalsubscriptionplanid`,
            {$subscriptionOrderView}.`paypalbillingagreementid`
            from {$subscriptionOrderView}
            left join {$orderView} on ({$orderView}.`oxid` = {$subscriptionOrderView}.`oxorderid`)
            left join {$subscriptionProductView}
            on ({$subscriptionProductView}.`oxid` = {$subscriptionOrderView}.`oxpaypalsubprodid`)
            where {$subscriptionOrderView}.`oxshopid` = 1 and {$subscriptionOrderView}.`oxorderid` > ''";

        if (count($filter)) {
            foreach ($filter as $table => $cols) {
                foreach ($cols as $col => $value) {
                    if ($value) {
                        $select .= " and " . $table . ".`" . $col . "` = " . DatabaseProvider::getDb()->quote($value);
                    }
                }
            }
        }

        $subscriptionOrders->setSqlLimit($from, $limit);
        $subscriptionOrders->selectString($select);

        return $subscriptionOrders;
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
        $sql .= 'PAYPALPRODUCTID) VALUES(?,?,?,?)';

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
                WHERE PAYPALPRODUCTID = ?
                AND PAYPALSUBSCRIPTIONPLANID = ?',
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

        if (count($existingProduct) == 1  && empty($existingProduct[0]['PAYPALSUBSCRIPTIONPLANID'])) {
            $sql = 'UPDATE oxps_paypal_subscription_product SET ';
            $sql .= 'PAYPALSUBSCRIPTIONPLANID = ?,';
            $sql .= 'OXARTID = ? ';
            $sql .= 'WHERE PAYPALPRODUCTID = ?';

            DatabaseProvider::getDb()->execute($sql, [
                $subscriptionPlanId,
                $articleId,
                $productId,
            ]);
        } else {
            $sql = 'INSERT INTO oxps_paypal_subscription_product (';
            $sql .= 'OXID, OXSHOPID, OXARTID, ';
            $sql .= 'PAYPALPRODUCTID, PAYPALSUBSCRIPTIONPLANID) VALUES(?,?,?,?,?)';

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
     * @param string $subscriptionId
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function saveSubscriptionOrder(string $subscriptionId): void
    {
        $session = Registry::getSession();
        $oxid = Registry::getUtilsObject()->generateUId();

        $sql = "INSERT INTO oxps_paypal_subscription(
                    `OXID`,
                    `OXSHOPID`,
                    `OXUSERID`,
                    `PAYPALBILLINGAGREEMENTID`)
                    VALUES (?,?,?,?)";

        $userId = $session->getUser()->getId();

        DatabaseProvider::getDb()->execute($sql, [
            $oxid,
            Registry::getConfig()->getShopId(),
            $userId,
            $subscriptionId
        ]);

        // save oxid to session
        $session->setVariable('subscriptionProductOrderId', $oxid);
    }

    /**
     * @param string $paypalProductId
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deleteLinkedProduct($paypalProductId): void
    {
        $sql = 'DELETE FROM oxps_paypal_subscription_product WHERE PAYPALPRODUCTID = ?';

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
        $sql = 'DELETE FROM oxps_paypal_subscription_product WHERE PAYPALSUBSCRIPTIONPLANID = ?';

        DatabaseProvider::getDb()->execute($sql, [
            $planId
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
