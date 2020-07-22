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
     *
     * this is mandatory to be set
     */
    public $billing_cycle_sequence;

    /**
     * @var PricingScheme
     * The pricing scheme details.
     *
     * this is mandatory to be set
     */
    public $pricing_scheme;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->billing_cycle_sequence, "billing_cycle_sequence in UpdatePricingSchemeRequest must not be NULL $within");
        Assert::notNull($this->pricing_scheme, "pricing_scheme in UpdatePricingSchemeRequest must not be NULL $within");
         Assert::isInstanceOf($this->pricing_scheme, PricingScheme::class, "pricing_scheme in UpdatePricingSchemeRequest must be instance of PricingScheme $within");
         $this->pricing_scheme->validate(UpdatePricingSchemeRequest::class);
    }

    public function __construct()
    {
    }
}
