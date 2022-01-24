<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Core;

class Constants
{
    public const PAYPAL_JS_SDK_URL = 'https://www.paypal.com/sdk/js';
    public const PAYPAL_INTEGRATION_DATE = '2020-07-29';
    public const PAYPAL_ORDER_INTENT_CAPTURE = 'CAPTURE';
    public const SESSION_CHECKOUT_ORDER_ID = 'paypal-checkout-session';
}