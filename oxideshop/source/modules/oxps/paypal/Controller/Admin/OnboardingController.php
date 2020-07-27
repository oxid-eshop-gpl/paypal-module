<?php

namespace OxidProfessionalServices\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Onboarding;
use OxidProfessionalServices\PayPal\Core\Config;

class OnboardingController extends AdminController
{
    /**
     *
     */
    public function autoConfigurationFromCallback()
    {
        $in = file_get_contents('php://input');
        $callBackData = json_decode($in);
        $authCode = $callBackData->authCode;
        $sharedId = $callBackData->sharedId;
        $isSandbox = $callBackData->isSandBox;
        $nonce = Registry::getSession()->getVariable('PAYPAL_MODULE_NONCE');
        $config = new Config();
        $oxidConfig = Registry::getConfig();
        $oxidConfig->setConfigParam('blPayPalSandboxMode', $isSandbox);
        $url = $config->isSandbox() ? Client::SANDBOX_URL : Client::PRODUCTION_URL;
        $client = new Onboarding(
            Registry::getLogger(),
            $url,
            $config->getTechnicalClientId(),
            $config->getTechnicalClientSecret(),
            $config->getTechnicalPartnerId()
        );
        $client->authAfterWebLogin($authCode, $sharedId, $nonce);
        Registry::getSession()->deleteVariable('PAYPAL_MODULE_NONCE');
        $credentials  = $client->getCredentials();
        header('Content-Type: application/json; charset=UTF-8');
        Registry::getUtils()->showMessageAndExit(json_encode($credentials));
    }
}
