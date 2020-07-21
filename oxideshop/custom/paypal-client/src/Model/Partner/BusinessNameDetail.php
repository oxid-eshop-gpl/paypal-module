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

    const TYPE_DOING_BUSINESS_AS = 'DOING_BUSINESS_AS';
    const TYPE_LEGAL_NAME = 'LEGAL_NAME';

    /** @var string */
    public $id;

    /**
     * @var string
     * Business name type
     */
    public $type;
}
