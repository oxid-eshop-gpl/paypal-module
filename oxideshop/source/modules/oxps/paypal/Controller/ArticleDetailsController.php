<?php

/**
 * This file is part of OXID eSales Paypal module.
 *
 * OXID eSales Paypal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Paypal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Paypal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Controller;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Plan;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Repository\SubscriptionRepository;

/**
 * Class ArticleDetailsController
 * @mixin \OxidEsales\Eshop\Application\Controller\ArticleDetailsController
 */
class ArticleDetailsController extends ArticleDetailsController_parent
{
    public function render()
    {
        $return = parent::render();

        $subscriptionRepository = new SubscriptionRepository();

        $articleId = Registry::getRequest()->getRequestEscapedParameter('anid');

        $childArticle = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)
            ->getOne("SELECT OXID FROM oxarticles WHERE OXPARENTID = ?", [$articleId]);

        if ($childArticle) {
            $articleId = $childArticle;
        }

        /** @var Article $article */
        $article = oxNew(Article::class);
        $article->load($articleId);

        $paypalSubscriptionPlanId = $subscriptionRepository->isSubscribableProduct($articleId);
        $this->addTplParam('isSubscribableProduct', $paypalSubscriptionPlanId ? true : false);

        if ($paypalSubscriptionPlanId) {
            $sf = Registry::get(ServiceFactory::class);
            /** @var Plan $subscriptionPlan */
            $subscriptionPlan = $sf->getSubscriptionService()->showPlanDetails('string', $paypalSubscriptionPlanId, 1);
            $this->addTplParam('subscriptionPlan', $subscriptionPlan);
            $this->addTplParam('billingCycles', $subscriptionPlan->billing_cycles);
            $this->addTplParam('setupFee', $subscriptionPlan->payment_preferences->setup_fee);

            Registry::getSession()->setVariable('currentSubscriptionView', json_encode($subscriptionPlan));
        }

        return $return;
    }
}
