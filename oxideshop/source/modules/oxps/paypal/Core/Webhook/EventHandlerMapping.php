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

namespace OxidProfessionalServices\PayPal\Core\Webhook;

use OxidProfessionalServices\PayPal\Core\Webhook\Handler\BillingSubscriptionCancelledHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\BillingSubscriptionExpiredHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\BillingSubscriptionPaymentFailedHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\CheckoutOrderCompletedHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\MerchantOnboardingCompleteHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\MerchantPartnerConsentRevokedHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\PaymentCaptureCompletedHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\PaymentCaptureDeniedHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\PaymentCapturePendingHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\PaymentCaptureRefundedHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\PaymentSaleRefundedHandler;
use OxidProfessionalServices\PayPal\Core\Webhook\Handler\PaymentSaleReversedHandler;

class EventHandlerMapping
{
    public const MAPPING = [
        'CHECKOUT.ORDER.COMPLETED' => CheckoutOrderCompletedHandler::class,
        'MERCHANT.ONBOARDING.COMPLETED' => MerchantOnboardingCompleteHandler::class,
        'MERCHANT.PARTNER-CONSENT.REVOKED' => MerchantPartnerConsentRevokedHandler::class,
        'PAYMENT.CAPTURE.COMPLETED' => PaymentCaptureCompletedHandler::class,
        'PAYMENT.CAPTURE.DENIED' => PaymentCaptureDeniedHandler::class,
        'PAYMENT.CAPTURE.REFUNDED' => PaymentCaptureRefundedHandler::class,
        'PAYMENT.CAPTURE.PENDING' => PaymentCapturePendingHandler::class,
        'BILLING.SUBSCRIPTION.CANCELLED' => BillingSubscriptionCancelledHandler::class,
        'BILLING.SUBSCRIPTION.EXPIRED' => BillingSubscriptionExpiredHandler::class,
        'BILLING.SUBSCRIPTION.PAYMENT.FAILED' => BillingSubscriptionPaymentFailedHandler::class,
        'PAYMENT.SALE.REFUNDED' => PaymentSaleRefundedHandler::class,
        'PAYMENT.SALE.REVERSED' => PaymentSaleReversedHandler::class
    ];
}
