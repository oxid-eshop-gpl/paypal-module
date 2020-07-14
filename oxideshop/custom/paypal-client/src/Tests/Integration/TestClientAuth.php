<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class TestClientAuth extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createClient(Client::class);
    }

    public function testAuth()
    {
        $this->assertFalse($this->client->isAuthenticated());
        $this->client->auth();
        $this->assertTrue($this->client->isAuthenticated());
    }

    public function testAuthFailing()
    {
        $client = ClientFactory::createCustomClient(Client::class, 'wrongClientId', 'wrongClientSecret', 'wrongPayerId');
        $this->assertFalse($this->client->isAuthenticated());
        $this->expectExceptionCode(401);
        $client->auth();
    }

}
