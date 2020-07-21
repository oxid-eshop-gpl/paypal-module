<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment by other means details.
 */
class PaymentByOtherMeans implements \JsonSerializable
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
