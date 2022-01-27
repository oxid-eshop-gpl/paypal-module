<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Tests\Integration\Subscrption;

use OxidEsales\TestingLibrary\UnitTestCase;
use OxidEsales\Eshop\Core\Registry as EshopRegistry;
use OxidEsales\Eshop\Core\Request;
use OxidSolutionCatalysts\PayPal\Core\Exception\NotFound;
use OxidSolutionCatalysts\PayPal\Model\SubscriptionProduct;
use OxidSolutionCatalysts\PayPal\Repository\Subscription as SubscriptionRepository;

use OxidSolutionCatalysts\PayPal\Core\Api\CatalogService;
use OxidSolutionCatalysts\PayPal\Core\ServiceFactory;

use OxidEsales\Eshop\Application\Model\Article as EshopModelArticle;


use OxidSolutionCatalysts\PayPal\Core\Api\SubscriptionService;


use OxidEsales\Eshop\Application\Model\Order as EshopModelOrder;
use OxidSolutionCatalysts\PayPalApi\Service\Orders as PayPalApiOrders;
use OxidSolutionCatalysts\PayPal\Core\Webhook\Handler\CheckoutOrderCompletedHandler;
use OxidSolutionCatalysts\PayPal\Core\Exception\WebhookEventException;
use OxidSolutionCatalysts\PayPal\Core\Webhook\Event as WebhookEvent;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\Order as ApiOrderResponse;



final class PayPalSubscribeTest extends UnitTestCase
{
    private const PRODUCT_ID = 'dc5ffdf380e15674b56dd562a7cb6aec';

    //TODO: split into unit test for moduel and integration test for repo
    public function testSaveLoadUpdateDelteeSubscriptionProduct(): void
    {
        $data =  [
            'OXID' => '_testoxid',
            'OXARTID' => self::PRODUCT_ID,
            'PAYPALPRODUCTID' => 'dummy_id',
            'PAYPALSUBSCRIPTIONPLANID' => 'dummy_plan'
        ];

        //create
        $product = oxNew(SubscriptionProduct::class);
        $product->assign($data);
        $this->assertEquals($data['OXID'], $product->save());

        //load and check
        $product = oxNew(SubscriptionProduct::class);
        $product->load($data['OXID']);
        $this->assertEquals($data['PAYPALPRODUCTID'], $product->getPayPalProductId());
        $this->assertEquals($data['PAYPALSUBSCRIPTIONPLANID'], $product->getSubscriptionPlanId());

        //change
        $product->assign(['PAYPALSUBSCRIPTIONPLANID' => 'updated_data']);
        $product->save();

        //search with repo
        $repo = oxNew(SubscriptionRepository::class);
        $product = $repo->loadByProductOxid(self::PRODUCT_ID);
        $this->assertEquals($data['PAYPALPRODUCTID'], $product->getPayPalProductId());
        $this->assertEquals('updated_data', $product->getSubscriptionPlanId());

        //expect exception because now it was deleted
        $product->delete();

        $this->expectException(NotFound::class);
        $repo->loadByProductOxid(self::PRODUCT_ID);
    }



    public function _testFullIntegrationCreatePayPalProduct(): void
    {
        $client = EshopRegistry::get(ServiceFactory::class)
            ->getSubscriptionService();

        $product = oxNew(EshopModelArticle);
        $product->load(self::PRODUCT_ID);

        $service = oxNew(CatalogService::class, $product, $client, self::PRODUCT_ID);
    }

   /*
    public function testFullIntegrationCreateProduct(): void
    {
        $this->markTestIncomplete();

        $client = EshopRegistry::get(ServiceFactory::class)
            ->getSubscriptionService();

        $request = $this->getMockBuild(Request::class)
            ->getMock();

        $service = oxNew(SubscriptionService::class, $client, $request);
    } */

}