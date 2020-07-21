<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The details of the billing agreement between the partner and a seller.
 */
class BillingAgreement implements \JsonSerializable
{
    /** @var string */
    public $description;

    /** @var BillingExperiencePreference */
    public $billing_experience_preference;

    /** @var string */
    public $merchant_custom_data;

    /** @var string */
    public $approval_url;

    /** @var string */
    public $ec_token;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
