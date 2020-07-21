<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The type and subtype of the business.
 */
class BusinessTypeInfo implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;

    /** @var string */
    public $subtype;
}
