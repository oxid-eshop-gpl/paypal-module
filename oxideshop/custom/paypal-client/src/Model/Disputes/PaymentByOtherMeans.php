<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment by other means details.
 *
 * generated from: response-payment_by_other_means.json
 */
class PaymentByOtherMeans implements JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $charge_different_from_original;

    /** @var boolean */
    public $received_duplicate;

    /** @var string */
    public $payment_method;

    /** @var string */
    public $payment_instrument_suffix;
}
