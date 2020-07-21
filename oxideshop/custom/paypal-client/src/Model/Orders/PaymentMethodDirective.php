<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Directives for certain payment methods based on eligibility.
 */
class PaymentMethodDirective implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $payment_processing_type;

    /** @var string */
    public $processing_decision;

    /** @var array */
    public $reason;
}
