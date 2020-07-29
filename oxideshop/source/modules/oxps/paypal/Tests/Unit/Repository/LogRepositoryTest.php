<?php

declare(strict_types=1);

namespace OxidProfessionalServices\PayPal\Tests\Unit\Repository;

use OxidProfessionalServices\PayPal\Model\Logger\LogMessage;
use OxidProfessionalServices\PayPal\Repository\LogRepository;
use OxidEsales\TestingLibrary\UnitTestCase;

class LogRepositoryTest extends UnitTestCase
{
    /** @var LogRepository */
    private $logRepository;

    protected function setUp()
    {
        $this->logRepository = new LogRepository();
    }

    public function testSaveLogMessage(): void
    {
        $logMessage = $this->prepareLogMessage();
        $this->logRepository->saveLogMessage($logMessage);

        $results = $this->logRepository->findLogMessageForOrderId($logMessage->getOrderId());

        $this->assertNotEmpty($results[0]);
        $this->assertSame($results[0]['OXPS_PAYPAL_OXUSERID'], $logMessage->getUserId());
    }

    public function testFindLogMessageForUserId(): void
    {
        $logMessage = $this->prepareLogMessage();
        $this->logRepository->saveLogMessage($logMessage);

        $results = $this->logRepository->findLogMessageForUserId($logMessage->getUserId());

        $this->assertNotEmpty($results[0]);
        $this->assertSame($results[0]['OXPS_PAYPAL_OXUSERID'], $logMessage->getUserId());
    }

    public function testFindLogMessageForIdentifier(): void
    {
        $logMessage = $this->prepareLogMessage();
        $this->logRepository->saveLogMessage($logMessage);

        $results = $this->logRepository->findLogMessageForIdentifier($logMessage->getIdentifier());

        $this->assertNotEmpty($results[0]);
        $this->assertSame($results[0]['OXPS_PAYPAL_OXUSERID'], $logMessage->getUserId());
    }

    public function testFindLogMessageForOrderId(): void
    {
        $logMessage = $this->prepareLogMessage();
        $this->logRepository->saveLogMessage($logMessage);

        $results = $this->logRepository->findLogMessageForOrderId($logMessage->getOrderId());

        $this->assertNotEmpty($results[0]);
        $this->assertSame($results[0]['OXPS_PAYPAL_OXUSERID'], $logMessage->getUserId());
    }

    /**
     * @return LogMessage
     */
    private function prepareLogMessage(): LogMessage
    {
        $rand = RAND(1000, 9999);
        $logMessage = new LogMessage();
        $logMessage->setIdentifier('TestIdentifier' . $rand);
        $logMessage->setShopId('1');
        $logMessage->setUserId('1234' . $rand);
        $logMessage->setOrderId('1234' . $rand);
        $logMessage->setResponseMessage('test' . $rand);
        $logMessage->setRequestType('test' . $rand);
        $logMessage->setStatusCode('test' . $rand);

        return $logMessage;
    }
}
