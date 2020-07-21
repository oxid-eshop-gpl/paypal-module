<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Date of birth data provided by the user
 */
class BirthDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $date_of_birth;
}
