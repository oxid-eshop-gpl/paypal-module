<?php

namespace OxidProfessionalServices\PayPal\Api\Tests\Integration;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Service\TransactionSearch;
use PHPUnit\Framework\TestCase;

class ListTransactionTest extends TestCase
{
    /**
     * @var TransactionSearch
     */
    private $reportServiceUnderTest;

    public function setUp()
    {
        parent::setUp();
        $client = ClientFactory::createClient(Client::class);
        $this->reportServiceUnderTest = new TransactionSearch($client);
    }

    public function testListTransaction()
    {
        $res = $this->reportServiceUnderTest->listTransactions(
            null,
            null,
            null,
            null,
            null,
            null,
            "2020-07-01T00:00:00-0700",
            "2020-07-29T11:59:59-0700",
            null,
            0,
            10
        );
    }
}
