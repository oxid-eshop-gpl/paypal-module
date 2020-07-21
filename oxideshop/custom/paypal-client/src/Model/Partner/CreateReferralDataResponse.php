<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The shared referral data.
 */
class CreateReferralDataResponse implements \JsonSerializable
{
    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
