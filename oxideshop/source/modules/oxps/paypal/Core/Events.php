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

use OxidEsales\Eshop\Application\Model\Payment;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Repository\LogRepository;

class Events
{
    /**
     * Execute action on activate event
     */
    public static function onActivate()
    {
        self::createLogTable();
        self::addPaymentMethod();
        self::enablePaymentMethod();
        self::createPaypalOrderTable();
        self::createSubscriptionProductTable();
    }

    /**
     * Add PayPal payment method set EN and DE long descriptions
     */
    public static function addPaymentMethod(): void
    {
        $paymentDescriptions = array(
            'en' => '<div>PayPal v2</div>',
            'de' => '<div>PayPal v2</div>'
        );

        $payment = oxNew(Payment::class);
        if (!$payment->load('oxidpaypal')) {
            $payment->setId('oxidpaypal');
            $payment->oxpayments__oxactive = new Field(1);
            $payment->oxpayments__oxdesc = new Field('PayPal');
            $payment->oxpayments__oxaddsum = new Field(0);
            $payment->oxpayments__oxaddsumtype = new Field('abs');
            $payment->oxpayments__oxfromboni = new Field(0);
            $payment->oxpayments__oxfromamount = new Field(0);
            $payment->oxpayments__oxtoamount = new Field(10000);

            $languages = Registry::getLang()->getLanguageIds();
            foreach ($paymentDescriptions as $languageAbbreviation => $description) {
                $languageId = array_search($languageAbbreviation, $languages);
                if ($languageId !== false) {
                    $payment->setLanguage($languageId);
                    $payment->oxpayments__oxlongdesc = new Field($description);
                    $payment->save();
                }
            }
        }
    }

    /**
     * Disables payment method
     */
    public static function disablePaymentMethod(): void
    {
        $payment = oxNew(Payment::class);
        if ($payment->load('oxidpaypal')) {
            $payment->oxpayments__oxactive = new Field(0);
            $payment->save();
        }
    }

    /**
     * Activates PayPal payment method
     */
    public static function enablePaymentMethod(): void
    {
        $payment = oxNew(Payment::class);
        $payment->load('oxidpaypal');
        $payment->oxpayments__oxactive = new Field(1);
        $payment->save();
    }

    /**
     * Execute action on deactivate event
     *
     * @return void
     */
    public static function onDeactivate(): void
    {
        self::disablePaymentMethod();
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
                            COMMENT \'Response from Paypal API\',
                        `OXPS_PAYPAL_STATUS_CODE`
                            VARCHAR(100)
                            NOT NULL
                            COMMENT \'Status code from Paypal API\',
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
                            COMMENT \'Paypal index to search by\',
                        PRIMARY KEY (`OXPS_PAYPAL_PAYLOGID`))
                            ENGINE=InnoDB
                            COMMENT \'Paypal Payment transaction log\'',
            LogRepository::TABLE_NAME
        );

        DatabaseProvider::getDb()->execute($sql);
    }

    protected static function createSubscriptionProductTable(): void
    {
        $sql = sprintf(
            'CREATE TABLE IF NOT EXISTS %s (
                        `OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ID` 
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
                        `OXPS_PAYPAL_OXARTICLE_ID` 
                            char(32) 
                            character set latin1 
                            collate latin1_general_ci 
                            NOT NULL 
                            COMMENT \'OXID product ID\',
                        `OXPS_PAYPAL_PRODUCT_ID` 
                            char(32) 
                            character set latin1 
                            collate latin1_general_ci 
                            NOT NULL 
                            COMMENT \'Paypal product ID\',
                        `OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID` 
                            char(32) 
                            character set latin1 
                            collate latin1_general_ci 
                            NOT NULL 
                            COMMENT \'Paypal PLan ID\',
                        `OXTIMESTAMP` 
                            timestamp 
                            NOT NULL 
                            default CURRENT_TIMESTAMP 
                            on update CURRENT_TIMESTAMP 
                            COMMENT \'Timestamp\',
                        PRIMARY KEY (`OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ID`)) 
                            ENGINE=InnoDB 
                            COMMENT \'Primary key\'',
            'oxps_paypal_subscription_product'
        );

        DatabaseProvider::getDb()->execute($sql);
    }

    protected static function createPaypalOrderTable(): void
    {
        $sql = sprintf(
            'CREATE TABLE IF NOT EXISTS %s (
                        `OXID`
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
                        `OXPS_PAYPAL_OXORDERID`
                            char(32)
                            character set latin1
                            collate latin1_general_ci
                            NOT NULL
                            COMMENT \'oxorder OXID\',
                        `OXPS_PAYPAL_PAYPALORDERID`
                            char(32)
                            character set latin1
                            collate latin1_general_ci
                            NOT NULL
                            COMMENT \'Paypal Order ID\',
                        `OXTIMESTAMP`
                            timestamp
                            NOT NULL
                            default CURRENT_TIMESTAMP
                            on update CURRENT_TIMESTAMP
                            COMMENT \'Timestamp\',
                        PRIMARY KEY (`OXID`),
                        KEY `OXPS_PAYPAL_OXORDERID` (`OXPS_PAYPAL_OXORDERID`)
                        )
                            ENGINE=InnoDB
                            COMMENT \'Primary key\'',
            'oxps_paypal_order'
        );

        DatabaseProvider::getDb()->execute($sql);
    }
}
