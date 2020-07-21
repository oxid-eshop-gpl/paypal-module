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

    const ROLE_CEO = 'CEO';
    const ROLE_CHAIRMAN = 'CHAIRMAN';
    const ROLE_DIRECTOR = 'DIRECTOR';
    const ROLE_SECRETARY = 'SECRETARY';
    const ROLE_TREASURER = 'TREASURER';
    const ROLE_TRUSTEE = 'TRUSTEE';

    /**
     * @var string
     * Role of the person party played in the business.
     */
    public $role;
}
