<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The third-party claims properties.
 *
 * generated from: response-external_case_properties.json
 */
class ExternalCaseProperties implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reference_id;

    /** @var string */
    public $external_type;

    /** @var string */
    public $recovery_type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $reversal_fee;
}
