<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The integration details for PayPal CLASSIC endpoints.
 */
class ClassicApiIntegration implements \JsonSerializable
{
    /** @var string */
    public $integration_type;

    /** @var OxidProfessionalServices\PayPal\Api\Model\Partner\ThirdPartyDetails */
    public $ThirdPartyDetails;

    /** @var string */
    public $first_party_details;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
