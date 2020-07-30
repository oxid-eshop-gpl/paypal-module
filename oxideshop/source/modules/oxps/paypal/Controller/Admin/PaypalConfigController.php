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

namespace OxidProfessionalServices\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Core\Config;

/**
 * Controller for admin > Paypal/Configuration page
 */
class PaypalConfigController extends AdminController
{
    public const MODULE_ID = 'module:oxps/paypal';
    public const SIGN_UP_HOST = 'https://www.sandbox.paypal.com/bizsignup/partner/entry';

    public function __construct()
    {
        parent::__construct();

        $this->_sThisTemplate = 'paypalconfig.tpl';
    }

    /**
     * Get webhook controller url
     *
     * @return string
     */
    public function getWebhookControllerUrl(): string
    {
        return Registry::getUtilsUrl()->getActiveShopHost() . '/index.php?cl=PayPalWebhookController';
    }

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
     * @return string
     */
    public function getLiveSignUpMerchantIntegrationLink(): string
    {
        $config = new Config();

        return $this->buildSignUpLink(
            $config->getLiveOxidPartnerId(),
            $config->getLiveOxidClientId(),
            $this->getReturnUrl()
        );
    }

    /**
     * Template Getter: Get a Link for SignUp the Live Merchant Integration
     * see getSignUpMerchantIntegrationLink
     * @return string
     */
    public function getSandboxSignUpMerchantIntegrationLink(): string
    {
        $config = new Config();

        return $this->buildSignUpLink(
            $config->getSandboxOxidPartnerId(),
            $config->getSandboxOxidClientId(),
            $this->getReturnUrl()
        );
    }

    /**
     * Maps arguments and constants to request parameters, generates a sign up url
     *
     * @param string $partnerId
     * @param string $clientId
     * @param string $returnUrl
     *
     * @return string
     */
    private function buildSignUpLink(string $partnerId, string $clientId, string $returnUrl): string
    {
        $params = [
            'sellerNonce' => $this->createNonce(),
            'partnerId' => $partnerId,
            'product' => 'EXPRESS_CHECKOUT',
            'integrationType' => 'FO',
            'partnerClientId' => $clientId,
            'returnToPartnerUrl' => $returnUrl,
            //'partnerLogoUrl' => '',
            'displayMode' => 'minibrowser',
            'features' => 'PAYMENT,REFUND,ADVANCED_TRANSACTION_SEARCH'
        ];

        return self::SIGN_UP_HOST . '?' . http_build_query($params);
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

        try {
            // throws Exception if it was not possible to gather sufficient entropy.
            $nonce = bin2hex(random_bytes(42));
        } catch (\Exception $e) {
            $nonce = md5(uniqid('', true) . '|' . microtime()) . substr(md5(mt_rand()), 0, 24);
        }

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
            if (strpos($confName, 'bl') === 0) {
                Registry::getConfig()->saveShopConfVar('bool', $confName, $value, $shopId, self::MODULE_ID);
            } else {
                Registry::getConfig()->saveShopConfVar('str', $confName, $value, $shopId, self::MODULE_ID);
            }
        }
    }

    /**
     * Handles cheboxes/dropdowns
     *
     * @param array $conf
     *
     * @return array
     */
    protected function handleSpecialFields(array $conf): array
    {
        if ($conf['blPayPalSandboxMode'] === 'sandbox') {
            $conf['blPayPalSandboxMode'] = 1;
        } else {
            $conf['blPayPalSandboxMode'] = 0;
        }

        if (!isset($conf['blPayPalShowProductDetailsButton'])) {
            $conf['blPayPalShowProductDetailsButton'] = 0;
        }

        if (!isset($conf['blPayPalShowMiniBasketButton'])) {
            $conf['blPayPalShowMiniBasketButton'] = 0;
        }

        if (!isset($conf['blPayPalShowAddToBasketModalButton'])) {
            $conf['blPayPalShowAddToBasketModalButton'] = 0;
        }

        return $conf;
    }

    /**
     * Returns RETURN URL
     *
     * @return string
     */
    protected function getReturnUrl()
    {
        $session = Registry::getSession();
        $controllerKey = Registry::getControllerClassNameResolver()->getIdByClassName(get_class());

        return $session->processUrl($this->getBaseUrl() . "&cl=" . $controllerKey);
    }

    /**
     * Returns base url, which is used to construct Callback, Return and Cancel Urls
     *
     * @return string
     */
    protected function getBaseUrl()
    {
        $session = Registry::getSession();
        $url = Registry::getConfig()->getSslShopUrl() . "index.php?lang="
            . Registry::getLang()->getBaseLanguage()
            . "&sid=" . $session->getId() . "&rtoken=" . $session->getRemoteAccessToken();
        $url .= "&shp=" . Registry::getConfig()->getShopId();

        return $url;
    }
}
