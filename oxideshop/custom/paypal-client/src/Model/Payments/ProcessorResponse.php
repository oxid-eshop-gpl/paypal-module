<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The processor information. Might be required for payment requests, such as direct credit card transactions.
 */
class ProcessorResponse implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $avs_code;

    /** @var string */
    public $cvv_code;

    /** @var string */
    public $response_code;

    /** @var string */
    public $payment_advice_code;
}
