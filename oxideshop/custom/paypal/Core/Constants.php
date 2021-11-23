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

class Constants
{
    public const PAYPAL_JS_SDK_URL = 'https://www.paypal.com/sdk/js';
    public const PAYPAL_INTEGRATION_DATE = '2020-07-29';
    public const PAYPAL_ORDER_INTENT_CAPTURE = 'CAPTURE';
    public const SESSION_CHECKOUT_ORDER_ID = 'paypal-checkout-session';

    public const PAYPAL_PAYMENT_DEFINTIONS = [
        //Standard PayPal
        'oxidpaypal' => [
            'descriptions' => [
                'de' => [
                    'desc' => "PayPal v2",
                    'longdesc' => "Bezahlen Sie bequem mit PayPal"
                ],
                'en' => [
                    'desc' => "PayPal v2",
                    'longdesc' => "Pay conveniently with PayPal"
                ]
            ],
            'countries' => []
        ],
        // uAPM Bancontact
        'oxidpaypal_bancontact' => [
            'descriptions' => [
                'de' => [
                    'desc' => "Bancontact (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit Bancontact"
                ],
                'en' => [
                    'desc' => "Bancontact (via PayPal)",
                    'longdesc' => "Pay conveniently with Bancontact"
                ]
            ],
            'countries' => ['BE']
        ],
        // uAPM Boleto Bancário
        'oxidpaypal_boleto' => [
            'descriptions' => [
                'de' => [
                    'desc' => "Boleto Bancário (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit Boleto Bancário"
                ],
                'en' => [
                    'desc' => "Boleto Bancário (via PayPal)",
                    'longdesc' => "Pay conveniently with Boleto Bancário"
                ]
            ],
            'countries' => ['BR']
        ],
        // uAPM BLIK
        'oxidpaypal_blik' => [
            'descriptions' => [
                'de' => [
                    'desc' => "BLIK (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit BLIK"
                ],
                'en' => [
                    'desc' => "BLIK (via PayPal)",
                    'longdesc' => "Pay conveniently with BLIK"
                ]
            ],
            'countries' => ['PL']
        ],
        // uAPM EPS
        'oxidpaypal_eps' => [
            'descriptions' => [
                'de' => [
                    'desc' => "EPS (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit EPS"
                ],
                'en' => [
                    'desc' => "EPS (via PayPal)",
                    'longdesc' => "Pay conveniently with EPS"
                ]
            ],
            'countries' => ['AT']
        ],
        // uAPM GiroPay
        'oxidpaypal_giropay' => [
            'descriptions' => [
                'de' => [
                    'desc' => "GiroPay (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit GiroPay"
                ],
                'en' => [
                    'desc' => "GiroPay (via PayPal)",
                    'longdesc' => "Pay conveniently with GiroPay"
                ]
            ],
            'countries' => ['DE']
        ],
        // uAPM iDEAL
        'oxidpaypal_ideal' => [
            'descriptions' => [
                'de' => [
                    'desc' => "iDEAL (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit iDEAL"
                ],
                'en' => [
                    'desc' => "iDEAL (via PayPal)",
                    'longdesc' => "Pay conveniently with iDEAL"
                ]
            ],
            'countries' => ['NL']
        ],
        // uAPM Multibanco
        'oxidpaypal_multibanco' => [
            'descriptions' => [
                'de' => [
                    'desc' => "Multibanco (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit Multibanco"
                ],
                'en' => [
                    'desc' => "Multibanco (via PayPal)",
                    'longdesc' => "Pay conveniently with Multibanco"
                ]
            ],
            'countries' => ['PT']
        ],
        // uAPM Multibanco
        'oxidpaypal_mybank' => [
            'descriptions' => [
                'de' => [
                    'desc' => "MyBank (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit MyBank"
                ],
                'en' => [
                    'desc' => "MyBank (via PayPal)",
                    'longdesc' => "Pay conveniently with MyBank"
                ]
            ],
            'countries' => ['IT']
        ],
        // uAPM OXXO
        'oxidpaypal_oxxo' => [
            'descriptions' => [
                'de' => [
                    'desc' => "OXXO (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit OXXO"
                ],
                'en' => [
                    'desc' => "OXXO (via PayPal)",
                    'longdesc' => "Pay conveniently with OXXO"
                ]
            ],
            'countries' => ['MX']
        ],
        // uAPM Przelewy24
        'oxidpaypal_przelewy24' => [
            'descriptions' => [
                'de' => [
                    'desc' => "Przelewy24 (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit Przelewy24"
                ],
                'en' => [
                    'desc' => "Przelewy24 (via PayPal)",
                    'longdesc' => "Pay conveniently with Przelewy24"
                ]
            ],
            'countries' => ['PL']
        ],
        // uAPM Sofort
        'oxidpaypal_sofort' => [
            'descriptions' => [
                'de' => [
                    'desc' => "Sofort (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit Sofort"
                ],
                'en' => [
                    'desc' => "Sofort (via PayPal)",
                    'longdesc' => "Pay conveniently with Sofort"
                ]
            ],
            'countries' => ['DE', 'AT', 'BE', 'IT', 'NL', 'UK', 'ES']
        ],
        // uAPM Trustly
        'oxidpaypal_trustly' => [
            'descriptions' => [
                'de' => [
                    'desc' => "Trustly (über PayPal)",
                    'longdesc' => "Bezahlen Sie bequem mit Trustly"
                ],
                'en' => [
                    'desc' => "Trustly (via PayPal)",
                    'longdesc' => "Pay conveniently with Trustly"
                ]
            ],
            'countries' => ['SE', 'FI', 'NL', 'EE']
        ]
    ];


}
