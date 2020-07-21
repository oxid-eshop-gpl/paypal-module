<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The third-party claims properties.
 */
class ExternalCaseProperties implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reference_id;

    /** @var string */
    public $external_type;

    /** @var string */
    public $recovery_type;

    /** @var Money */
    public $reversal_fee;
}
