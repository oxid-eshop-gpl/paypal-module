<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the billing agreement between the partner and a seller.
 *
 * generated from: referral_data-billing_agreement.json
 */
class BillingAgreement implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The billing agreement description.
     */
    public $description;

    /**
     * @var BillingExperiencePreference
     * The preference that customizes the billing experience of the customer.
     */
    public $billing_experience_preference;

    /**
     * @var string
     * The custom data for the billing agreement.
     */
    public $merchant_custom_data;

    /**
     * @var string
     * The URL to which to redirect seller to accept the billing agreement.
     */
    public $approval_url;

    /**
     * @var string
     * The billing agreement token for the agreement.
     */
    public $ec_token;
}
