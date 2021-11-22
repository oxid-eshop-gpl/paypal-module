<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidProfessionalServices\PayPal\Core;

use OxidEsales\Eshop\Core\Registry;

/**
 * @mixin \OxidEsales\Eshop\Core\ViewConfig
 */
class ViewConfig extends ViewConfig_parent
{
    /**
     * @return bool
     */
    public function isPayPalActive(): bool
    {
        return $this->getPayPalConfig()->isActive();
    }

    /**
     * @return bool
     */
    public function isPayPalSessionActive(): bool
    {
        return PayPalSession::isPayPalOrderActive();
    }

    /**
     * @return Config
     */
    public function getPayPalConfig(): Config
    {
        return oxNew(Config::class);
    }

    /**
     * @return Bool
     */
    public function showOverlay(): bool
    {
        return PayPalSession::isSubscriptionProcessing();
    }


    /**
     * @return array
     */
    public function getPayPalCurrencyCodes(): array
    {
        return Currency::getCurrencyCodes();
    }

    /**
     * @return null or string
     */
    public function getcheckoutOrderId(): ?string
    {
        return PayPalSession::getcheckoutOrderId();
    }

    /**
     * get CancelPayPalPayment-Url
     *
     * @return string
     */
    public function getCancelPayPalPaymentUrl(): string
    {
        return $this->getSelfLink() . 'cl=PayPalProxyController&fnc=cancelPayPalPayment';
    }

    /**
     * See https://developer.paypal.com/docs/checkout/reference/customize-sdk/#enable-funding
     * and https://developer.paypal.com/docs/checkout/reference/customize-sdk/#disable-funding
     * @Todo: Not in use yet.
     * @var array Allowed payment option keys, string type.
     */
    public $listOfSelectableOptions = [
        // payment option keys
        'card','bancontact','blik','eps','giropay','ideal',
        'mercadopago','mybank','p24','sepa','sofort','venmo','paylater',
    ];

    /**
     * In the future, some options will be specified as UAPM options. Those will be moved into another array on request
     * preparation.
     *
     * Once, UAPMs are available, they will be removed from the button options
     * and thus from the "enable-funding" array (and added to disable-funding?).
     * @Todo specification needed.
     * https://developer.paypal.com/docs/limited-release/alternative-payment-methods-with-orders/
     * @var string[]
     */
    protected $listOfUapmOptions = [
        'giropay','sofort','p24'
    ];

    /**
     * @var array
     */
    protected $enabledPaymentOptions = [];

    /**
     * @return array List of payment option keys
     */
    public function getEnabledPaymentOptions($context)
    {
        if (count($this->enabledPaymentOptions[$context]) == 0) {
            $this->collectEnableAndDisabledPaymentOptions();
        }

        // Force-remove credit option if blPayPalNeverUseCredit is on
        $config = Registry::getConfig();
        if ($config->getConfigParam('blPayPalNeverUseCredit')) {
            if (in_array('paylater', $this->enabledPaymentOptions[$context])) {
                $this->enabledPaymentOptions[$context] = array_diff(
                    $this->enabledPaymentOptions[$context],
                    ['paylater']
                );
            }
        }

        return $this->enabledPaymentOptions[$context];
    }

    /**
     * @var array
     */
    protected $disabledPaymentOptions = [];

    /**
     * @return array List of payment option keys
     */
    public function getDisabledPaymentOptions($context)
    {
        if (count($this->disabledPaymentOptions[$context]) == 0) {
            $this->collectEnableAndDisabledPaymentOptions();
        }

        // Force-add credit option if blPayPalNeverUseCredit is on
        $config = Registry::getConfig();
        if ($config->getConfigParam('blPayPalNeverUseCredit')) {
            if (!in_array('paylater', $this->disabledPaymentOptions[$context])) {
                $this->disabledPaymentOptions[$context] = array_merge(
                    $this->disabledPaymentOptions[$context],
                    ['paylater']
                );
            }
        }

        return $this->disabledPaymentOptions[$context];
    }

    /**
     * Returns an array as string.
     * @param string Context, one of (Details, Basket, Checkout)
     * @param int Process enabled (1) or disabled (0) keys.
     * @return string
     */
    protected function getEnabledAndDisabledPaymentOptionsAsString($context, $status)
    {
        switch ($status) {
            case 0:
                $list = $this->getDisabledPaymentOptions($context);
                break;
            case 1:
                $list = $this->getEnabledPaymentOptions($context);
                break;
        }

        $out = '';
        foreach ($list as $item) {
            if ($out != '') {
                $out .= ',';
            }
            $out .= $item;
        }

        return $out;
    }

    /**
     * List of contexts in which the button configuration may be used in different combinations.
     * @var string[]
     */
    protected $allowedContexts = ['Details', 'Basket', 'Checkout'];

    /**
     * Internal function to fill the arrays containing enabled and disabled payment options. This function ensures that
     * an option which was not added to the list of enabled options will be added to the disabled functions instead.
     */
    protected function collectEnableAndDisabledPaymentOptions()
    {
        $config = Registry::getConfig();

        foreach ($this->allowedContexts as $context) {
            foreach ($config->getConfigParam('arrPayPalEnabledOptions_' . $context) as $optionKey => $optionValue) {
                if ($optionValue) {
                    $this->enabledPaymentOptions[$context][] = $optionKey;
                } else {
                    $this->disabledPaymentOptions[$context][] = $optionKey;
                }
            }
        }
    }

    /**
     * Gets PayPal JS SDK url
     *
     * @param bool $subscribe is it a PayPal Subscription
     *
     * @return string
     */
    public function getPayPalJsSdkUrl($subscribe = false): string
    {
        $payPalConfig = $this->getPayPalConfig();
        $config = Registry::getConfig();

        $params = [];

        $params['client-id'] = $payPalConfig->getClientId();

        if ($subscribe) {
            $params['vault'] = 'true';
            $params['intent'] = 'subscription';
            $params['locale'] = 'de_DE';
        } else {
            $params['integration-date'] = Constants::PAYPAL_INTEGRATION_DATE;
            $params['intent'] = strtolower(Constants::PAYPAL_ORDER_INTENT_CAPTURE);
            $params['commit'] = 'false';
        }

        // PSPAYPAL-492
        // https://developer.paypal.com/docs/checkout/reference/customize-sdk/#disable-funding ("gegenläufige Liste")
        $params['enable-funding'] = $this->getEnabledAndDisabledPaymentOptionsAsString('Details', 1);
        $params['disable-funding'] = $this->getEnabledAndDisabledPaymentOptionsAsString('Details', 0);

        if ($currency = $config->getActShopCurrencyObject()) {
            $params['currency'] = strtoupper($currency->name);
        }

        // Available components: enable messages+buttons for PDP
        if ($this->getActiveClassName('details')) {
            $params['components'] = 'messages,buttons';
        }

        return Constants::PAYPAL_JS_SDK_URL . '?' . http_build_query($params);
    }

    /**
     * PSPAYPAL-491 -->
     * Returns whether PayPal banners should be shown on the start page
     *
     * @return bool
     */
    public function enablePayPalBanners()
    {
        return (bool) Registry::getConfig()->getConfigParam('oePayPalBannersShowAll');
    }

    /**
     * Client ID getter for use with the installment banner feature.
     * @return string
     */
    public function getPayPalClientId(): string
    {
        return $this->getPayPalConfig()->getClientId();
    }

    /**
     * API URL getter for use with the installment banner feature
     * @return string
     */
    public function getPayPalApiBannerUrl(): string
    {
        $params['client-id'] = $this->getPayPalClientId();

        $components = 'messages';
        // enable buttons for PDP
        if ($this->getActiveClassName('details')) {
            $components .= ',buttons';
        }

        $params['components'] = $components;

        return Constants::PAYPAL_JS_SDK_URL . '?' . http_build_query($params);
    }

    /**
     * Returns whether PayPal banners should be shown on the start page
     *
     * @return bool
     */
    public function showPayPalBannerOnStartPage()
    {
        $config = Registry::getConfig();
        return (
            $config->getConfigParam('oePayPalBannersShowAll') &&
            $config->getConfigParam('oePayPalBannersStartPage') &&
            $config->getConfigParam('oePayPalBannersStartPageSelector') &&
            $config->getConfigParam('bl_perfLoadPrice')
        );
    }

    /**
     * Returns PayPal banners selector for the start page
     *
     * @return string
     */
    public function getPayPalBannerStartPageSelector()
    {
        $config = Registry::getConfig();
        return $config->getConfigParam('oePayPalBannersStartPageSelector');
    }

    /**
     * Returns whether PayPal banners should be shown on the category page
     *
     * @return bool
     */
    public function showPayPalBannerOnCategoryPage()
    {
        $config = Registry::getConfig();
        return (
            $config->getConfigParam('oePayPalBannersShowAll') &&
            $config->getConfigParam('oePayPalBannersCategoryPage') &&
            $config->getConfigParam('oePayPalBannersCategoryPageSelector') &&
            $config->getConfigParam('bl_perfLoadPrice')
        );
    }

    /**
     * Returns PayPal banners selector for the category page
     *
     * @return string
     */
    public function getPayPalBannerCategoryPageSelector()
    {
        $config = Registry::getConfig();
        return $config->getConfigParam('oePayPalBannersCategoryPageSelector');
    }

    /**
     * Returns whether PayPal banners should be shown on the search results page
     *
     * @return bool
     */
    public function showPayPalBannerOnSearchResultsPage()
    {
        $config = Registry::getConfig();

        return (
            $config->getConfigParam('oePayPalBannersShowAll') &&
            $config->getConfigParam('oePayPalBannersSearchResultsPage') &&
            $config->getConfigParam('oePayPalBannersSearchResultsPageSelector') &&
            $config->getConfigParam('bl_perfLoadPrice')
        );
    }

    /**
     * Returns PayPal banners selector for the search page
     *
     * @return string
     */
    public function getPayPalBannerSearchPageSelector()
    {
        $config = Registry::getConfig();
        return $config->getConfigParam('oePayPalBannersSearchResultsPageSelector');
    }

    /**
     * Returns whether PayPal banners should be shown on the product details page
     *
     * @return bool
     */
    public function showPayPalBannerOnProductDetailsPage()
    {
        $config = Registry::getConfig();

        return (
            $config->getConfigParam('oePayPalBannersShowAll') &&
            $config->getConfigParam('oePayPalBannersProductDetailsPage') &&
            $config->getConfigParam('oePayPalBannersProductDetailsPageSelector') &&
            $config->getConfigParam('bl_perfLoadPrice')
        );
    }

    /**
     * Returns PayPal banners selector for the product detail page
     *
     * @return string
     */
    public function getPayPalBannerProductDetailsPageSelector()
    {
        $config = Registry::getConfig();
        return $config->getConfigParam('oePayPalBannersProductDetailsPageSelector');
    }

    /**
     * Returns whether PayPal banners should be shown on the checkout page
     *
     * @return bool
     */
    public function showPayPalBannerOnCheckoutPage()
    {
        $showBanner = false;
        $actionClassName = $this->getActionClassName();
        $config = Registry::getConfig();
        if ($actionClassName === 'basket') {
            $showBanner = (
                $config->getConfigParam('oePayPalBannersShowAll') &&
                $config->getConfigParam('oePayPalBannersCheckoutPage') &&
                $config->getConfigParam('oePayPalBannersCartPageSelector') &&
                $config->getConfigParam('bl_perfLoadPrice')
            );
        } elseif ($actionClassName === 'payment') {
            $showBanner = (
                $config->getConfigParam('oePayPalBannersShowAll') &&
                $config->getConfigParam('oePayPalBannersCheckoutPage') &&
                $config->getConfigParam('oePayPalBannersPaymentPageSelector') &&
                $config->getConfigParam('bl_perfLoadPrice')
            );
        }

        return $showBanner;
    }

    /**
     * Returns PayPal banners selector for the cart page
     *
     * @return string
     */
    public function getPayPalBannerCartPageSelector()
    {
        $config = Registry::getConfig();
        return $config->getConfigParam('oePayPalBannersCartPageSelector');
    }

    /**
     * Returns PayPal banners selector for the payment page
     *
     * @return string
     */
    public function getPayPalBannerPaymentPageSelector()
    {
        $config = Registry::getConfig();
        return $config->getConfigParam('oePayPalBannersPaymentPageSelector');
    }

    /**
     * Returns the PayPal banners colour scheme
     *
     * @return string
     */
    public function getPayPalBannersColorScheme()
    {
        return Registry::getConfig()->getConfigParam('oePayPalBannersColorScheme');
    }

    // <-- PSPAYPAL-491
}
