<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The business beneficial owner of the account.
 */
class BusinessBeneficialOwner extends Business implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $percentage_of_ownership;
}
