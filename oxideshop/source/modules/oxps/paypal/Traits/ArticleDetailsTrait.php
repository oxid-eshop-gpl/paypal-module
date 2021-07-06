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
trait ArticleDetailsTrait
{
    protected function loadTemplateSubscriptionData(): void
    {
        $subscriptionRepository = new SubscriptionRepository();

        $articleId = Registry::getRequest()->getRequestEscapedParameter('anid');

        /** @var Article $article */
        $article = oxNew(Article::class);
        $article->load($articleId);

        $subscriptionPlans = [];

        if ($linkedProducts = $subscriptionRepository->getLinkedProductByOxid($articleId)) {
            $sf = Registry::get(ServiceFactory::class);
            foreach ($linkedProducts as $linkedProduct) {
                $subscriptionPlan = $sf
                    ->getSubscriptionService()
                    ->showPlanDetails('string', $linkedProduct['OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID'], 1);
                if ($subscriptionPlan->status == 'ACTIVE') {
                    $subscriptionPlans[] = $subscriptionPlan;
                }
            }
        }

        $this->addTplParam('subscriptionPlans', $subscriptionPlans);
        $this->addTplParam('hasSubscriptionPlans', (count($subscriptionPlans) > 0));
    }

    public function checkLogin(): void
    {
        $user = $this->getSession()->getUser();

        if (!$user) {
            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')
               . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $url = explode('?', $url)[0];
            $this->addTplParam('currentUrl', $url);
            $this->addTplParam('isLoggedIn', false);
        } else {
            $this->addTplParam('isLoggedIn', true);
        }
    }

    public function render()
    {
        $return = parent::render();

        $this->checkLogin();
        $this->loadTemplateSubscriptionData();

        return $return;
    }
}
