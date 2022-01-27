<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Repository;

use PDO;
use OxidSolutionCatalysts\PayPal\Core\Exception\NotFound;
use OxidSolutionCatalysts\PayPal\Traits\ServiceContainer;
use OxidSolutionCatalysts\PayPal\Model\SubscriptionProduct;
use Doctrine\DBAL\Query\QueryBuilder;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use OxidEsales\EshopCommunity\Internal\Transition\Utility\ContextInterface;

class Subscription
{
    use ServiceContainer;

    /**
     * @param $oxid
     * @return array
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    public function PayPalProductIdByProductOxid(string $oxartid): string
    {
        $queryBuilder = $this->getServiceFromContainer(QueryBuilderFactoryInterface::class)
            ->create();

        $idFromDb = $queryBuilder->select('PAYPALPRODUCTID')
            ->from('osc_paypal_subscription_product')
            ->where('OXARTID = :OXARTID')
            ->andWhere('OXSHOPID = :OXSHOPID')
            ->setParameters(
                [
                    'OXSHOPID' => $this->getServiceFromContainer(ContextInterface::class)->getShopId(),
                    'OXARTID' => $oxartid,
                ]
            )
            ->setMaxResults(1)
            ->execute()
            ->fetch(PDO::FETCH_COLUMN);

        if (!$idFromDb) {
           throw NotFound::notFound();
        }

        return $idFromDb;
    }

    /**
     * @return SubscriptionProduct[]
     *
     * @throws NotFound
     * @throws \Doctrine\DBAL\Exception
     */
    public function linkedProductsByProductOxid(string $oxartid): array
    {
        $queryBuilder = $this->getServiceFromContainer(QueryBuilderFactoryInterface::class)
            ->create();
        $queryBuilder->getConnection()->setFetchMode(PDO::FETCH_ASSOC);

        /** @var \Doctrine\DBAL\Statement $result */
        $result = $queryBuilder->select('*')
            ->from('osc_paypal_subscription_product')
            ->where('OXARTID = :OXARTID')
            ->andWhere('OXSHOPID = :OXSHOPID')
            ->setParameters(
                [
                    'OXSHOPID' => $this->getServiceFromContainer(ContextInterface::class)->getShopId(),
                    'OXARTID' => $oxartid,
                ]
            )
            ->execute();

        $return = [];
        foreach ($result as $row) {
            $model = oxNew(SubscriptionProduct::class);
            $model->assign($row);
            $return[] = $model;
        }

        return $return;
    }
}