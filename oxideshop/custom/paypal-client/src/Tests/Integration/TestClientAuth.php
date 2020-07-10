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

        $output = new ConsoleOutput(OutputInterface::VERBOSITY_DEBUG);
        $logger = new ConsoleLogger($output);
        $this->client = new Client($logger, Client::SANDBOX_URL);
    }

    public function testAuth()
    {
        $setting = include __DIR__ . '/auth.php';
        $this->assertFalse($this->client->isAuthenticated());
        $this->client->auth($setting['clientId'], $setting['clientSecret']);
        $this->assertTrue($this->client->isAuthenticated());
    }

    public function testAuthFailing()
    {
        $this->assertFalse($this->client->isAuthenticated());
        $this->expectExceptionCode(401);
        $this->client->auth('wrongClientId', 'wrongClientSecret');
        $this->assertFalse($this->client->isAuthenticated());
    }
}
