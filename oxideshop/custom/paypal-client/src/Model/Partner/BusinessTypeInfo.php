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

    /**
     * @var string
     * The business types classified
     */
    public $type;

    /**
     * @var string
     * Sub classification of the business type
     */
    public $subtype;
}
