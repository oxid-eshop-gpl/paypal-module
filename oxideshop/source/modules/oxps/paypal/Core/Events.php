<?php

/**
 * This file is part of OXID eSales Paypal module.
 *
 * OXID eSales Paypal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Paypal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Paypal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Core;

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidProfessionalServices\PayPal\Repository\LogRepository;

class Events
{
    /**
     * Execute action on activate event
     */
    public static function onActivate()
    {
        self::createLogTable();
    }

    /**
     * Execute action on deactivate event
     *
     * @return void
     */
    public static function onDeactivate(): void
    {
    }

    protected static function createLogTable(): void
    {
        $sql = sprintf(
            'CREATE TABLE IF NOT EXISTS %s (
                        `OXPS_PAYPAL_PAYLOGID` 
                            char(32) 
                            character set latin1 
                            collate latin1_general_ci 
                            NOT NULL 
                            COMMENT \'Record id\',
                        `OXPS_PAYPAL_OXSHOPID` 
                            char(32) 
                            character set latin1 
                            collate latin1_general_ci 
                            NOT NULL 
                            COMMENT \'Shop id (oxshops)\',
                        `OXPS_PAYPAL_OXUSERID` 
                            char(32) 
                            character set latin1 
                            collate latin1_general_ci 
                            NOT NULL 
                            COMMENT \'User id (oxuser)\',
                        `OXPS_PAYPAL_OXORDERID` 
                            char(32) 
                            character set latin1 
                            collate latin1_general_ci 
                            NOT NULL 
                            COMMENT \'Order id (oxorder)\',
                        `OXPS_PAYPAL_RESPONSE_MSG` 
                            TEXT 
                            NOT NULL 
                            COMMENT \'Response from Amazon SDK\',
                        `OXPS_PAYPAL_STATUS_CODE` 
                            VARCHAR(100) 
                            NOT NULL 
                            COMMENT \'Status code from Amazon SDK\',
                        `OXPS_PAYPAL_REQUEST_TYPE` 
                            VARCHAR(100) 
                            NOT NULL 
                            COMMENT \'Request type\',        
                        `OXTIMESTAMP` 
                            timestamp 
                            NOT NULL 
                            default CURRENT_TIMESTAMP 
                            on update CURRENT_TIMESTAMP 
                            COMMENT \'Timestamp\',
                        `OXPS_PAYPAL_IDENTIFIER`
                            char(32)
                            character set latin1
                            collate latin1_general_ci
                            NOT NULL
                            COMMENT \'Amazon index to search by\',    
                        PRIMARY KEY (`OXPS_PAYPAL_PAYLOGID`)) 
                            ENGINE=InnoDB 
                            COMMENT \'Amazon Payment transaction log\'',
            LogRepository::TABLE_NAME
        );

        DatabaseProvider::getDb()->execute($sql);
    }
}
