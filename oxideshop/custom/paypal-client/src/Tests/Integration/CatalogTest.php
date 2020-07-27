<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Patch;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\ProductRequestPOST;
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

    public function testPatch()
    {
        $pd = new ProductRequestPOST();
        $pd->id = "123456";
        $pd->name = "foo";

        $res = $this->catalogUnderTest->showProductDetails($pd->id);
        if (!$res) {
            $pd->type = ProductRequestPOST::TYPE_PHYSICAL;
            $pd->description = "bla bla";
            $pd->home_url = "https://oxid.de/foo";
            $pd->validate();
            $res = $this->catalogUnderTest->createProduct($pd);
        }
        $patch = new Patch();
        $patch->op = Patch::OP_REPLACE;
        $patch->path = "/description";
        $patch->value = "https://www.google.de/test.jpg";
        $patch->validate();
        $res = $this->catalogUnderTest->updateProduct($pd->id, [$patch]);
    }

    public function testCreateProduct()
    {
        $pd = new ProductRequestPOST();
        $pd->id = "123456_" . rand(0, 1000);
        $pd->name = "foo";

        $pd->type = ProductRequestPOST::TYPE_PHYSICAL;
        $pd->description = "bla bla";
        $pd->home_url = "https://oxid.de/foo";
        //$pd->image_url = "";

        $pd->validate();

        $res = $this->catalogUnderTest->createProduct($pd);
    }

    public function testGetProducts()
    {
        $res = $this->catalogUnderTest->listProducts();
    }
}
