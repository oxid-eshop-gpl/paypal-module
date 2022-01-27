<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Model;

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsals\Eshop\Core\Model\BaseModel;


class SubscriptionProduct extends BaseModel
{


    /**
     * Coretable name
     *
     * @var string
     */
    protected $_sCoreTable = 'b2bscheduledorders';

    /**
     * Construct initialize class
     */
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    /**
     * @param $oxid
     * @return array
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    public function getByProductOxid(string $oxartid): ?self
    {
        $queryBuilder = $this->getServiceFromContainer(QueryBuilderFactoryInterface::class)
            ->create();

        $fromDb = $queryBuilder->select($this->_sCoreTable . '.*')
            ->from($this->_sCoreTable)
            ->where('OXARTID = :OXARTID')
            ->setParameters(
                [
                    'OXARTID' => $oxartid,
                ]
            )
            ->execute();

        if () {

        }

    }

}