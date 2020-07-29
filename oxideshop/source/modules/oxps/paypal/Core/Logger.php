<?php

namespace OxidProfessionalServices\Paypal\Core;

use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonoLogLogger;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Model\Logger\LogMessage;
use OxidProfessionalServices\PayPal\Repository\LogRepository;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger
{
    /**
     * @var LogRepository
     */
    private $repository;

    /**
     * @var string
     */
    private $logFileName;

    public function __construct($logFileName = 'paypal_module.log')
    {
        $this->logFileName = $logFileName;
        $this->repository = new LogRepository();
    }

    /**
     * @param $message
     * @param array $context
     * @throws DatabaseErrorException
     * @throws DatabaseConnectionException
     */
    public function logMessage($message, array $context = []): void
    {
        $user = Registry::getSession()->getUser();
        $basket = Registry::getSession()->getBasket();
        $defaultUser = $user !== false ? $user->getId() : 'guest';
        $userId = !empty($context['userId']) ? $context['userId'] : $defaultUser;

        $logMessage = new LogMessage();
        $logMessage->setUserId($userId);
        $logMessage->setOrderId($context['orderId'] ?? $basket->getOrderId() ?? 'no basket');
        $logMessage->setShopId($context['shopId'] ?? Registry::getConfig()->getShopId());
        $logMessage->setRequestType($context['requestType'] ?? 'paypal');
        $logMessage->setResponseMessage($message);
        $logMessage->setStatusCode($context['statusCode'] ?? '200');
        $logMessage->setIdentifier($context['identifier'] ?? $context['orderId'] ?? $userId);
        $logMessage->setAmount($context['amount'] ?? 'null');

        $this->repository->saveLogMessage($logMessage);
    }

    /**
     * @return LogRepository
     */
    public function getRepository(): LogRepository
    {
        return $this->repository;
    }

    /**
     * @param int $log_level
     * @return MonoLogLogger
     * @throws \Exception
     */
    private function getLogger(int $log_level): LoggerInterface
    {
        $logger = new MonoLogLogger($this->logFileName);
        $logger->pushHandler(
            new StreamHandler(
                Registry::getConfig()->getLogsDir() . $this->logFileName,
                $log_level
            )
        );

        return $logger;
    }

    /**
     * @param string $level
     * @param string $message
     * @param array $context
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function log($level, $message, array $context = [])
    {
        $levelName = MonoLogLogger::getLevels()[strtoupper($level)];
        $this->getLogger($levelName)->addRecord($levelName, $message, $context);
        $context['log_level'] = $levelName;
        $this->logMessage($message, $context);
    }
}
