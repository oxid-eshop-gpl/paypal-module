<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The update pricing scheme request details.
 *
 * generated from: update_pricing_scheme_request.json
 */
class UpdatePricingSchemeRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var integer
     * The billing cycle sequence.
     */
    public $billing_cycle_sequence;

    /**
     * @var PricingScheme
     * The pricing scheme details.
     */
    public $pricing_scheme;

    public function validate()
    {
    }
}
