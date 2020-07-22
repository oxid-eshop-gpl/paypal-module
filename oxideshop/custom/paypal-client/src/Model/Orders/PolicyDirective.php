<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Policy directive indicating how to process the payment.
 *
 * generated from: model-policy_directive.json
 */
class PolicyDirective implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Indicates the payment state decision. Can be ALLOW, DENY or ALLOW_WITH_HOLD.
     *
     * minLength: 1
     * maxLength: 30
     */
    public $payment_decision;

    /**
     * @var array<string>
     * List of reasons for the payment decision.
     */
    public $reason;
}
