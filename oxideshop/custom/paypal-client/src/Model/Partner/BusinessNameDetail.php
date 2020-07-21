<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Name of the business provided.
 */
class BusinessNameDetail extends BusinessName implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /**
     * @var string
     * Business name type
     */
    public $type;
}
