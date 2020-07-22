<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * @var string
     * Context attribute value.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $value;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength($this->name, 1, "name in PaymentContextAttribute must have minlength of 1 $within");
        !isset($this->name) || Assert::maxLength($this->name, 127, "name in PaymentContextAttribute must have maxlength of 127 $within");
        !isset($this->value) || Assert::minLength($this->value, 1, "value in PaymentContextAttribute must have minlength of 1 $within");
        !isset($this->value) || Assert::maxLength($this->value, 255, "value in PaymentContextAttribute must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
