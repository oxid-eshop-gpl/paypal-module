<?php

namespace OxidProfessionalServices\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidProfessionalServices\PayPal\Repository\SubscriptionRepository;

class ArticleListController extends ArticleListController_Parent
{
    /**
     * @param $oxid
     * @return bool
     */
    public function isSubscriptionProduct($oxid)
    {
        return $this->hasLinkedObject($oxid);
    }

    /**
     * @param $oxid
     * @return bool
     */
    private function hasLinkedObject($oxid)
    {
        $article = oxNew(Article::class);
        $article->load($oxid);

        $repository = new SubscriptionRepository();

        try {
            $linkedProduct = $repository->getLinkedProductByOxid($oxid);
        } catch (DatabaseConnectionException $e) {
            return false;
        } catch (DatabaseErrorException $e) {
            return false;
        }

        if (empty($linkedProduct)) {
            return false;
        }

        if (!empty($linkedProduct[0]['OXPS_PAYPAL_PRODUCT_ID'])) {
            return true;
        }

        return false;
    }
}
