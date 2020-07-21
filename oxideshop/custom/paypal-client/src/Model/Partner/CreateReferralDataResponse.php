<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The shared referral data.
 */
class CreateReferralDataResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $links;
}
