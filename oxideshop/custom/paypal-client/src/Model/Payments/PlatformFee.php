<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The platform or partner fee, commission, or brokerage fee that is associated with the transaction. Not a
 * separate or isolated transaction leg from the external perspective. The platform fee is limited in scope and
 * is always associated with the original payment for the purchase unit.
 */
class PlatformFee implements JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $amount;

    /** @var PayeeBase */
    public $payee;
}
