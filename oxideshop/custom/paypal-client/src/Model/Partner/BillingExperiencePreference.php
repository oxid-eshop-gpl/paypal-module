<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * minLength: 1
     * maxLength: 20
     */
    public $experience_id;

    /**
     * @var boolean
     * Indicates whether the partner has already displayed the billing context to the seller.
     */
    public $billing_context_set;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->experience_id) || Assert::minLength($this->experience_id, 1, "experience_id in BillingExperiencePreference must have minlength of 1 $within");
        !isset($this->experience_id) || Assert::maxLength($this->experience_id, 20, "experience_id in BillingExperiencePreference must have maxlength of 20 $within");
    }

    public function __construct()
    {
    }
}
