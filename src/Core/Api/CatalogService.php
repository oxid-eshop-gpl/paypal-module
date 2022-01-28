<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Core\Api;

use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidSolutionCatalysts\PayPalApi\Exception\ApiException;
use OxidSolutionCatalysts\PayPalApi\Model\Catalog\Patch;
use OxidSolutionCatalysts\PayPalApi\Model\Catalog\Product;
use OxidSolutionCatalysts\PayPalApi\Model\Catalog\ProductRequestPOST;
use OxidSolutionCatalysts\PayPalApi\Service\Catalog;
use OxidSolutionCatalysts\PayPal\Core\ServiceFactory;
use OxidSolutionCatalysts\PayPal\Repository\SubscriptionRepository;
use OxidSolutionCatalysts\PayPalApi\Service\Catalog as PaypalApiCatalog;

class CatalogService
{
    /**
     * @var PaypalApiCatalog
     */
    public $apiCatalog;

    /**
     * @var Request
     */
    private $request;

    private $linkedObject;

    public function __construct(
        Product $linkedObject = null,
        PaypalApiCatalog $apiCatalog,
        Request $request
    )
    {
        $this->apiCatalog = $apiCatalog;
        $this->request = $request;
        $this->linkedObject = $linkedObject;
    }

    /**
     * @param $productId
     * @throws ApiException
     */
    public function updateProduct($productId): void
    {
        $this->updateProductDescription($productId);
        $this->updateProductCategory($productId);
        $this->updateImageUrl($productId);
        $this->updateHomeUrl($productId);
    }

    /**
     * @param $productId
     * @throws ApiException
     */
    private function updateProductDescription($productId): void
    {
        if ($this->linkedObject->description !== $this->request->getRequestEscapedParameter('description')) {
            $patchRequest = new Patch();
            $patchRequest->op = Patch::OP_REPLACE;
            $patchRequest->value = $this->request->getRequestEscapedParameter('description');
            $patchRequest->path = '/description';
            $this->apiCatalog->updateProduct($productId, [$patchRequest]);
        }
    }

    /**
     * @param $productId
     */
    private function updateProductCategory($productId): void
    {
        if ($this->linkedObject->category !== $this->request->getRequestEscapedParameter('category')) {
            $patchRequest = new Patch();
            $patchRequest->op = Patch::OP_REPLACE;
            $patchRequest->value = $this->request->getRequestEscapedParameter('category');
            $patchRequest->path = '/category';
            $this->apiCatalog->updateProduct($productId, [$patchRequest]);
        }
    }

    /**
     * @param $productId
     * @throws ApiException
     */
    private function updateImageUrl($productId): void
    {
        if ($this->linkedObject->image_url !== $this->request->getRequestEscapedParameter('imageUrl')) {
            $patchRequest = new Patch();
            $patchRequest->op = Patch::OP_REPLACE;
            $patchRequest->value = $this->request->getRequestEscapedParameter('imageUrl');
            $patchRequest->path = '/image_url';
            $this->apiCatalog->updateProduct($productId, [$patchRequest]);
        }
    }

    /**
     * @param $productId
     * @throws ApiException
     */
    private function updateHomeUrl($productId): void
    {
        if ($this->linkedObject->home_url !== $this->request->getRequestEscapedParameter('homeUrl')) {
            $patchRequest = new Patch();
            $patchRequest->op = Patch::OP_REPLACE;
            $patchRequest->value = $this->request->getRequestEscapedParameter('homeUrl');
            $patchRequest->path = '/home_url';
            $this->apiCatalog->updateProduct($productId, [$patchRequest]);
        }
    }

    /**
     * @throws ApiException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function createProduct(): void
    {
        $productRequest = [];
        $productRequest['name'] = utf8_encode($this->request->getRequestParameter('title'));
        $productRequest['description'] = utf8_encode($this->request->getRequestParameter('description'));
        $productRequest['type'] = $this->request->getRequestParameter('productType');
        $productRequest['category'] = $this->request->getRequestParameter('category');
        $productRequest['image_url'] = $this->request->getRequestParameter('imageUrl');
        $productRequest['home_url'] = $this->request->getRequestParameter('homeUrl');

        $productRequestPost = new ProductRequestPOST($productRequest);

        /** @var Product $response */
        $response = $this->apiCatalog->createProduct($productRequestPost);

        $repository = new SubscriptionRepository();

        $repository->saveLinkedProduct(
            $response,
            $this->request->getRequestParameter('oxid')
        );
    }
}
