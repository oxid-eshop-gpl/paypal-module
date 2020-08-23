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
$sLangName = 'Deutsch';

$aLang = [
    'charset'                        => 'UTF-8',
    'paypal'                         => 'PayPal',
    'tbclorder_paypal'               => 'PayPal',
    // Paypal Config
    'OXPS_PAYPAL_CONFIG'             => 'Konfiguration',
    'OXPS_PAYPAL_GENERAL'            => 'Allgemein',
    'OXPS_PAYPAL_OPMODE'             => 'Betriebsmodus',
    'OXPS_PAYPAL_OPMODE_LIVE'        => 'Live',
    'OXPS_PAYPAL_OPMODE_SANDBOX'     => 'Sandbox',
    'OXPS_PAYPAL_CLIENT_ID'          => 'Client ID',
    'OXPS_PAYPAL_CLIENT_SECRET'      => 'Secret',
    'OXPS_PAYPAL_CREDENTIALS'        => 'API Anmeldeinformationen',
    'OXPS_PAYPAL_WEBHOOK_TITLE'      => 'Webhooks',
    'OXPS_PAYPAL_WEBHOOK_URL'        => 'Oxid Webhook URL',
    'HELP_OXPS_PAYPAL_WEBHOOK_URL'   => 'Tragen Sie diese URL für den Webhook im Paypal Portal ein.',
    'OXPS_PAYPAL_LIVE_CREDENTIALS'   => 'Live API Anmeldeinformationen',
    'OXPS_PAYPAL_SANDBOX_CREDENTIALS'        => 'Sandbox API Anmeldeinformationen',
    'OXPS_PAYPAL_LIVE_BUTTON_CREDENTIALS'    => 'Anmeldung Händler Paypal-Integration (Live)',
    'OXPS_PAYPAL_SANDBOX_BUTTON_CREDENTIALS' => 'Anmeldung Händler Paypal-Integration (Sandbox)',
    'OXPS_PAYPAL_ERR_CONF_INVALID'   =>
        'Ein oder mehrere Konfigurationswerte sind entweder nicht festgelegt oder falsch. Bitte überprüfen Sie sie noch einmal.<br>
        <b>Modul inaktiv.</b>',
    'OXPS_PAYPAL_CONF_VALID'         => 'Konfigurationswerte OK.<br><b>Modul ist aktiv</b>',
    'OXPS_PAYPAL_BUTTON_PLACEMEMT_TITLE' => 'Einstellungen für die Tastenplatzierung',
    'OXPS_PAYPAL_PRODUCT_DETAILS_BUTTON_PLACEMENT' => 'Produktdetailseite',
    'OXPS_PAYPAL_ADD_TO_BASKET_MODAL_PLACEMENT' => 'Modal in den Warenkorb legen',
    'OXPS_PAYPAL_MINI_BASKET_BUTTON_PLACEMENT' => 'Minikorb',
    'HELP_OXPS_PAYPAL_BUTTON_PLACEMEMT' => 'Schalten Sie die Anzeige der PayPal-Schaltflächen um',
    'HELP_OXPS_PAYPAL_CREDENTIALS'   =>
        'Wenn Sie die API Anmeldeinformationen bereits vorleigen haben, können Sie sie direkt eingeben.<br>
        Alternativ nutzen Sie einen der folgenden Links um die API Anmeldeinformationen für den Live oder den Sandbox-Modus zu erzeugen.',
    'HELP_OXPS_PAYPAL_CLIENT_ID'     => 'Client ID des Live-Account für live-Modus',
    'HELP_OXPS_PAYPAL_CLIENT_SECRET' => 'Secret des Live-Account für live-Modus',
    'HELP_OXPS_PAYPAL_SANDBOX_CLIENT_ID'     => 'Client ID des Sandbox-Account für Sandbox-Modus',
    'HELP_OXPS_PAYPAL_SANDBOX_CLIENT_SECRET' => 'Secret des Sandbox-Account für Sandbox-Modus',
    'HELP_OXPS_PAYPAL_OPMODE'        => 'Verwenden Sie Sandbox (Test), um PayPal zu konfigurieren und zu testen. Wenn Sie bereit sind,
        echte Transaktionen zu empfangen, wechseln Sie zu Produktion (live).',
    // Paypal ORDER
    'OEPAYPAL_AMOUNT'                      => 'Betrag',
    'OEPAYPAL_SHOP_PAYMENT_STATUS'         => 'Shop-Zahlungsstatus',
    'OEPAYPAL_ORDER_PRICE'                 => 'Bestellpreis gesamt',
    'OEPAYPAL_ORDER_PRODUCTS'              => 'Bestellte Artikel',
    'OEPAYPAL_CAPTURED'                    => 'Eingezogen',
    'OEPAYPAL_REFUNDED'                    => 'Erstattet',
    'OEPAYPAL_CAPTURED_NET'                => 'Resultierender Zahlungsbetrag',
    'OEPAYPAL_CAPTURED_AMOUNT'             => 'Eingezogener Betrag',
    'OEPAYPAL_REFUNDED_AMOUNT'             => 'Erstatteter Betrag',
    'OEPAYPAL_VOIDED_AMOUNT'               => 'Stornierter Betrag',
    'OEPAYPAL_MONEY_CAPTURE'               => 'Geldeinzug',
    'OEPAYPAL_MONEY_REFUND'                => 'Gelderstattung',
    'OEPAYPAL_CAPTURE'                     => 'Einziehen',
    'OEPAYPAL_REFUND'                      => 'Erstatten',
    'OEPAYPAL_DETAILS'                     => 'Details',
    'OEPAYPAL_AUTHORIZATION'               => 'Autorisierung',
    'OEPAYPAL_CANCEL_AUTHORIZATION'        => 'Stornieren',
    'OEPAYPAL_PAYMENT_HISTORY'             => 'PayPal-Historie',
    'OEPAYPAL_HISTORY_DATE'                => 'Datum',
    'OEPAYPAL_HISTORY_ACTION'              => 'Aktion',
    'OEPAYPAL_HISTORY_PAYPAL_STATUS'       => 'PayPal-Status',
    'OEPAYPAL_HISTORY_PAYPAL_STATUS_HELP'  => 'Von PayPal zurückgegebener Zahlungsstatus. Für mehr Details siehe (nur Englisch): <a href="https://www.paypal.com/webapps/helpcenter/article/?articleID=94021&m=SRE" target="_blank" >PayPal Zahlungsstatus</a>',
    'OEPAYPAL_HISTORY_COMMENT'             => 'Kommentar',
    'OEPAYPAL_HISTORY_ACTIONS'             => 'Aktionen',
    'OEPAYPAL_HISTORY_NOTICE'              => 'Hinweis',
    'OEPAYPAL_HISTORY_NOTICE_TEXT'         => 'Im Fehlerfall siehe "Details" für mehr Informationen',
    'OEPAYPAL_MONEY_ACTION_FULL'           => 'vollständig',
    'OEPAYPAL_MONEY_ACTION_PARTIAL'        => 'teilweise',
    'OEPAYPAL_LIST_STATUS_ALL'             => 'Alle',
    'OEPAYPAL_STATUS_pending'              => 'Ausstehend',
    'OEPAYPAL_STATUS_completed'            => 'Abgeschlossen',
    'OEPAYPAL_STATUS_failed'               => 'Fehlgeschlagen',
    'OEPAYPAL_STATUS_canceled'             => 'Abgebrochen',
    'OEPAYPAL_PAYMENT_METHOD'              => 'Zahlungsart',
    'OEPAYPAL_CLOSE'                       => 'Schließen',
    'OEPAYPAL_COMMENT'                     => 'Kommentar',
    'OEPAYPAL_RESPONSE_FROM_PAYPAL'        => 'Fehlermeldung von PayPal: ',
    'OEPAYPAL_AUTHORIZATIONID'             => 'Autorisierungs-ID',
    'OEPAYPAL_TRANSACTIONID'               => 'Transaktions-ID',
    'OEPAYPAL_CORRELATIONID'               => 'Korrelations-ID',

];
