<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Seller’s consent to operate on this financial instrument.
 *
 * generated from: referral_data-mandate.json
 */
class Mandate implements JsonSerializable
{
    use BaseModel;

    /**
     * @var boolean
     * Whether mandate was accepted or not.
     */
    public $accepted;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    public function __construct()
    {
    }
}
