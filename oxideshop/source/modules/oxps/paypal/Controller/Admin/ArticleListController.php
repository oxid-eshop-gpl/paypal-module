<?php

namespace OxidProfessionalServices\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
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

    public function hasLinkedObject($oxid)
    {
        $linkedObject = null;

        $article = oxNew(Article::class);
        $article->load($oxid);

        $repository = new SubscriptionRepository();

        $childArticle = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)
            ->getOne("SELECT OXID FROM oxarticles WHERE OXPARENTID = ?", [$oxid]);

        if (!$childArticle) {
            $linkedProduct = $repository->getLinkedProductByOxid($oxid);
            if ($linkedProduct) {
                $linkedObject = Registry::get(ServiceFactory::class)->getCatalogService()->showProductDetails($linkedProduct[0]['OXPS_PAYPAL_PRODUCT_ID']);
            }

            if ($linkedObject) {
                return true;
            }

            return false;
        }

        try {
            $linkedObject = $repository->getLinkedProductByOxid($childArticle);
        } catch (DatabaseConnectionException $e) {
            return false;
        } catch (DatabaseErrorException $e) {
            return false;
        }

        if (empty($linkedObject)) {
            return false;
        }

        return true;
    }
}
