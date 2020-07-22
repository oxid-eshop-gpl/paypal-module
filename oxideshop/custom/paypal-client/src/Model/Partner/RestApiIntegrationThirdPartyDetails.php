<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The integration details for PayPal REST endpoints.
 *
 * generated from: RestApiIntegration_third_party_details
 */
class RestApiIntegrationThirdPartyDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<string>
     * An array of features that partner can access, or use, in PayPal on behalf of the seller. The seller grants
     * permission for these features to the partner.
     *
     * maxItems: 0
     * maxItems: 20
     */
    public $features;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->features, "features in RestApiIntegrationThirdPartyDetails must not be NULL $within");
         Assert::minCount($this->features, 0, "features in RestApiIntegrationThirdPartyDetails must have min. count of 0 $within");
         Assert::maxCount($this->features, 20, "features in RestApiIntegrationThirdPartyDetails must have max. count of 20 $within");
         Assert::isArray($this->features, "features in RestApiIntegrationThirdPartyDetails must be array $within");
    }

    public function __construct()
    {
    }
}
