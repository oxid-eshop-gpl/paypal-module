<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The preference that customizes the billing experience of the customer.
 */
class BillingExperiencePreference implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $experience_id;

    /** @var boolean */
    public $billing_context_set;
}
