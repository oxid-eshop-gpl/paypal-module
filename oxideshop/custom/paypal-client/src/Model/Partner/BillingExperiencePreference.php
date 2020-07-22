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

    /**
     * @var string
     * The ID of the payment web experience profile.
     */
    public $experience_id;

    /**
     * @var boolean
     * Indicates whether the partner has already displayed the billing context to the seller.
     */
    public $billing_context_set;
}
