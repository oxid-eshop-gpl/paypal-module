<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Model;

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Application\Model\Article as EshopModelArticle;
use OxidSolutionCatalysts\PayPal\Core\Exception\NotFound;

class SubscriptionProduct extends BaseModel
{
    /**
     * Coretable name
     *
     * @var string
     */
    protected $_sCoreTable = 'osc_paypal_subscription_product';

    /**
     * Construct initialize class
     */
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    public function getPayPalProductId(): string
    {
        return $this->getFieldData('paypalproductid');
    }

    public function getSubscriptionPlanId(): string
    {
        return $this->getFieldData('paypalsubscriptionplanid');
    }

    public function getShopProduct(): EshopModelArticle
    {
        $product = oxNew(EshopModelArticle::class);

        if (!$product->load($this->getFieldData('paypalsubscriptionplanid'))) {
            throw NotFound::notFound();
        }

        return $product;
    }
}