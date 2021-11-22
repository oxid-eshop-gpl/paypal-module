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

class Events
{
    private static array $payments = [

        //Standard PayPal
        'oxidpaypal' => [
            'de_desc' => "PayPal v2",
            'en_desc' => "PayPal v2",
            'de_longdesc' => "Bezahlen Sie bequem mit PayPal",
            'en_longdesc' => "Pay conveniently with PayPal",
            'countries' => []
        ],
        'oxidpaypal_bancontact' => [
            'de_desc' => "Bancontact (über PayPal)",
            'en_desc' => "Bancontact (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit Bancontact",
            'en_longdesc' => "Pay conveniently with Bancontact.",
            'countries' => ['BE']
        ],
        'oxidpaypal_boleto' => [
            'de_desc' => "Boleto Bancário (über PayPal)",
            'en_desc' => "Boleto Bancário (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit Boleto Bancário",
            'en_longdesc' => "Pay conveniently with Boleto Bancário.",
            'countries' => ['BR']
        ],
        'oxidpaypal_blik' => [
            'de_desc' => "BLIK (über PayPal)",
            'en_desc' => "BLIK (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit BLIK",
            'en_longdesc' => "Pay conveniently with BLIK.",
            'countries' => ['PL']
        ],
        'oxidpaypal_eps' => [
            'de_desc' => "EPS (über PayPal)",
            'en_desc' => "EPS (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit EPS",
            'en_longdesc' => "Pay conveniently with EPS.",
            'countries' => ['AT']
        ],
        'oxidpaypal_giropay' => [
            'de_desc' => "GiroPay (über PayPal)",
            'en_desc' => "GiroPay (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit GiroPay",
            'en_longdesc' => "Pay conveniently with GiroPay.",
            'countries' => ['DE']
        ],
        'oxidpaypal_ideal' => [
            'de_desc' => "iDEAL (über PayPal)",
            'en_desc' => "iDEAL (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit iDEAL",
            'en_longdesc' => "Pay conveniently with iDEAL.",
            'countries' => ['NL']
        ],
        'oxidpaypal_multibanco' => [
            'de_desc' => "Multibanco (über PayPal)",
            'en_desc' => "Multibanco (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit Multibanco",
            'en_longdesc' => "Pay conveniently with Multibanco.",
            'countries' => ['PT']
        ],
        'oxidpaypal_multibanco' => [
            'de_desc' => "Multibanco (über PayPal)",
            'en_desc' => "Multibanco (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit Multibanco",
            'en_longdesc' => "Pay conveniently with Multibanco.",
            'countries' => ['PT']
        ],
        'oxidpaypal_mybank' => [
            'de_desc' => "MyBank (über PayPal)",
            'en_desc' => "MyBank (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit MyBank",
            'en_longdesc' => "Pay conveniently with MyBank.",
            'countries' => ['IT']
        ],
        'oxidpaypal_oxxo' => [
            'de_desc' => "OXXO (über PayPal)",
            'en_desc' => "OXXO (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit OXXO",
            'en_longdesc' => "Pay conveniently with OXXO.",
            'countries' => ['MX']
        ],
        'oxidpaypal_przelewy24' => [
            'de_desc' => "Przelewy24 (über PayPal)",
            'en_desc' => "Przelewy24 (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit Przelewy24",
            'en_longdesc' => "Pay conveniently with Przelewy24.",
            'countries' => ['PL']
        ],
        'oxidpaypal_przelewy24' => [
            'de_desc' => "Sofort (über PayPal)",
            'en_desc' => "Sofort (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit Sofort",
            'en_longdesc' => "Pay conveniently with Sofort.",
            'countries' => ['DE', 'AT', 'BE', 'IT', 'NL', 'UK', 'ES']
        ],
        'oxidpaypal_trustly' => [
            'de_desc' => "Trustly (über PayPal)",
            'en_desc' => "Trustly (via PayPal)",
            'de_longdesc' => "Bezahlen Sie bequem mit Trustly",
            'en_longdesc' => "Pay conveniently with Trustly.",
            'countries' => ['SE', 'FI', 'NL', 'EE']
        ],


    /**
     * Execute action on activate event
     */
    public static function onActivate()
    {
        self::addPaymentMethod();
        self::enablePaymentMethod();
        self::configureShippingMethods();
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
