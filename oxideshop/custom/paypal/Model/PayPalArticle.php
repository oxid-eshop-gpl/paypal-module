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
     * PayPalProduct ID
     *
     * @var string
     */
    protected $_sPayPalProductId = null;


    /**
     * @return bool
     */
    public function isPayPalProductLinked()
    {
        return ($this->getPayPalProductId() !== "");
    }

    /**
     * @return string
     */
    public function getPayPalProductId(): string
    {
        if (is_null($this->_sPayPalProductId)) {
            $this->_sPayPalProductId = '';

            $sql = 'SELECT PAYPALPRODUCTID
                FROM oxps_paypal_subscription_product
                WHERE OXARTID = ?';

            $sPayPalProductId = (string) DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)
            ->getOne(
                $sql,
                [
                    $this->getId()
                ]
            );

            if ($sPayPalProductId) {
                $this->_sPayPalProductId = $sPayPalProductId;
            }
        }
        return $this->_sPayPalProductId;
    }
}
