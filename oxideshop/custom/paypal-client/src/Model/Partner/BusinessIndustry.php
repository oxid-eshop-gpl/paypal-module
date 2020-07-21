<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The category, subcategory and MCC code of the business.
 */
class BusinessIndustry implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $category;

    /** @var string */
    public $mcc_code;

    /** @var string */
    public $subcategory;
}
