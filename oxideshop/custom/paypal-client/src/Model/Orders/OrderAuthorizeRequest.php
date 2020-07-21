<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The authorization of an order request.
 */
class OrderAuthorizeRequest implements JsonSerializable
{
    use BaseModel;

    /** @var PaymentSource */
    public $payment_source;

    /** @var string */
    public $reference_id;

    /** @var Money */
    public $amount;
}
