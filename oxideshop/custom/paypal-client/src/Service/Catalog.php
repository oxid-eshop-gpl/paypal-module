<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use JsonMapper;
use OxidProfessionalServices\PayPal\Api\BaseService;
use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\ProductCollection;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\ProductRequestPOST;

class Catalog extends BaseService
{
    protected $basePath = '/v1/catalogs';

    public function createProduct(ProductRequestPOST $productRequest, $prefer = 'return=minimal'): Product
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($productRequest, true);
        $response = $this->send('POST', "/products", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Product());
    }

    public function listProducts($totalRequired = false, $page = 1, $pageSize = 10): ProductCollection
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/products", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new ProductCollection());
    }

    public function showProductDetails($productId): Product
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/products/{$productId}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Product());
    }

    public function updateProduct($productId, array $patchRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', "/products/{$productId}", $headers, $body);
    }
}
