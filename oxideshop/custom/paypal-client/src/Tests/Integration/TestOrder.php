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

        $output = new ConsoleOutput(OutputInterface::VERBOSITY_DEBUG);
        $logger = new ConsoleLogger($output);
        $this->client = new OrderClient($logger, Client::SANDBOX_URL);
    }

    public function testCreateOrder()
    {
        $setting = include __DIR__ . '/auth.php';

        $this->client->create($setting['clientId'], $setting['clientSecret']);
    }
}
