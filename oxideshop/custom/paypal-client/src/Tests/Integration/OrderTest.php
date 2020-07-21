<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Orders\DateNoTime;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Payer;
use OxidProfessionalServices\PayPal\Api\Service\Orders;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $client = ClientFactory::createClient(Client::class);
        $this->client = $client;
    }

    public function testCreateOrder()
    {
        $orderService = new Orders($this->client);
        $orderRequest = new OrderRequest();
        $orderRequest->payer = new Payer();
        $orderRequest->payer->name = "Johannes";
        $orderRequest->payer->phone = "09812943";
        $orderService->createOrder($orderRequest,"","");

    }
}
