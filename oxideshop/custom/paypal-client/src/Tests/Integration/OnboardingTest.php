<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Onboarding;
use PHPUnit\Framework\TestCase;

class OnboardingTest extends TestCase
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
        $this->client->auth();
        $accessToken = $this->client->getTokenResponse();

        $this->assertIsArray($accessToken);
        $this->assertArrayHasKey('access_token', $accessToken);

        $this->client->generateSignupLink(
            $accessToken['access_token'],
            $this->client->createSellerNonce()
        );

        $this->assertTrue($this->client->getSignupLink());

    }
}
