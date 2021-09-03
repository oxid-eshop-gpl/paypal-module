<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

use OxidEsales\Eshop\Application\Component\UserComponent;
use OxidEsales\Eshop\Application\Component\Widget\ArticleDetails;
use OxidEsales\Eshop\Application\Controller\Admin\ArticleList;
use OxidEsales\Eshop\Application\Controller\ArticleDetailsController;
use OxidEsales\Eshop\Application\Controller\BasketController;
use OxidEsales\Eshop\Application\Controller\OrderController;
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Application\Model\Basket;
use OxidEsales\Eshop\Application\Model\BasketItem;
use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\Eshop\Application\Model\User;
use OxidEsales\Eshop\Application\Model\PaymentGateway;
use OxidEsales\Eshop\Core\ViewConfig;
use OxidProfessionalServices\PayPal\Component\UserComponent as PayPalUserComponent;
use OxidProfessionalServices\PayPal\Component\Widget\ArticleDetails as ArticleDetailsComponent;
use OxidProfessionalServices\PayPal\Controller\Admin\ArticleListController;
use OxidProfessionalServices\PayPal\Controller\Admin\BalanceController;
use OxidProfessionalServices\PayPal\Controller\Admin\DisputeController;
use OxidProfessionalServices\PayPal\Controller\Admin\DisputeDetailsController;
use OxidProfessionalServices\PayPal\Controller\Admin\OnboardingController;
use OxidProfessionalServices\PayPal\Controller\Admin\PayPalConfigController;
use OxidProfessionalServices\PayPal\Controller\Admin\PayPalOrderController;
use OxidProfessionalServices\PayPal\Controller\Admin\PayPalSubscribeController;
use OxidProfessionalServices\PayPal\Controller\Admin\SubscriptionController;
use OxidProfessionalServices\PayPal\Controller\Admin\SubscriptionDetailsController;
use OxidProfessionalServices\PayPal\Controller\Admin\SubscriptionTransactionController;
use OxidProfessionalServices\PayPal\Controller\Admin\TransactionController;
use OxidProfessionalServices\PayPal\Controller\ArticleDetailsController as PayPalArticleDetailsController;
use OxidProfessionalServices\PayPal\Controller\BasketController as PayPalBasketController;
use OxidProfessionalServices\PayPal\Controller\OrderController as PayPalFrontEndOrderController;
use OxidProfessionalServices\PayPal\Controller\ProxyController;
use OxidProfessionalServices\PayPal\Controller\WebhookController;
use OxidProfessionalServices\PayPal\Core\ViewConfig as PayPalViewConfig;
use OxidProfessionalServices\PayPal\Model\Basket as PayPalBasket;
use OxidProfessionalServices\PayPal\Model\BasketItem as PayPalBasketItem;
use OxidProfessionalServices\PayPal\Model\Order as PayPalOrder;
use OxidProfessionalServices\PayPal\Model\User as PayPalUser;
use OxidProfessionalServices\PayPal\Model\PaymentGateway as PayPalPaymentGateway;
use OxidProfessionalServices\PayPal\Model\PayPalArticle;

$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id' => 'oxscpaypal',
    'title' => [
        'de' => 'OXPS :: PayPal - Online-Bezahldienst',
        'en' => 'OXPS :: PayPal - Online-Payment'
    ],
    'description' => [
        'de' => 'Nutzung des Online-Bezahldienstes von PayPal',
        'en' => 'Use of the online payment service from PayPal'
    ],
    'thumbnail' => 'out/img/paypal.png',
    'version' => '0.0.2',
    'author' => 'Oxid Professional Services',
    'url' => '',
    'email' => '',
    'extend' => [
        ViewConfig::class => PayPalViewConfig::class,
        Order::class => PayPalOrder::class,
        User::class => PayPalUser::class,
        Basket::class => PayPalBasket::class,
        BasketItem::class => PayPalBasketItem::class,
        Article::class => PayPalArticle::class,
        PaymentGateway::class => PayPalPaymentGateway::class,
        ArticleList::class => ArticleListController::class,
        ArticleDetailsController::class => PayPalArticleDetailsController::class,
        BasketController::class => PayPalBasketController::class,
        ArticleDetails::class => ArticleDetailsComponent::class,
        OrderController::class => PayPalFrontEndOrderController::class,
        UserComponent::class => PayPalUserComponent::class
    ],
    'controllers' => [
        'PayPalConfigController' => PayPalConfigController::class,
        'PayPalBalanceController' => BalanceController::class,
        'PayPalWebhookController' => WebhookController::class,
        'PayPalProxyController' => ProxyController::class,
        'PayPalTransactionController' => TransactionController::class,
        'PayPalSubscriptionTransactionController' => SubscriptionTransactionController::class,
        'PayPalSubscribeController' => PayPalSubscribeController::class,
        'OnboardingController' => OnboardingController::class,
        'PayPalOrderController' => PayPalOrderController::class,
        'PayPalSubscriptionDetailsController' => SubscriptionDetailsController::class,
        'PayPalSubscriptionController' => SubscriptionController::class,
        'PayPalAdminArticleListController' => ArticleListController::class,
        'PayPalDisputeController' => DisputeController::class,
        'PayPalDisputeDetailsController' => DisputeDetailsController::class
    ],
    'templates' => [
        'pspaypalconfig.tpl' => 'oxps/paypal/views/admin/tpl/pspaypalconfig.tpl',
        'pspaypaldisputedetails.tpl' => 'oxps/paypal/views/admin/tpl/pspaypaldisputedetails.tpl',
        'pspaypaldisputes.tpl' => 'oxps/paypal/views/admin/tpl/pspaypaldisputes.tpl',
        'pspaypalorder.tpl' => 'oxps/paypal/views/admin/tpl/pspaypalorder.tpl',
        'pspaypalbillingplan.tpl' => 'oxps/paypal/views/admin/tpl/inc/pspaypalbillingplan.tpl',
        'pspaypalsubscriptionform.tpl' => 'oxps/paypal/views/admin/tpl/inc/pspaypalsubscriptionform.tpl',
        'pspaypalbillingplandata.tpl' => 'oxps/paypal/views/admin/tpl/inc/pspaypalbillingplandata.tpl',
        'pspaypallistpagination.tpl' => 'oxps/paypal/views/admin/tpl/inc/pspaypallistpagination.tpl',
        'pspaypalsubscriptions.tpl' => 'oxps/paypal/views/admin/tpl/pspaypalsubscriptions.tpl',
        'pspaypaltransactions.tpl' => 'oxps/paypal/views/admin/tpl/pspaypaltransactions.tpl',
        'pspaypalbalances.tpl' => 'oxps/paypal/views/admin/tpl/pspaypalbalances.tpl',
        'pspaypalsubscriptiontransactions.tpl' => 'oxps/paypal/views/admin/tpl/pspaypalsubscriptiontransactions.tpl',
        'pspaypalsubscriptiondetails.tpl' => 'oxps/paypal/views/admin/tpl/pspaypalsubscriptiondetails.tpl',
        'pspaypalsubscribe.tpl'    => 'oxps/paypal/views/admin/tpl/pspaypalsubscribe.tpl',
        'pspaypalsmartpaymentbuttons.tpl' => 'oxps/paypal/views/includes/pspaypalsmartpaymentbuttons.tpl',
        'pspaypalpaymentbuttons.tpl' => 'oxps/paypal/views/includes/pspaypalpaymentbuttons.tpl',
        'pspaypalsubscriptionbuttons.tpl' => 'oxps/paypal/views/includes/pspaypalsubscriptionbuttons.tpl',

        // PAYPAL-486 Register templates for overloading here;
        // use theme name in key when theme-specific. Shared templates don't receive a theme-specific key.
        'tpl/layout/base_js.tpl' => 'oxps/paypal/views/tpl/shared/layout/base_js.tpl',
        'tpl/layout/base_style.tpl' => 'oxps/paypal/views/tpl/shared/layout/base_style.tpl',
        'tpl/page/checkout/basket_btn_next_bottom.tpl' => 'oxps/paypal/views/tpl/shared/page/checkout/basket_btn_next_bottom.tpl',
        'tpl/page/checkout/select_payment.tpl' => 'oxps/paypal/views/tpl/shared/page/checkout/select_payment.tpl',
        'tpl/page/details/inc/details_productmain_tobasket.tpl' => 'oxps/paypal/views/tpl/shared/page/details/inc/details_productmain_tobasket.tpl',
        'tpl/page/checkout/inc/checkout_steps_main.tpl' => 'oxps/paypal/views/tpl/shared/page/checkout/inc/checkout_steps_main.tpl',
        // #486 Theme-specific
        'tpl/flow/page/checkout/change_payment.tpl' => 'oxps/paypal/views/tpl/flow/page/checkout/change_payment.tpl',
        'tpl/wave/page/checkout/change_payment.tpl' => 'oxps/paypal/views/tpl/wave/page/checkout/change_payment.tpl',

        // PSPAYPAL-491 Installment banners
        'tpl/installment_banners.tpl' => 'oxps/paypal/views/tpl/shared/installment_banners.tpl'
    ],
    'events' => [
        'onActivate' => '\OxidProfessionalServices\PayPal\Core\Events::onActivate',
        'onDeactivate' => '\OxidProfessionalServices\PayPal\Core\Events::onDeactivate'
    ],
    'blocks' => [
        [
            'template' => 'article_list.tpl',
            'block' => 'admin_article_list_item',
            'file' => 'views/blocks/admin/article_list_extended.tpl'
        ],
        [
            'template' => 'article_list.tpl',
            'block' => 'admin_article_list_colgroup',
            'file' => 'views/blocks/admin/article_list_colgroup_extended.tpl'
        ],
        [
            'template' => 'article_list.tpl',
            'block' => 'admin_article_list_sorting',
            'file' => 'views/blocks/admin/article_list_sorting_extended.tpl'
        ],
        [
            'template' => 'headitem.tpl',
            'block' => 'admin_headitem_inccss',
            'file' => 'views/blocks/admin/admin_headitem_inccss.tpl'
        ],
        [
            'template' => 'headitem.tpl',
            'block' => 'admin_headitem_incjs',
            'file' => 'views/blocks/admin/admin_headitem_incjs.tpl'
        ],
        [
            'template' => 'layout/base.tpl',
            'block' => 'base_js',
            'file' => 'views/blocks/shared/layout/base_js.tpl'
        ],
        [
            'template' => 'layout/base.tpl',
            'block' => 'base_style',
            'file' => 'views/blocks/shared/layout/base_style.tpl'
        ],
        [
            'template' => 'widget/product/listitem_line.tpl',
            'block' => 'widget_product_listitem_line_price',
            'file' => 'views/blocks/shared/widget/product/widget_product_listitem_line_price.tpl'
        ],
        [
            'template' => 'widget/product/listitem_infogrid.tpl',
            'block' => 'widget_product_listitem_infogrid_price',
            'file' => 'views/blocks/shared/widget/product/widget_product_listitem_infogrid_price.tpl'
        ],
        [
            'template' => 'widget/product/listitem_grid.tpl',
            'block' => 'widget_product_listitem_grid_price',
            'file' => 'views/blocks/shared/widget/product/widget_product_listitem_grid_price.tpl'
        ],
        [
            'template' => 'page/checkout/basket.tpl',
            'block' => 'basket_btn_next_bottom',
            'file' => '/views/blocks/shared/page/checkout/basket_btn_next_bottom.tpl',
            'position' => '5'
        ],
        // @Todo PAYPAL-486: Using the same file, with 2 themes. Should be more generic, if possible.
        [
            'theme' => 'flow',
            'template' => 'page/checkout/inc/steps.tpl',
            'block' => 'checkout_steps_main',
            'file' => '/views/blocks/shared/page/checkout/inc/checkout_steps_main.tpl',
            'position' => '5'
        ],
        [
            'theme' => 'wave',
            'template' => 'page/checkout/inc/steps.tpl',
            'block' => 'checkout_steps_main',
            'file' => '/views/blocks/shared/page/checkout/inc/checkout_steps_main.tpl',
            'position' => '5'
        ],
        [
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
            'template' => 'page/details/inc/productmain.tpl',
            'block' => 'details_productmain_tobasket',
            'file' => '/views/blocks/shared/page/details/inc/details_productmain_tobasket.tpl',
            'position' => '5'
        ],
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block' => 'details_productmain_price_value',
            'file' => '/views/blocks/shared/page/details/inc/details_productmain_price_value.tpl',
            'position' => '5'
        ],

        // PSPAYPAL-491 Installment banners -->
        [
            'template' => 'page/checkout/basket.tpl',
            'block' => 'checkout_basket_next_step_top',
            'file' => '/views/blocks/shared/page/checkout/basket_installment_banner_after.tpl'
        ],
        [
            'template' => 'page/checkout/basket.tpl',
            'block' => 'checkout_basket_emptyshippingcart',
            'file' => '/views/blocks/shared/page/checkout/basket_installment_banner_before.tpl'
        ],
        [
            'template' => 'page/checkout/payment.tpl',
            'block' => 'checkout_payment_main',
            'file' => '/views/blocks/shared/page/checkout/basket_installment_banner_before.tpl'
        ],
        [
            'theme' => 'flow',
            'template' => 'page/details/inc/productmain.tpl',
            'block' => 'details_productmain_price_value',
            'file' => '/views/blocks/flow/page/details/inc/productmain.tpl'
        ],
        [
            'theme' => 'wave',
            'template' => 'page/details/inc/productmain.tpl',
            'block' => 'details_productmain_price_value',
            'file' => '/views/blocks/wave/page/details/inc/productmain.tpl'
        ],
        [
            'template' => 'page/list/list.tpl',
            'block' => 'page_list_listhead',
            'file' => '/views/blocks/shared/page/list/list.tpl'
        ],
        [
            'template' => 'page/search/search.tpl',
            'block' => 'search_header',
            'file' => '/views/blocks/shared/page/search/search.tpl'
        ],
        [
            'template' => 'page/shop/start.tpl',
            'block' => 'start_welcome_text',
            'file' => '/views/blocks/shared/page/shop/start.tpl',
        ],
        // <-- PSPAYPAL-491

    ],
    'settings' => [
        ['name' => 'blPayPalSandboxMode', 'type' => 'bool', 'value' => 'false', 'group' => null],
        ['name' => 'sPayPalClientId', 'type' => 'str', 'value' => '', 'group' => null], // Main functionality client ID
        ['name' => 'sPayPalClientSecret', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPayPalSandboxClientId', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPayPalWebhookId', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPayPalSandboxWebhookId', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'sPayPalSandboxClientSecret', 'type' => 'str', 'value' => '', 'group' => null],
        ['name' => 'blPayPalShowProductDetailsButton', 'type' => 'bool', 'value' => true, 'group' => null],
        ['name' => 'blPayPalShowBasketButton', 'type' => 'bool', 'value' => true, 'group' => null],
        ['name' => 'blPayPalAutoBillOutstanding', 'type' => 'bool', 'value' => true, 'group' => null],
        ['name' => 'sPayPalSetupFeeFailureAction', 'type' => 'select',
            'value' => 'CONTINUE', 'constraints' => 'CONTINUE|CANCEL', 'group' => null],
        ['name' => 'sPayPalPaymentFailureThreshold', 'type' => 'str', 'value' => '', 'group' => null],

        // PSPAYPAL-491 -->
        ['name' => 'oePayPalBannersShowAll', 'type' => 'bool', 'value' => 'true'],
        // @Todo Remove group so the settings won't appear in the settings tab.
        // Will be used in the new settings page in the future.
        ['name' => 'oePayPalClientId', 'type' => 'str', 'value' => ''], // Banner feature client ID
        ['name' => 'oePayPalBannersStartPage', 'type' => 'bool', 'value' => 'true'],
        ['name' => 'oePayPalBannersStartPageSelector', 'type' => 'str', 'value' => '#wrapper .row'],
        ['name' => 'oePayPalBannersCategoryPage', 'type' => 'bool', 'value' => 'true'],
        ['name' => 'oePayPalBannersCategoryPageSelector', 'type' => 'str', 'value' => '.page-header'],
        ['name' => 'oePayPalBannersSearchResultsPage', 'type' => 'bool', 'value' => 'true'],
        ['name' => 'oePayPalBannersSearchResultsPageSelector', 'type' => 'str', 'value' => '#content .page-header .clearfix'],
        ['name' => 'oePayPalBannersProductDetailsPage', 'type' => 'bool', 'value' => 'true'],
        ['name' => 'oePayPalBannersProductDetailsPageSelector', 'type' => 'str', 'value' => '#detailsItemsPager'],
        ['name' => 'oePayPalBannersCheckoutPage', 'type' => 'bool', 'value' => 'true'],
        ['name' => 'oePayPalBannersCartPageSelector', 'type' => 'str', 'value' => '.cart-buttons'],
        ['name' => 'oePayPalBannersPaymentPageSelector', 'type' => 'str', 'value' => '.checkoutSteps ~ .spacer'],
        ['name' => 'oePayPalBannersColorScheme', 'type' => 'select', 'constraints' => 'blue|black|white|white-no-border', 'value' => 'blue'],
        // <-- PSPAYPAL-491
    ]
];
