<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The documents associated with the business.
 */
class BusinessDocument extends Document implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;
}
