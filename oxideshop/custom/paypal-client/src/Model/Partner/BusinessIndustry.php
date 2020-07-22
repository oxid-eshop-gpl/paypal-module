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

    public function validate()
    {
        assert(!isset($this->category) || strlen($this->category) >= 1);
        assert(!isset($this->category) || strlen($this->category) <= 20);
        assert(!isset($this->mcc_code) || strlen($this->mcc_code) >= 1);
        assert(!isset($this->mcc_code) || strlen($this->mcc_code) <= 20);
        assert(!isset($this->subcategory) || strlen($this->subcategory) >= 1);
        assert(!isset($this->subcategory) || strlen($this->subcategory) <= 20);
    }
}
