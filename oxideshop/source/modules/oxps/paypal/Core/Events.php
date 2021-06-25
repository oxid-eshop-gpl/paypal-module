<?php

/**
 * This file is part of OXID eSales PayPal module.
 *
 * OXID eSales PayPal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales PayPal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales PayPal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Core;

use OxidEsales\Eshop\Application\Model\Payment;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Model\BaseModel;
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
        self::createPayPalOrderTable();
        self::createSubscriptionProductTable();
        self::createSubscriptionTable();
        self::createSubscriptionProductOrderTable();
        self::configureShippingMethods();
    }

    /**
     * Add PayPal subscription table
     */
    public static function createSubscriptionTable()
    {
        DatabaseProvider::getDb()->execute(
            'CREATE TABLE IF NOT EXISTS `oxps_paypal_subscription` (
          `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
          `OXPSPAYPALID` varchar(45) DEFAULT NULL,
          `OXPSPAYPALEMAIL` varchar(45) DEFAULT NULL,
          `OXPSPAYPALSTATUS` varchar(45) DEFAULT NULL,
          `OXPSPAYPALPLANID` varchar(45) DEFAULT NULL,
          `OXPSPAYPALCREATETIME` datetime DEFAULT NULL,
          `OXPSPAYPALUPDATETIME` datetime DEFAULT NULL,
          `OXPSPAYPALSTARTTIME` datetime DEFAULT NULL,
          `OXPSPAYPALSTATUSUPDATETIME` datetime DEFAULT NULL,
          `OXTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (`OXID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
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
                            COMMENT \'Response from PayPal API\',
                        `OXPS_PAYPAL_STATUS_CODE`
                            VARCHAR(100)
                            NOT NULL
                            COMMENT \'Status code from PayPal API\',
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
                            COMMENT \'PayPal index to search by\',
                        PRIMARY KEY (`OXPS_PAYPAL_PAYLOGID`))
                            ENGINE=InnoDB DEFAULT CHARSET=utf8
                            COMMENT \'PayPal Payment transaction log\'',
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
                            COMMENT \'PayPal product ID\',
                        `OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID`
                            char(32)
                            character set latin1
                            collate latin1_general_ci
                            NOT NULL
                            COMMENT \'PayPal PLan ID\',
                        `OXTIMESTAMP`
                            timestamp
                            NOT NULL
                            default CURRENT_TIMESTAMP
                            on update CURRENT_TIMESTAMP
                            COMMENT \'Timestamp\',
                        PRIMARY KEY (`OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ID`))
                            ENGINE=InnoDB  DEFAULT CHARSET=utf8
                            COMMENT \'Primary key\'',
            'oxps_paypal_subscription_product'
        );

        DatabaseProvider::getDb()->execute($sql);
    }

    protected static function createSubscriptionProductOrderTable(): void
    {
        $sql = sprintf(
            'CREATE TABLE IF NOT EXISTS %s (
                        `OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ORDER_ID`
                            char(32)
                            character set latin1
                            collate latin1_general_ci
                            NOT NULL
                            COMMENT \'Record id\',
                        `OXPS_PAYPAL_USER_ID`
                            char(32)
                            character set latin1
                            collate latin1_general_ci
                            NOT NULL
                            COMMENT \'User id (oxuser)\',
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
                            COMMENT \'PayPal product ID\',
                        `OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID`
                            char(32)
                            character set latin1
                            collate latin1_general_ci
                            NOT NULL
                            COMMENT \'PayPal Plan ID\',
                        `OXPS_PAYPAL_SESSION_ID`
                            char(32)
                            character set latin1
                            collate latin1_general_ci
                            NOT NULL
                            COMMENT \'PHP Session ID\',
                        `OXTIMESTAMP`
                            timestamp
                            NOT NULL
                            default CURRENT_TIMESTAMP
                            on update CURRENT_TIMESTAMP
                            COMMENT \'Timestamp\',
                        PRIMARY KEY (`OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ORDER_ID`))
                            ENGINE=InnoDB  DEFAULT CHARSET=utf8
                            COMMENT \'Primary key\'',
            'oxps_paypal_subscription_product_order'
        );

        DatabaseProvider::getDb()->execute($sql);
    }

    protected static function createPayPalOrderTable(): void
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
                    COMMENT \'PayPal Order ID\',
                `OXTIMESTAMP`
                    timestamp
                    NOT NULL
                    default CURRENT_TIMESTAMP
                    on update CURRENT_TIMESTAMP
                    COMMENT \'Timestamp\',
                PRIMARY KEY (`OXID`),
                KEY `OXPS_PAYPAL_OXORDERID` (`OXPS_PAYPAL_OXORDERID`)
            )
            ENGINE=InnoDB DEFAULT CHARSET=utf8
            COMMENT \'Primary key\'',
            'oxps_paypal_order'
        );

        DatabaseProvider::getDb()->execute($sql);
    }

    /**
     * Assigns PayPal to all available shipping methods
     */
    protected static function configureShippingMethods()
    {
        $db = DatabaseProvider::getDb();
        $allShippingIds = $db->getCol("SELECT oxid FROM oxdeliveryset");
        $assignedShippingIds = $db->getCol(
            "SELECT oxobjectid FROM oxobject2payment WHERE oxpaymentid='oxidpaypal' AND oxtype='oxdelset'"
        );
        foreach (array_diff($allShippingIds, $assignedShippingIds) as $shippingId) {
            /** @var BaseModel $o2d */
            $o2d = oxNew(BaseModel::class);
            $o2d->init('oxobject2payment');
            $o2d->assign([
                'oxpaymentid' => 'oxidpaypal',
                'oxtype' => 'oxdelset',
                'oxobjectid' => $shippingId
            ]);
            $o2d->save();
        }
    }
}
