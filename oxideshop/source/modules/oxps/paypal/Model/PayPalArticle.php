<?php

namespace OxidProfessionalServices\PayPal\Model;

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Application\Model\Article;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\BillingCycle;

/**
 * Class PayPalArticle
 * created to manage the link between the oxid article and the paypal subscribable product
 * @mixin Article
 */
class PayPalArticle extends PayPalArticle_parent
{
    /**
     * @return bool
     */
    public function isPayPalProductLinked()
    {
        return $this->getPayPalProductId() !== "";
    }

    /**
     * @return string
     */
    public function getPayPalProductId(): string
    {
        $sql = 'SELECT OXPS_PAYPAL_PRODUCT_ID
            FROM oxps_paypal_subscription_product
            WHERE OXPS_PAYPAL_OXARTICLE_ID = ?';

        return (string) DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)
            ->getOne(
                $sql,
                [
                    $this->getId()
                ]
            );
    }
}
