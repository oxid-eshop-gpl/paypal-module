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

    protected function tearDown(): void
    {
        $this->addTableForCleanup('osc_paypal_subscription_product');

        parent::tearDown();
    }

    //TODO: split into unit test for module and integration test for repo
    public function _testSaveLoadUpdateDeleteSubscriptionProduct(): void
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
        $this->assertEquals($data['PAYPALPRODUCTID'], $repo->getPayPalProductIdByProductOxid(self::PRODUCT_ID));

        $product->delete();
        $this->assertEquals('', $repo->getPayPalProductIdByProductOxid(self::PRODUCT_ID));
    }

    public function _testFetchAllLinkedProducts(): void
    {
        $data =  [
            'OXID' => '_testoxid1',
            'OXARTID' => self::PRODUCT_ID,
            'PAYPALPRODUCTID' => 'dummy_id',
            'PAYPALSUBSCRIPTIONPLANID' => 'dummy_plan_one'
        ];

        //create
        $product = oxNew(SubscriptionProduct::class);
        $product->assign($data);
        $this->assertEquals($data['OXID'], $product->save());

        $data =  [
            'OXID' => '_testoxid2',
            'OXARTID' => self::PRODUCT_ID,
            'PAYPALPRODUCTID' => 'dummy_id',
            'PAYPALSUBSCRIPTIONPLANID' => 'dummy_plan_two'
        ];

        //create
        $product = oxNew(SubscriptionProduct::class);
        $product->assign($data);
        $this->assertEquals($data['OXID'], $product->save());

        $repo = oxNew(SubscriptionRepository::class);
        $products = $repo->linkedProductsByProductOxid(self::PRODUCT_ID);

        $this->assertCount(2, $products);
    }

    public function testFullIntegrationCreatePayPalProduct(): void
    {
        $valueMap = [
            ['oxid', self::PRODUCT_ID],
            ['title', 'test title'],
            ['description', 'description'],
            ['productType', 'PHYSICAL_GOODS'],
            ['category', 'ARTS_AND_CRAFTS'],
            ['imageUrl', 'https://localhost.local/image.png'],
            ['homeUrl', 'https://localhost.local/myproduct']
        ];

        //NOTE: return map refused ot work with original class mock
        $requestMock = $this->getMockBuilder(TestRequest::class)
            ->getMock();
        $requestMock->expects($this->any())
            ->method('getRequestParameter')
            ->willReturnMap($valueMap);

        $catalogService= new CatalogService(
            null,
            EshopRegistry::get(ServiceFactory::class)->getCatalogService(),
            $requestMock
        );

        $repo = oxNew(SubscriptionRepository::class);
        $this->assertEquals('', $repo->getPayPalProductIdByProductOxid(self::PRODUCT_ID));

        $catalogService->createProduct();

        //TODO: PP complains about the request data, check what's up
        $this->assertNotEquals('', $repo->getPayPalProductIdByProductOxid(self::PRODUCT_ID));
    }
}

class TestRequest extends Request
{
    public function getRequestParameter(string $key)
    {
        return 'foo';
    }
}