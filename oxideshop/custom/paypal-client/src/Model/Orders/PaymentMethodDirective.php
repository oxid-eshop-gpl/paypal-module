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
     *
     * minLength: 1
     * maxLength: 127
     */
    public $payment_processing_type;

    /**
     * @var string
     * Defines the payment processing decision as ALLOW, DENY, UNKNOWN.
     *
     * minLength: 1
     * maxLength: 30
     */
    public $processing_decision;

    /**
     * @var array<string>
     * Reasons for the decision. Usually set for a DENY decision.
     */
    public $reason;

    public function validate()
    {
        assert(!isset($this->payment_processing_type) || strlen($this->payment_processing_type) >= 1);
        assert(!isset($this->payment_processing_type) || strlen($this->payment_processing_type) <= 127);
        assert(!isset($this->processing_decision) || strlen($this->processing_decision) >= 1);
        assert(!isset($this->processing_decision) || strlen($this->processing_decision) <= 30);
    }
}
