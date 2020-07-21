<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The individual owner of the account.
 */
class IndividualOwner extends string implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;
}
