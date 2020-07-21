<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Payment context data required for processing payments for an order.
 */
class PaymentContextData implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $intent;

    /** @var OrderApplicationContext */
    public $application_context;

    /** @var array<Facilitator> */
    public $facilitators;

    /** @var array<PaymentUnit> */
    public $payment_units;
}
