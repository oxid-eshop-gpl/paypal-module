<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The bank account ID. An ID with `ROUTING_NUMBER_1` is required.
 *
 * generated from: referral_data-identifier.json
 */
class Identifier implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;

    /** @var string */
    public $value;
}
