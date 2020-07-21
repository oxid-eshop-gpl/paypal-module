<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the billing agreement between the partner and a seller.
 */
class BillingAgreement implements \JsonSerializable
{
    use BaseModel;

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
}
