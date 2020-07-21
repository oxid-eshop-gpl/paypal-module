<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The preference that customizes the billing experience of the customer.
 */
class BillingExperiencePreference implements \JsonSerializable
{
    /** @var string */
    public $experience_id;

    /** @var boolean */
    public $billing_context_set;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
