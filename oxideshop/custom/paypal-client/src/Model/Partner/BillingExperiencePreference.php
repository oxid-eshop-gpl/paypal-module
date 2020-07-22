<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The preference that customizes the billing experience of the customer.
 *
 * generated from: referral_data-billing_experience_preference.json
 */
class BillingExperiencePreference implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $experience_id;

    /** @var boolean */
    public $billing_context_set;
}
