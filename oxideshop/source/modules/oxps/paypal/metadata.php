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

use OxidProfessionalServices\PayPal\Controller\Admin\PaypalConfigController;
use OxidProfessionalServices\PayPal\Controller\WebhookController;

$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id' => 'oxps/paypal',
    'title' => [
        'de' => 'OXPS :: PayPal - Online-Bezahldienst',
        'en' => 'OXPS :: PayPal - Online-Payment'
    ],
    'description' => [
        'de' => 'Nutzung des Online-Bezahldienstes von PayPal',
        'en' => 'Use of the online payment service from PayPal'
    ],
    'thumbnail' => 'out/img/paypal.png',
    'version' => '0.0.1',
    'author' => 'Oxid Professional Services',
    'url' => '',
    'email' => '',
    'extend' => [],
    'controllers' => [
        'PaypalConfigController' => PaypalConfigController::class,
        'PaypalWebhookController' => WebhookController::class
    ],
    'templates' => [
        'paypalconfig.tpl' => 'oxps/paypal/views/admin/tpl/paypalconfig.tpl',
    ],
    'events' => [
        'onActivate' => '',
        'onDeactivate' => ''
    ],
    'blocks' => [
        [
            'template' => 'headitem.tpl',
            'block' => 'admin_headitem_inccss',
            'file' => 'views/blocks/admin/admin_headitem_inccss.tpl'
        ],
        [
            'template' => 'headitem.tpl',
            'block' => 'admin_headitem_incjs',
            'file' => 'views/blocks/admin/admin_headitem_incjs.tpl'
        ]
    ],
    'settings' => [
        ['name' => 'blPaypalSandboxMode', 'type' => 'bool', 'value' => 'false', 'group' => null],
        ['name' => 'sPaypalClientId', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPaypalClientSecret', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPaypalSandboxClientId', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPaypalSandboxClientSecret', 'type' => 'str', 'value' => '', 'group' => null]
    ]
];
