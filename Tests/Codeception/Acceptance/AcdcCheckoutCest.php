<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Tests\Codeception\Acceptance;

use OxidEsales\Codeception\Step\ProductNavigation;
use OxidSolutionCatalysts\PayPal\Tests\Codeception\AcceptanceTester;
use Codeception\Util\Fixtures;
use OxidEsales\Codeception\Page\Checkout\ThankYou;
use OxidEsales\Codeception\Step\Basket;
use OxidEsales\Codeception\Page\Checkout\PaymentCheckout;
use OxidEsales\Codeception\Page\Checkout\OrderCheckout;
use OxidEsales\Codeception\Module\Translation\Translator;

/**
 * @group osc_paypal
 * @group osc_paypal_checkout
 * @group osc_paypal_checkout_acdc
 * @group osc_paypal_remote_login
 */
final class AcdcCheckoutCestCheckoutCest extends BaseCest
{
    public function checkoutWithAcdcViaPayPalNoCreditCardFieldsFilled(AcceptanceTester $I): void
    {
        $I->wantToTest('logged in user with ACDC clicks order now without entering CC credentials');

        $I->seeNumRecords(0, 'oscpaypal_order');
        $I->seeNumRecords(1, 'oxorder');

        $this->proceedToPaymentStep($I, Fixtures::get('userName'));

        $paymentCheckout = new PaymentCheckout($I);
        /** @var OrderCheckout $orderCheckout */
        $paymentCheckout->selectPayment('oscpaypal_acdc')
            ->goToNextStep();
        $I->waitForPageLoad();
        $I->waitForElementVisible("#card_form");

        //This is as far as we get, look slike codecetion cannot interfere with paypal JS
        $I->seeElement("#card_form");
    }
}
