<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The office bearer associated to the account.
 */
class OfficeBearer extends Person implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Role of the person party played in the business.
     */
    public $role;
}
