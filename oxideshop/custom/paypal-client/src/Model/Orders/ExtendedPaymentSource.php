<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A payment source that has additional authentication challenges.
 *
 * generated from: extended_payment_source.json
 */
class ExtendedPaymentSource extends PaymentSource implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<string>
     * An array of contingencies.
     */
    public $contingencies;

    public function validate()
    {
    }
}
