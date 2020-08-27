<?php

namespace OxidProfessionalServices\PayPal\Repository;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\UtilsObject;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product;
use OxidEsales\Eshop\Core\Registry;

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
     * @param Product $response
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function saveLinkedProduct(Product $response, $oxid): void
    {
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
}
