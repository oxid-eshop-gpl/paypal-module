<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Service\ReportingService;
use PHPUnit\Framework\TestCase;

class ListTransactionTest extends TestCase
{
    /**
     * @var ReportingService
     */
    private $reportServiceUnderTest;

    public function setUp()
    {
        parent::setUp();
        $client = ClientFactory::createClient(Client::class);
        $this->reportServiceUnderTest = new ReportingService($client);
    }

    public function testListTransaction()
    {
        $res = $this->reportServiceUnderTest->listTransactions("195073527K898493V",null, null, null,"2014-07-01T00:00:00-0700", "2020-07-29T11:59:59-0700");

    }
}