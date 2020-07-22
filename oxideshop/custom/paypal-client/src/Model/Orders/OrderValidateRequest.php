<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Completes an action for an order.
 *
 * generated from: order_validate_request.json
 */
class OrderValidateRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var ExtendedPaymentSource
     * A payment source that has additional authentication challenges.
     */
    public $payment_source;

    /**
     * @var OrderValidateApplicationContext
     * Customizes the payer experience during the approval process for the payment with
     * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
     * and <code>shipping_preference</code> during partner account setup, which overrides the request
     * values.</blockquote>
     */
    public $application_context;
}
