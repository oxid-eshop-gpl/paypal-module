<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Seller’s consent to operate on this financial instrument.
 *
 * generated from: referral_data-mandate.json
 */
class Mandate implements JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $accepted;
}
