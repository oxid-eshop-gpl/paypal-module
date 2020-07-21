<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\CreateProductRequest;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\ProductDetails;
use OxidProfessionalServices\PayPal\Api\Service\Catalog;
use PHPUnit\Framework\TestCase;

class CatalogTest extends TestCase
{
    /**
     * @var Catalog
     */
    private $catalogUnderTest;

    public function setUp()
    {
        parent::setUp();
        $client = ClientFactory::createClient(Client::class);
        $this->catalogUnderTest = new Catalog($client);
    }

    public function testCreateProduct()
    {
        $pd = new CreateProductRequest();
        $pd->id = "123456" . rand(0,100);
        $pd->name = "foo";

        /**
         * DIGITAL, SERVICE
         * todo: generate constant values
         * ProductDetails::TYPE_DIGITAL ...
         */
        $pd->type = "PHYSICAL";
        $pd->description = "bla bla";
        $pd->home_url = "https://oxid.de/foo";
        $pd->links = [];
        $pd->image_url = "";

        /**
         * todo:
         * mandatory parameters and range validation
         * assert(ProductDetails->isValid())
         */

        $res = $this->catalogUnderTest->createProduct($pd);
    }
}
