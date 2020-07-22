<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Payment Context Attribute. Typically used as a reference for a payment. Eg: CART_ID, PAY_ID.
 *
 * generated from: model-payment_context_attribute.json
 */
class PaymentContextAttribute implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Context attribute name.
     */
    public $name;

    /**
     * @var string
     * Context attribute value.
     */
    public $value;
}
