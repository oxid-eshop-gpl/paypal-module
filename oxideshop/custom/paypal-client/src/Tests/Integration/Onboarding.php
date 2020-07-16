<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Onboarding;
use PHPUnit\Framework\TestCase;

class Onboarding extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createClient(Onboarding::class);
    }

    public function testGetSignupLink()
    {
        $accessToken = $this->client->getTokenResponse();
        $this->client->generateSignupLink(
            $accessToken,
            $this->client->createSellerNonce()
        );

        $this->assertTrue($this->client->getSignupLink());

    }
}
