<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The office bearer associated to the account.
 */
class OfficeBearer extends string implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $role;
}
