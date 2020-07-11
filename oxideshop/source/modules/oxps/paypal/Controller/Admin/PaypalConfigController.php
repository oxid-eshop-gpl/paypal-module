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
use OxidProfessionalServices\PayPal\Api\Client;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Controller for admin > Paypal/Configuration page
 */
class PaypalConfigController extends AdminController
{
    public const MODULE_ID = 'module:oxps/paypal';

    public function __construct()
    {
        parent::__construct();

        $this->_sThisTemplate = 'paypalconfig.tpl';
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
     *
     * @return string
     */
    public function getLiveSignUpMerchantIntegrationLink()
    {
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_DEBUG);
        $logger = new ConsoleLogger($output);
        $config = new Config();

        $oxidLiveIntegrationClient = new Client($logger, Client::PRODUCTION_URL);
        $oxidLiveIntegrationClient->auth(
            $config->getLiveOxidClientId(),
            $config->getLiveOxidSecret()
        );
        $accessToken = $oxidLiveIntegrationClient->getAccessToken();
        $oxidLiveIntegrationClient->generateSignupLink($accessToken);

        return $oxidLiveIntegrationClient->getSignupLink();
    }

    /**
     * Template Getter: Get a Link for SignUp the Live Merchant Integration
     *
     * @return string
     */
    public function getSandboxSignUpMerchantIntegrationLink()
    {
        // https://www.sandbox.paypal.com/bizsignup/partner/entry?partnerId=PEZFKJQZVYEE6&product=ppcp&integrationType=FO&features=PAYMENT,REFUND&partnerClientId=AS35dAZbp8yCgjz7UQ0FAzQ_x1ennj5nT8C5-arVcqaLuxCJhBYvbuz4afGt1Ql-wOqso6wPN01aAS_B&returnToPartnerUrl=https://www.google.com&partnerLogoUrl=https://www.google.com&displayMode=minibrowser&sellerNonce=ARhK2xC8xSvNRphchskRddPDH2rWnc-F2yPl03oP_Hbi13fUDvNnTB5tiy0ct

        $output = new ConsoleOutput(OutputInterface::VERBOSITY_DEBUG);
        $logger = new ConsoleLogger($output);
        $config = new Config();

        $oxidSandboxIntegrationClient = new Client($logger, Client::SANDBOX_URL);
        $oxidSandboxIntegrationClient->auth(
            $config->getSandboxOxidClientId(),
            $config->getSandboxOxidSecret()
        );
        $accessToken = $oxidSandboxIntegrationClient->getAccessToken();
        $oxidSandboxIntegrationClient->generateSignupLink($accessToken);

        return $oxidSandboxIntegrationClient->getSignupLink();
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
     * @param int $shopId
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
        if ($conf['blPaypalSandboxMode'] === 'sandbox') {
            $conf['blPaypalSandboxMode'] = 1;
        } else {
            $conf['blPaypalSandboxMode'] = 0;
        }

        return $conf;
    }
}
