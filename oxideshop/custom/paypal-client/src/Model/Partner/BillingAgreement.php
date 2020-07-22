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
     *
     * minLength: 1
     * maxLength: 125
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
     *
     * minLength: 1
     * maxLength: 125
     */
    public $merchant_custom_data;

    /**
     * @var string
     * The URL to which to redirect seller to accept the billing agreement.
     *
     * minLength: 1
     * maxLength: 125
     */
    public $approval_url;

    /**
     * @var string
     * The billing agreement token for the agreement.
     *
     * minLength: 1
     * maxLength: 50
     */
    public $ec_token;

    public function validate()
    {
        assert(!isset($this->description) || strlen($this->description) >= 1);
        assert(!isset($this->description) || strlen($this->description) <= 125);
        assert(!isset($this->merchant_custom_data) || strlen($this->merchant_custom_data) >= 1);
        assert(!isset($this->merchant_custom_data) || strlen($this->merchant_custom_data) <= 125);
        assert(!isset($this->approval_url) || strlen($this->approval_url) >= 1);
        assert(!isset($this->approval_url) || strlen($this->approval_url) <= 125);
        assert(!isset($this->ec_token) || strlen($this->ec_token) >= 1);
        assert(!isset($this->ec_token) || strlen($this->ec_token) <= 50);
    }
}
