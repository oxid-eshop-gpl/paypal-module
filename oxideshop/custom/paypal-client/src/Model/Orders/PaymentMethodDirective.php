<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Directives for certain payment methods based on eligibility.
 *
 * generated from: model-payment_method_directive.json
 */
class PaymentMethodDirective implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Indicates the type of payment processing. Eg: CUSTOM_CARD_PROCESSING, CUSTOM_BANK_PROCESSING.
     */
    public $payment_processing_type;

    /**
     * @var string
     * Defines the payment processing decision as ALLOW, DENY, UNKNOWN.
     */
    public $processing_decision;

    /**
     * @var array<string>
     * Reasons for the decision. Usually set for a DENY decision.
     */
    public $reason;
}
