<?php

declare(strict_types=1);

namespace OxidProfessionalServices\PayPal\Tests\Unit\Model\Logger;

use OxidProfessionalServices\PayPal\Model\Logger\LogMessage;
use OxidEsales\TestingLibrary\UnitTestCase;

class LogMessageTest extends UnitTestCase
{
    /** @var LogMessage */
    private $logMessage;

    protected function setUp()
    {
        $this->logMessage = new LogMessage();

        $this->logMessage->setIdentifier('PhpUnitTestIdentifier');
        $this->logMessage->setShopId('PhpUnitTestShopId');
        $this->logMessage->setStatusCode('PhpUnitTestStatusCode');
        $this->logMessage->setResponseMessage('PhpUnitTestResponseMessage');
        $this->logMessage->setOrderId('PhpUnitTestOrderId');
        $this->logMessage->setUserId('PhpUnitTestUserId');
        $this->logMessage->setRequestType('PhpUnitRequestType');
    }

    public function testGetShopId(): void
    {
        $this->assertEquals('PhpUnitTestShopId', $this->logMessage->getShopId());
    }

    public function testSetShopId(): void
    {
        $this->logMessage->setShopId('PhpUnitTestShopId2');
        $this->assertEquals('PhpUnitTestShopId2', $this->logMessage->getShopId());
    }

    public function testGetUserId(): void
    {
        $this->assertEquals('PhpUnitTestUserId', $this->logMessage->getUserId());
    }

    public function testSetUserId(): void
    {
        $this->logMessage->setUserId('PhpUnitTestUserId2');
        $this->assertEquals('PhpUnitTestUserId2', $this->logMessage->getUserId());
    }

    public function testGetOrderId(): void
    {
        $this->assertEquals('PhpUnitTestOrderId', $this->logMessage->getOrderId());
    }

    public function testSetOrderId(): void
    {
        $this->logMessage->setOrderId('PhpUnitTestOrderId2');
        $this->assertEquals('PhpUnitTestOrderId2', $this->logMessage->getOrderId());
    }

    public function testGetResponseMessage(): void
    {
        $this->assertEquals('PhpUnitTestResponseMessage', $this->logMessage->getResponseMessage());
    }

    public function testSetResponseMessage(): void
    {
        $this->logMessage->setResponseMessage('PhpUnitTestResponseMessage2');
        $this->assertEquals('PhpUnitTestResponseMessage2', $this->logMessage->getResponseMessage());
    }

    public function testGetStatusCode(): void
    {
        $this->assertEquals('PhpUnitTestStatusCode', $this->logMessage->getStatusCode());
    }

    public function testSetStatusCode(): void
    {
        $this->logMessage->setStatusCode('PhpUnitTestStatusCode2');
        $this->assertEquals('PhpUnitTestStatusCode2', $this->logMessage->getStatusCode());
    }

    public function testGetRequestType(): void
    {
        $this->assertEquals('PhpUnitRequestType', $this->logMessage->getRequestType());
    }

    public function testSetRequestType(): void
    {
        $this->logMessage->setRequestType('PhpUnitRequestType2');
        $this->assertEquals('PhpUnitRequestType2', $this->logMessage->getRequestType());
    }

    public function testGetIdentifier(): void
    {
        $this->assertEquals('PhpUnitTestIdentifier', $this->logMessage->getIdentifier());
    }

    public function testSetIdentifier(): void
    {
        $this->logMessage->setIdentifier('PhpUnitTestIdentifier2');
        $this->assertEquals('PhpUnitTestIdentifier2', $this->logMessage->getIdentifier());
    }
}
