<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details of a classic third-party integration. If you have API credentials with which to call the API on
 * the customer's behalf, specify details in this field. The signup and setup flow asks that the seller grant the
 * required permissions to the partner.
 *
 * generated from: ClassicApiIntegration_third_party_details
 */
class ClassicApiIntegrationThirdPartyDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string[]
     * An array of permissions that the partner requests from the customer.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 30
     */
    public $permissions;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->permissions, "permissions in ClassicApiIntegrationThirdPartyDetails must not be NULL $within");
         Assert::minCount($this->permissions, 0, "permissions in ClassicApiIntegrationThirdPartyDetails must have min. count of 0 $within");
         Assert::maxCount($this->permissions, 30, "permissions in ClassicApiIntegrationThirdPartyDetails must have max. count of 30 $within");
         Assert::isArray($this->permissions, "permissions in ClassicApiIntegrationThirdPartyDetails must be array $within");
    }

    public function __construct()
    {
    }
}
