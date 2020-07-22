<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->pricing_scheme) || Assert::isInstanceOf($this->pricing_scheme, PricingScheme::class, "pricing_scheme in UpdatePricingSchemeRequest must be instance of PricingScheme $within");
        !isset($this->pricing_scheme) || $this->pricing_scheme->validate(UpdatePricingSchemeRequest::class);
    }

    public function __construct()
    {
    }
}
