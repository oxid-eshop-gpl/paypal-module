<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Policy directive indicating how to process the payment.
 */
class PolicyDirective implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $payment_decision;

    /** @var array */
    public $reason;
}
