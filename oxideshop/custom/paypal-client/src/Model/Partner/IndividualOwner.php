<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The individual owner of the account.
 */
class IndividualOwner extends Person implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Role of the person party played in the account.
     */
    public $type;
}
