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
use OxidProfessionalServices\PayPal\Core\Constants;

class Events
{
    protected static $countryIso2List = null;

    /**
     * Execute action on activate event
     */
    public static function onActivate()
    {
        self::addPaymentMethod();
        self::configureShippingMethods();
    }

    /**
     * Add PayPal payment method set long descriptions
     */
    public static function addPaymentMethod(): void
    {
        $languages = Registry::getLang()->getLanguageIds();

        foreach (Constants::PAYPAL_PAYMENT_DEFINTIONS as $paymentId => $paymentDefinitions) {
            $country2Payment = [];
            $installAllowed = false;
            if (!count($paymentDefinitions['countries'])) {
               // all countries allowed
                $installAllowed = true;
            } else {
                // check allowed countries
                foreach ($paymentDefinitions['countries'] as $isoCode) {
                    if (isset(self::getCountryIso2List()[$isoCode])) {
                        $installAllowed = true;
                        $country2Payment[] = self::getCountryIso2List()[$isoCode];
                    }
                }
            }

            $payment = oxNew(Payment::class);
            if ($installAllowed && !$payment->load($paymentId)) {
                $payment->setId($paymentId);
                $payment->assign([
                    'oxactive' => 1
                ]);

                foreach ($paymentDefinitions['descriptions'] as $languageAbbreviation => $description) {
                    $languageId = array_search($languageAbbreviation, $languages);
                    if ($languageId !== false) {
                        $payment->setLanguage($languageId);
                        $payment->assign([
                            'oxdesc'     => $description['desc'],
                            'oxlongdesc' => $description['longdesc']
                        ]);
                        $payment->save();
                    }
                }

                if (count($country2Payment)) {
                    foreach ($country2Payment as $objectid) {
                        $object2Payment = oxNew(BaseModel::class);
                        $object2Payment->init('oxobject2payment');
                        $object2Payment->assign([
                            'oxpaymentid' => $paymentId,
                            'oxobjectid'  => $objectid,
                            'oxtype'      => 'oxcountry'
                        ]);
                        $object2Payment->save();
                    }
                }
            }
        }
    }

    /**
     * Disables payment method
     */
    public static function disablePaymentMethod(): void
    {
        foreach (Constants::PAYPAL_PAYMENT_DEFINTIONS as $paymentId => $paymentDefinitions) {
            $payment = oxNew(Payment::class);
            if ($payment->load($paymentId)) {
                $payment->oxpayments__oxactive = new Field(0);
                $payment->save();
            }
        }
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

    /**
     * Assigns PayPal to all available shipping methods
     */
    protected static function getCountryIso2List()
    {
        if (is_null(self::$countryIso2List)) {
            self::$countryIso2List = [];
            $countryList = oxNew(CountryList::class);
            if ($countryList->loadActiveCountries()) {
                foreach ($countryList as $oxId => $country) {
                    self::$countryIso2List[$country['oxisoalpha2']] = $oxId;
                }
            }
        }
        return self::$countryIso2List;
    }
}
