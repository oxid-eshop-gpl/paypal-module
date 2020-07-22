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

    /** @var string */
    public $payment_processing_type;

    /** @var string */
    public $processing_decision;

    /** @var array */
    public $reason;
}
