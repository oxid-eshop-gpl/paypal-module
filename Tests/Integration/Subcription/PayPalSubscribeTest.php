<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Tests\Integration\Webhook;

use OxidEsales\TestingLibrary\UnitTestCase;


use OxidEsales\Eshop\Core\Registry as EshopRegistry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Application\Model\Article as EshopModelArticle;
use OxidSolutionCatalysts\PayPal\Core\Api\CatalogService;
use OxidSolutionCatalysts\PayPal\Core\ServiceFactory;
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

    public function testFullIntegrationCreatePayPalProduct(): void
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