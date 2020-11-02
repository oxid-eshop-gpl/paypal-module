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
            'SELECT * FROM oxps_paypal_subscription_product WHERE OXPS_PAYPAL_OXARTICLE_ID = ?',
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
            'SELECT OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID 
                FROM oxps_paypal_subscription_product 
                WHERE OXPS_PAYPAL_PRODUCT_ID = ?',
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
        $sql .= 'OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ID, OXPS_PAYPAL_OXSHOPID, OXPS_PAYPAL_OXARTICLE_ID, ';
        $sql .= 'OXPS_PAYPAL_PRODUCT_ID) VALUES(?,?,?,?)';

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
                WHERE OXPS_PAYPAL_PRODUCT_ID = ?
                AND OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID = ?',
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

        if (count($existingProduct) == 1  && empty($existingProduct[0]['OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID'])) {
            $sql = 'UPDATE oxps_paypal_subscription_product SET ';
            $sql .= 'OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID = ? ';
            $sql .= 'WHERE OXPS_PAYPAL_PRODUCT_ID = ?';

            DatabaseProvider::getDb()->execute($sql, [
                $subscriptionPlanId,
                $productId,
            ]);
        } else {
            $sql = 'INSERT INTO oxps_paypal_subscription_product (';
            $sql .= 'OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ID, OXPS_PAYPAL_OXSHOPID, OXPS_PAYPAL_OXARTICLE_ID, ';
            $sql .= 'OXPS_PAYPAL_PRODUCT_ID, OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID) VALUES(?,?,?,?,?)';

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
        $sql = 'DELETE FROM oxps_paypal_subscription_product WHERE OXPS_PAYPAL_PRODUCT_ID = ?';

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

    /**
     * @return false if not a subscription product, Subscription Plan ID if a subscription product
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     */
    public function isSubscribableProduct($articleId)
    {
        $articleId = $this->getSubscriptionArticleId($articleId);

        $select = 'SELECT OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID ';
        $select .= 'FROM oxps_paypal_subscription_product WHERE OXPS_PAYPAL_OXARTICLE_ID = ?';
        $result = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getRow($select, [$articleId]);

        if ($result) {
            return $result['OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID'];
        }

        return false;
    }

    /**
     * @param $articleId
     * @return string
     */
    public function getSubscriptionArticleId($articleId): string
    {
        $article = oxNew(Article::class);
        $article->load($articleId);

        if ($article->isVariant()) {
            $articleId = $article->getParentId();
        }
        return $articleId;
    }

    /**
     * @param string $variantId
     * @param string|null $articleId
     * @param BillingCycle $cycle
     * @param int $sort
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function saveVariantProduct(
        string $variantId,
        ?string $articleId,
        BillingCycle $cycle,
        int $sort = 1
    ): void {
        $sql = "INSERT INTO oxarticles(
                       oxid,
                       oxshopid,
                       oxparentid,
                       oxactive,
                       oxprice, 
                       oxissearch, 
                       oxvarselect,
                       oxsubclass,
                       oxvpe, 
                       oxshowcustomagreement,
                       oxstock,
                       oxsort,        
                       oxvarname)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

        DatabaseProvider::getDb()->execute($sql, [
            $variantId,
            Registry::getConfig()->getShopId(),
            $articleId,
            1,
            $cycle->pricing_scheme->fixed_price->value,
            1,
            $cycle->total_cycles . ' ' . $cycle->frequency->interval_unit . ' @ ' .
            $cycle->pricing_scheme->fixed_price->value . ' ' . $cycle->pricing_scheme->fixed_price->currency_code .
            '/' . $cycle->frequency->interval_unit . ($cycle->tenure_type == BillingCycle::TENURE_TYPE_TRIAL
                ? ' (TRIAL)' : ''),
            'oxarticle',
            1,
            1,
            1000,
            $sort,
            'subscribe'
        ]);
    }
}
