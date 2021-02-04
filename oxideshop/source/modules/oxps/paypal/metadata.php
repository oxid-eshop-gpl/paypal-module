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

use OxidEsales\Eshop\Application\Controller\Admin\ArticleList;
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Application\Model\Basket;
use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\Eshop\Core\ViewConfig;
use OxidEsales\Eshop\Application\Model\PaymentGateway;
use OxidProfessionalServices\PayPal\Controller\Admin\OnboardingController;
use OxidProfessionalServices\PayPal\Controller\Admin\PaypalConfigController;
use OxidProfessionalServices\PayPal\Controller\Admin\PaypalOrderController;
use OxidProfessionalServices\PayPal\Controller\Admin\PaypalOrderDetailsControllerPayPal;
use OxidProfessionalServices\PayPal\Controller\Admin\PaypalSubscribeController;
use OxidProfessionalServices\PayPal\Controller\Admin\TransactionController;
use OxidProfessionalServices\PayPal\Controller\Admin\ArticleListController;
use OxidProfessionalServices\PayPal\Controller\ProxyController;
use OxidProfessionalServices\PayPal\Controller\WebhookController;
use OxidProfessionalServices\PayPal\Controller\Admin\BalanceController;
use OxidProfessionalServices\PayPal\Core\ViewConfig as PaypalViewConfig;
use OxidProfessionalServices\PayPal\Model\Basket as PaypalBasket;
use OxidProfessionalServices\PayPal\Model\Order as PaypalOrder;
use OxidProfessionalServices\PayPal\Model\PaymentGateway as PaypalPaymentGateway;
use OxidProfessionalServices\PayPal\Model\PayPalArticle;

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
    'extend' => [
        // Core
        ViewConfig::class => PaypalViewConfig::class,
        // Model
        Order::class => PaypalOrder::class,
        Basket::class => PaypalBasket::class,
        Article::class => PayPalArticle::class,
        PaymentGateway::class => PaypalPaymentGateway::class,
        // Controller
        ArticleList::class => ArticleListController::class,
    ],
    'controllers' => [
        'PaypalConfigController' => PaypalConfigController::class,
        'PayPalBalanceController' => BalanceController::class,
        'PayPalWebhookController' => WebhookController::class,
        'PayPalProxyController' => ProxyController::class,
        'PayPalTransactionController' => TransactionController::class,
        'PaypalSubscribeController' => PaypalSubscribeController::class,
        'OnboardingController' => OnboardingController::class,
        'PaypalOrderController' => PaypalOrderController::class
    ],
    'templates' => [
        'paypalconfig.tpl' => 'oxps/paypal/views/admin/tpl/paypalconfig.tpl',
        'paypalorder.tpl' => 'oxps/paypal/views/admin/tpl/paypalorder.tpl',
        'paypal_list_pagination.tpl' => 'oxps/paypal/views/admin/tpl/inc/list_pagination.tpl',
        'paypal_transactions.tpl' => 'oxps/paypal/views/admin/tpl/paypal_transactions.tpl',
        'paypal_balances.tpl' => 'oxps/paypal/views/admin/tpl/paypal_balances.tpl',
        'subscribe.tpl'    => 'oxps/paypal/views/admin/tpl/subscribe.tpl',
        'paypal_smart_payment_buttons.tpl' => 'oxps/paypal/views/includes/paypal_smart_payment_buttons.tpl',
        'flow/paypal_payment_option.tpl' => 'oxps/paypal/views/theme/flow/paypal_payment_option.tpl',
        'wave/paypal_payment_option.tpl' => 'oxps/paypal/views/theme/wave/paypal_payment_option.tpl'
    ],
    'events' => [
        'onActivate' => '\OxidProfessionalServices\PayPal\Core\Events::onActivate',
        'onDeactivate' => '\OxidProfessionalServices\PayPal\Core\Events::onDeactivate'
    ],
    'blocks' => [
        [
            'template' => 'article_list.tpl',
            'block' => 'admin_article_list_item',
            'file' => 'views/admin/tpl/article_list_extended.tpl'
        ],
        [
            'template' => 'article_list.tpl',
            'block' => 'admin_article_list_colgroup',
            'file' => 'views/admin/tpl/article_list_colgroup_extended.tpl'
        ],
        [
            'template' => 'article_list.tpl',
            'block' => 'admin_article_list_sorting',
            'file' => 'views/admin/tpl/article_list_sorting_extended.tpl'
        ],
        [
            'template' => 'headitem.tpl',
            'block' => 'admin_headitem_inccss',
            'file' => 'views/blocks/admin/admin_headitem_inccss.tpl'
        ],
        [
            'theme' => 'flow',
            'template' => 'layout/base.tpl',
            'block' => 'base_js',
            'file' => 'views/blocks/shared/layout/base_js.tpl'
        ],
        [
            'theme' => 'wave',
            'template' => 'layout/base.tpl',
            'block' => 'base_js',
            'file' => 'views/blocks/shared/layout/base_js.tpl'
        ],
        [
            'theme' => 'flow',
            'template' => 'layout/base.tpl',
            'block' => 'base_style',
            'file' => 'views/blocks/shared/layout/base_style.tpl'
        ],
        [
            'theme' => 'wave',
            'template' => 'layout/base.tpl',
            'block' => 'base_style',
            'file' => 'views/blocks/shared/layout/base_style.tpl'
        ],
        [
            'theme' => 'flow',
            'template' => 'page/checkout/basket.tpl',
            'block' => 'basket_btn_next_bottom',
            'file' => '/views/blocks/shared/page/checkout/basket_btn_next_bottom.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'wave',
            'template' => 'page/checkout/basket.tpl',
            'block' => 'basket_btn_next_bottom',
            'file' => '/views/blocks/shared/page/checkout/basket_btn_next_bottom.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'flow',
            'template' => 'page/checkout/payment.tpl',
            'block' => 'select_payment',
            'file' => '/views/blocks/shared/page/checkout/select_payment.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'wave',
            'template' => 'page/checkout/payment.tpl',
            'block' => 'select_payment',
            'file' => '/views/blocks/shared/page/checkout/select_payment.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'flow',
            'template' => 'page/checkout/payment.tpl',
            'block' => 'change_payment',
            'file' => '/views/blocks/flow/page/checkout/change_payment.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'wave',
            'template' => 'page/checkout/payment.tpl',
            'block' => 'change_payment',
            'file' => '/views/blocks/wave/page/checkout/change_payment.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'flow',
            'template' => 'page/details/inc/productmain.tpl',
            'block' => 'details_productmain_tobasket',
            'file' => '/views/blocks/shared/page/details/inc/details_productmain_tobasket.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'wave',
            'template' => 'page/details/inc/productmain.tpl',
            'block' => 'details_productmain_tobasket',
            'file' => '/views/blocks/shared/page/details/inc/details_productmain_tobasket.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'flow',
            'template' => 'widget/minibasket/minibasket.tpl',
            'block' => 'dd_layout_page_header_icon_menu_minibasket_functions',
            'file' =>
                '/views/blocks/flow/widget/minibasket/dd_layout_page_header_icon_menu_minibasket_functions.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'wave',
            'template' => 'widget/minibasket/minibasket.tpl',
            'block' => 'dd_layout_page_header_icon_menu_minibasket_functions',
            'file' =>
                '/views/blocks/wave/widget/minibasket/dd_layout_page_header_icon_menu_minibasket_functions.tpl',
            'position' => '5'
        ],
        [
            'template' => 'headitem.tpl',
            'block' => 'admin_headitem_incjs',
            'file' => 'views/blocks/admin/admin_headitem_incjs.tpl'
        ]
    ],
    'settings' => [
        ['name' => 'blPayPalSandboxMode', 'type' => 'bool', 'value' => 'false', 'group' => null],
        ['name' => 'sPayPalClientId', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPayPalClientSecret', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPayPalSandboxClientId', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPayPalWebhookId', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPayPalSandboxClientSecret', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'blPayPalShowProductDetailsButton', 'type' => 'bool', 'value' => true, 'group' => null],
        ['name' => 'blPayPalShowMiniBasketButton', 'type' => 'bool', 'value' => true, 'group' => null],
        ['name' => 'blPayPalShowAddToBasketModalButton', 'type' => 'bool', 'value' => true, 'group' => null],
    ]
];
