<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use JsonMapper;
use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\ProductCollection;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\ProductRequestPOST;

class Catalog
{
    /** @var Client */
    public $client;

    /**
     * @param $client Client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createProduct(ProductRequestPOST $productRequest, $prefer = 'return=minimal'): Product
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($productRequest, true);
        $request = $this->client->createRequest('POST', "/v1/catalogs/products", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Product());
    }

    public function listProducts($totalRequired = false, $page = 1, $pageSize = 10): ProductCollection
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/catalogs/products", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new ProductCollection());
    }

    public function showProductDetails($productId): Product
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/catalogs/products/{$productId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Product());
    }

    public function updateProduct($productId, array $patchRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($patchRequest, true);
        $request = $this->client->createRequest('PATCH', "/v1/catalogs/products/{$productId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Product());
    }
}
