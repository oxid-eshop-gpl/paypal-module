<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     * @var string[]
     * Reasons for the decision. Usually set for a DENY decision.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 10
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_processing_type) || Assert::minLength($this->payment_processing_type, 1, "payment_processing_type in PaymentMethodDirective must have minlength of 1 $within");
        !isset($this->payment_processing_type) || Assert::maxLength($this->payment_processing_type, 127, "payment_processing_type in PaymentMethodDirective must have maxlength of 127 $within");
        !isset($this->processing_decision) || Assert::minLength($this->processing_decision, 1, "processing_decision in PaymentMethodDirective must have minlength of 1 $within");
        !isset($this->processing_decision) || Assert::maxLength($this->processing_decision, 30, "processing_decision in PaymentMethodDirective must have maxlength of 30 $within");
        Assert::notNull($this->reason, "reason in PaymentMethodDirective must not be NULL $within");
         Assert::minCount($this->reason, 1, "reason in PaymentMethodDirective must have min. count of 1 $within");
         Assert::maxCount($this->reason, 10, "reason in PaymentMethodDirective must have max. count of 10 $within");
         Assert::isArray($this->reason, "reason in PaymentMethodDirective must be array $within");
    }

    public function __construct()
    {
    }
}
