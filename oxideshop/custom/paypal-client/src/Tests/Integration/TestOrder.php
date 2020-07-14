<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Order as OrderClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class TestOrder extends TestCase
{
    /**
     * @var OrderClient
     */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $client = ClientFactory::createClient(OrderClient::class);
        $this->client = $client;
    }

    public function testCreateOrder()
    {
        $this->client->createOrder();
    }
}
