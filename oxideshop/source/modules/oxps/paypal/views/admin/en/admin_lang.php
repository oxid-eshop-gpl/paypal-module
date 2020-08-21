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
$sLangName = 'English';

$aLang = [
    'charset'                        => 'UTF-8',
    'paypal'                         => 'PayPal',
    'tbclorder_paypal'               => 'PayPal',
    // Paypal Config
    'OXPS_PAYPAL_CONFIG'             => 'Configuration',
    'OXPS_PAYPAL_GENERAL'            => 'General',
    'OXPS_PAYPAL_OPMODE'             => 'Operation Mode',
    'OXPS_PAYPAL_OPMODE_LIVE'        => 'Live',
    'OXPS_PAYPAL_OPMODE_SANDBOX'     => 'Sandbox',
    'OXPS_PAYPAL_CLIENT_ID'          => 'Client ID',
    'OXPS_PAYPAL_CLIENT_SECRET'      => 'Secret',
    'OXPS_PAYPAL_CREDENTIALS'        => 'API credentials',
    'OXPS_PAYPAL_WEBHOOK_TITLE'      => 'Webhook settings',
    'OXPS_PAYPAL_WEBHOOK_URL'        => 'Webhook listener URL',
    'HELP_OXPS_PAYPAL_WEBHOOK_URL'   => 'Use this URL to setup webhook listener on PayPal portal.',
    'OXPS_PAYPAL_LIVE_CREDENTIALS'   => 'Live API credentials',
    'OXPS_PAYPAL_SANDBOX_CREDENTIALS'        => 'Sandbox API credentials',
    'OXPS_PAYPAL_LIVE_BUTTON_CREDENTIALS'    => 'SignUp Merchant Integration (Live)',
    'OXPS_PAYPAL_SANDBOX_BUTTON_CREDENTIALS' => 'SignUp Merchant Integration (Sandbox)',
    'OXPS_PAYPAL_ERR_CONF_INVALID'   =>
        'One or more configuration values are either not set or incorrect. Please double check them.<br>
        <b>Module inactive.</b>',
    'OXPS_PAYPAL_CONF_VALID'         => 'Configuration values OK.<br><b>Module is active</b>',
    'OXPS_PAYPAL_BUTTON_PLACEMEMT_TITLE' => 'Button placement settings',
    'OXPS_PAYPAL_PRODUCT_DETAILS_BUTTON_PLACEMENT' => 'Product details page',
    'OXPS_PAYPAL_ADD_TO_BASKET_MODAL_PLACEMENT' => 'Add to basket modal',
    'OXPS_PAYPAL_MINI_BASKET_BUTTON_PLACEMENT' => 'Mini basket',
    'HELP_OXPS_PAYPAL_BUTTON_PLACEMEMT' => 'Toggle the display of PayPal buttons',
    'HELP_OXPS_PAYPAL_CREDENTIALS'   =>
        'If you already have the API credentials, you can enter them directly.<br>
        Alternatively, use one of the following links to generate the API credentials for live or sandbox mode.',
    'HELP_OXPS_PAYPAL_CLIENT_ID'     => 'Client ID for live mode.',
    'HELP_OXPS_PAYPAL_CLIENT_SECRET' => 'Secret for live mode.',
    'HELP_OXPS_PAYPAL_SANDBOX_CLIENT_ID'     => 'Client ID for sandbox mode.',
    'HELP_OXPS_PAYPAL_SANDBOX_CLIENT_SECRET' => 'Secret for sandbox mode.',
    'HELP_OXPS_PAYPAL_OPMODE'        => 'To configure and test PayPal, use Sandbox (test). When you\'re ready
        to receive real transactions, switch to Production (live).',
    // Paypal ORDER
    'OEPAYPAL_AMOUNT'                      => 'Amount',
    'OEPAYPAL_SHOP_PAYMENT_STATUS'         => 'Shop payment status',
    'OEPAYPAL_ORDER_PRICE'                 => 'Full order price',
    'OEPAYPAL_ORDER_PRODUCTS'              => 'Ordered products',
    'OEPAYPAL_CAPTURED'                    => 'Captured',
    'OEPAYPAL_REFUNDED'                    => 'Refunded',
    'OEPAYPAL_CAPTURED_NET'                => 'Resulting payment amount',
    'OEPAYPAL_CAPTURED_AMOUNT'             => 'Captured amount',
    'OEPAYPAL_REFUNDED_AMOUNT'             => 'Refunded amount',
    'OEPAYPAL_VOIDED_AMOUNT'               => 'Voided amount',
    'OEPAYPAL_MONEY_CAPTURE'               => 'Money capture',
    'OEPAYPAL_MONEY_REFUND'                => 'Money refund',
    'OEPAYPAL_CAPTURE'                     => 'Capture',
    'OEPAYPAL_REFUND'                      => 'Refund',
    'OEPAYPAL_DETAILS'                     => 'Details',
    'OEPAYPAL_AUTHORIZATION'               => 'Authorization',
    'OEPAYPAL_CANCEL_AUTHORIZATION'        => 'Void',
    'OEPAYPAL_PAYMENT_HISTORY'             => 'PayPal history',
    'OEPAYPAL_HISTORY_DATE'                => 'Date',
    'OEPAYPAL_HISTORY_ACTION'              => 'Action',
    'OEPAYPAL_HISTORY_PAYPAL_STATUS'       => 'PayPal status',
    'OEPAYPAL_HISTORY_PAYPAL_STATUS_HELP'  => 'Payment status returned from PayPal. For more details see: <a href="https://www.paypal.com/webapps/helpcenter/article/?articleID=94021&m=SRE" target="_blank" >PayPal status</a>',
    'OEPAYPAL_HISTORY_COMMENT'             => 'Comment',
    'OEPAYPAL_HISTORY_ACTIONS'             => 'Actions',
    'OEPAYPAL_HISTORY_NOTICE'              => 'Note',
    'OEPAYPAL_HISTORY_NOTICE_TEXT'         => 'In case of error, please see "Details" for more information',
    'OEPAYPAL_MONEY_ACTION_FULL'           => 'full',
    'OEPAYPAL_MONEY_ACTION_PARTIAL'        => 'partial',
    'OEPAYPAL_LIST_STATUS_ALL'             => 'All',
    'OEPAYPAL_STATUS_pending'              => 'Pending',
    'OEPAYPAL_STATUS_completed'            => 'Completed',
    'OEPAYPAL_STATUS_failed'               => 'Failed',
    'OEPAYPAL_STATUS_canceled'             => 'Canceled',
    'OEPAYPAL_PAYMENT_METHOD'              => 'Payment method',
    'OEPAYPAL_CLOSE'                       => 'Close',
    'OEPAYPAL_COMMENT'                     => 'Comment',
    'OEPAYPAL_RESPONSE_FROM_PAYPAL'        => 'Error message from PayPal: ',
    'OEPAYPAL_AUTHORIZATIONID'             => 'Authorization ID',
    'OEPAYPAL_TRANSACTIONID'               => 'Transaction ID',
    'OEPAYPAL_CORRELATIONID'               => 'Correlation ID',
];
