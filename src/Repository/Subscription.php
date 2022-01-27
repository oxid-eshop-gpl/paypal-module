<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Repository;

use Doctrine\DBAL\FetchMode;
use OxidSolutionCatalysts\PayPal\Core\Exception\NotFound;
use OxidSolutionCatalysts\PayPal\Traits\ServiceContainer;
use Doctrine\DBAL\Query\QueryBuilder;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use OxidSolutionCatalysts\PayPal\Model\SubscriptionProduct;

class Subscription
{
    use ServiceContainer;

    /**
     * @param $oxid
     * @return array
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    public function loadByProductOxid(string $oxartid): SubscriptionProduct
    {
        $queryBuilder = $this->getServiceFromContainer(QueryBuilderFactoryInterface::class)
            ->create();

        $idFromDb = $queryBuilder->select('OXID')
            ->from('osc_paypal_subscription_product')
            ->where('OXARTID = :OXARTID')
            ->setParameters(
                [
                    'OXARTID' => $oxartid,
                ]
            )
            ->execute()
            ->fetch(FetchMode::COLUMN);

        if (!$idFromDb) {
           throw NotFound::notFound();
        }

        $product = oxNew(SubscriptionProduct::class);
        $product->setId($idFromDb);
        $product->load($idFromDb);

        return $product;
    }
}