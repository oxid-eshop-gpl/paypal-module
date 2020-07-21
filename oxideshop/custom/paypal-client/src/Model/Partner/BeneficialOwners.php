<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Beneficial owners of the entity.
 */
class BeneficialOwners implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $individual_beneficial_owners;

    /** @var array */
    public $business_beneficial_owners;
}
