<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Customizes the payer experience during the approval process for the payment with
 * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
 * and <code>shipping_preference</code> during partner account setup, which overrides the request
 * values.</blockquote>
 *
 * generated from: order_validate_application_context.json
 */
class OrderValidateApplicationContext implements JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $vault;
}
