<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The individual owner of the account.
 */
class IndividualBeneficialOwner extends Person implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $percentage_of_ownership;
}
