<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidSolutionCatalysts\PayPal\Core\Config;
use OxidSolutionCatalysts\PayPal\Core\PartnerConfig;
use OxidSolutionCatalysts\PayPal\Service\Partner as PartnerService;
use OxidSolutionCatalysts\PayPal\Traits\ServiceContainer;
use OxidSolutionCatalysts\PayPal\Service\ModuleSettings;

/**
 * Controller for admin > PayPal/Configuration page
 */
class PayPalConfigController extends AdminController
{
    use ServiceContainer;

    /**
     * @var string Current class template name.
     */
    protected $_sThisTemplate = 'pspaypalconfig.tpl';

    /**
     * @return string
     */
    public function render()
    {
        $thisTemplate = parent::render();

        $config = new Config();
        $this->addTplParam('config', $config);

        try {
            $config->checkHealth();
        } catch (StandardException $e) {
            Registry::getUtilsView()->addErrorToDisplay($e, false, true, 'paypal_error');
        }

        return $thisTemplate;
    }

    /**
     * Template Getter: Get a Link for SignUp the Live Merchant Integration
     * see getSignUpMerchantIntegrationLink
     */
    public function getLiveSignUpMerchantIntegrationLinks(): array
    {
        return $this->getReferralLinks();
    }

    /**
     * Template Getter: Get a Link for SignUp the Live Merchant Integration
     * see getSignUpMerchantIntegrationLink
     * @return string
     */
    public function getSandboxSignUpMerchantIntegrationLinks(): array
    {
        return $this->getReferralLinks(true);
    }

    protected function getReferralLinks(bool $isSandbox = false): array
    {
        $trackingId = Registry::getSession()->getId();
        $partnerService = $this->getServiceFromContainer(PartnerService::class);

        return $partnerService->getPartnerReferralLinks($this->createNonce(), $trackingId, $isSandbox);
    }

    /**
     * create a unique Seller Nonce to check your own transactions
     *
     * @return string
     */
    public function createNonce(): string
    {
        if (!empty(Registry::getSession()->getVariable('PAYPAL_MODULE_NONCE'))) {
            return Registry::getSession()->getVariable('PAYPAL_MODULE_NONCE');
        }

        /** @var PartnerConfig $partnerConfig */
        $partnerConfig = oxNew(PartnerConfig::class);
        $nonce = $partnerConfig->createNonce();

        Registry::getSession()->setVariable('PAYPAL_MODULE_NONCE', $nonce);

        return $nonce;
    }


    /**
     * Saves configuration values
     */
    public function save()
    {
        $confArr = Registry::getRequest()->getRequestEscapedParameter('conf');
        $shopId = Registry::getConfig()->getShopId();

        $confArr = $this->handleSpecialFields($confArr);
        $this->saveConfig($confArr, $shopId);

        parent::save();
    }

    /**
     * Saves configuration values
     *
     * @param array $conf
     * @param int   $shopId
     */
    protected function saveConfig(array $conf, int $shopId): void
    {
        foreach ($conf as $confName => $value) {
            $value = trim($value);
            $this->getServiceFromContainer(ModuleSettings::class)->save($confName, $value);
        }
    }

    /**
     * Handles checkboxes/dropdowns
     *
     * @param array $conf
     *
     * @return array
     */
    protected function handleSpecialFields(array $conf): array
    {
        if ($conf['oscPayPalSandboxMode'] === 'sandbox') {
            $conf['oscPayPalSandboxMode'] = 1;
        } else {
            $conf['oscPayPalSandboxMode'] = 0;
        }

        if (!isset($conf['oscPayPalShowProductDetailsButton'])) {
            $conf['oscPayPalShowProductDetailsButton'] = 0;
        }
        if (!isset($conf['oscPayPalShowBasketButton'])) {
            $conf['oscPayPalShowBasketButton'] = 0;
        }
        if (!isset($conf['oscPayPalShowCheckoutButton'])) {
            $conf['oscPayPalShowCheckoutButton'] = 0;
        }

        if (!isset($conf['oscPayPalBannersShowAll'])) {
            $conf['oscPayPalBannersShowAll'] = 0;
        }
        if (!isset($conf['oscPayPalBannersStartPage'])) {
            $conf['oscPayPalBannersStartPage'] = 0;
        }
        if (!isset($conf['oscPayPalBannersCategoryPage'])) {
            $conf['oscPayPalBannersCategoryPage'] = 0;
        }
        if (!isset($conf['oscPayPalBannersSearchResultsPage'])) {
            $conf['oscPayPalBannersSearchResultsPage'] = 0;
        }
        if (!isset($conf['oscPayPalBannersProductDetailsPage'])) {
            $conf['oscPayPalBannersProductDetailsPage'] = 0;
        }
        if (!isset($conf['oscPayPalBannersCheckoutPage'])) {
            $conf['oscPayPalBannersCheckoutPage'] = 0;
        }
        if (!isset($conf['oscPayPalLoginWithPayPalEMail'])) {
            $conf['oscPayPalLoginWithPayPalEMail'] = 0;
        }

        return $conf;
    }

    /**
     * @return array
     */
    public function getTotalCycleDefaults()
    {
        $array = [];

        for ($i = 1; $i < 1000; $i++) {
            $array[] = $i;
        }

        return $array;
    }
}
