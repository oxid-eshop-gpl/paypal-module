<?php

namespace OxidProfessionalServices\PayPal\Repository;

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\UtilsObject;
use OxidProfessionalServices\PayPal\Model\Logger\LogMessage;

class LogRepository
{
    public const TABLE_NAME = 'paypalmodulelog';

    /**
     * @param LogMessage $logMessage
     * @throws DatabaseErrorException
     * @throws DatabaseConnectionException
     */
    public function saveLogMessage(LogMessage $logMessage): void
    {
        $id = UtilsObject::getInstance()->generateUId();

        $sql = sprintf(
            'INSERT INTO %s (
                `OXPS_PAYPAL_PAYLOGID`, 
                `OXPS_PAYPAL_OXSHOPID`, 
                `OXPS_PAYPAL_OXUSERID`, 
                `OXPS_PAYPAL_OXORDERID`, 
                `OXPS_PAYPAL_RESPONSE_MSG`, 
                `OXPS_PAYPAL_STATUS_CODE`, 
                `OXPS_PAYPAL_REQUEST_TYPE`,
                `OXPS_PAYPAL_IDENTIFIER`
                ) VALUES (?,?,?,?,?,?,?,?)',
            self::TABLE_NAME
        );

        DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->execute($sql, [
            $id,
            $logMessage->getShopId(),
            $logMessage->getUserId(),
            $logMessage->getOrderId(),
            $logMessage->getResponseMessage(),
            $logMessage->getStatusCode(),
            $logMessage->getRequestType(),
            $logMessage->getIdentifier(),
        ]);
    }

    /**
     * @param string $userId
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function findLogMessageForUserId(string $userId): array
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll(
            sprintf('SELECT * FROM %s WHERE OXPS_PAYPAL_OXUSERID = ? ORDER BY OXTIMESTAMP', self::TABLE_NAME),
            [$userId]
        );
    }

    /**
     * @param string $identifier
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function findLogMessageForIdentifier(string $identifier): array
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll(
            sprintf('SELECT * FROM %s WHERE OXPS_PAYPAL_IDENTIFIER = ? ORDER BY OXTIMESTAMP', self::TABLE_NAME),
            [$identifier]
        );
    }

    /**
     * @param string $orderId
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function findLogMessageForOrderId(string $orderId): array
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll(
            sprintf('SELECT * FROM %s WHERE OXPS_PAYPAL_OXORDERID = ? ORDER BY OXTIMESTAMP', self::TABLE_NAME),
            [$orderId]
        );
    }

    // @todo These utility methods do not belong here, should be moved to a more fitting place

    /**
     * @param $orderId
     * @param $remark
     * @param string $transStatus
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function markOrderPaid($orderId, $remark, $transStatus = 'OK'): void
    {
        $sql = 'UPDATE oxorder SET OXPAID = ?, OXTRANSSTATUS = ?, OXREMARK = ? WHERE OXID=?';
        DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->execute(
            $sql,
            [
                date('Y-m-d H:i:s'),
                $transStatus,
                $remark,
                $orderId
            ]
        );
    }

    /**
     * @param $orderId
     * @param string $transStatus
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateOrderStatus($orderId, $transStatus = 'OK'): void
    {
        $sql = 'UPDATE oxorder SET OXTRANSSTATUS = ? WHERE OXID=?';
        DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->execute(
            $sql,
            [
                $transStatus,
                $orderId
            ]
        );
    }
}
