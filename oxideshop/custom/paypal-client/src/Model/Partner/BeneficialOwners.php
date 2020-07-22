<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Beneficial owners of the entity.
 *
 * generated from: customer_common_overrides-beneficial_owners.json
 */
class BeneficialOwners implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<IndividualBeneficialOwner>
     * Individual beneficial owners.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 5
     */
    public $individual_beneficial_owners;

    /**
     * @var array<BusinessBeneficialOwner>
     * Business beneficial owners.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 5
     */
    public $business_beneficial_owners;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->individual_beneficial_owners, "individual_beneficial_owners in BeneficialOwners must not be NULL $within");
         Assert::minCount($this->individual_beneficial_owners, 0, "individual_beneficial_owners in BeneficialOwners must have min. count of 0 $within");
         Assert::maxCount($this->individual_beneficial_owners, 5, "individual_beneficial_owners in BeneficialOwners must have max. count of 5 $within");
         Assert::isArray($this->individual_beneficial_owners, "individual_beneficial_owners in BeneficialOwners must be array $within");

                                if (isset($this->individual_beneficial_owners)){
                                    foreach ($this->individual_beneficial_owners as $item) {
                                        $item->validate(BeneficialOwners::class);
                                    }
                                }

        Assert::notNull($this->business_beneficial_owners, "business_beneficial_owners in BeneficialOwners must not be NULL $within");
         Assert::minCount($this->business_beneficial_owners, 0, "business_beneficial_owners in BeneficialOwners must have min. count of 0 $within");
         Assert::maxCount($this->business_beneficial_owners, 5, "business_beneficial_owners in BeneficialOwners must have max. count of 5 $within");
         Assert::isArray($this->business_beneficial_owners, "business_beneficial_owners in BeneficialOwners must be array $within");

                                if (isset($this->business_beneficial_owners)){
                                    foreach ($this->business_beneficial_owners as $item) {
                                        $item->validate(BeneficialOwners::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
