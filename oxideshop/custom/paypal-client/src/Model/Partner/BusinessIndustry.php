<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The category, subcategory and MCC code of the business.
 *
 * generated from: customer_common_overrides-business_industry.json
 */
class BusinessIndustry implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The customer's business category code. PayPal uses industry standard seller category codes.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $category;

    /**
     * @var string
     * The customer's business seller category code. PayPal uses industry standard seller category codes.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $mcc_code;

    /**
     * @var string
     * The customer's business subcategory code. PayPal uses industry standard seller subcategory codes.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $subcategory;
}
