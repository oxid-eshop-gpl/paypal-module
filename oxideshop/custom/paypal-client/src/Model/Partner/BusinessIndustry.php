<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 20
     */
    public $category;

    /**
     * @var string
     * The customer's business seller category code. PayPal uses industry standard seller category codes.
     *
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 20
     */
    public $mcc_code;

    /**
     * @var string
     * The customer's business subcategory code. PayPal uses industry standard seller subcategory codes.
     *
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 20
     */
    public $subcategory;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->category, "category in BusinessIndustry must not be NULL $within");
         Assert::minLength($this->category, 1, "category in BusinessIndustry must have minlength of 1 $within");
         Assert::maxLength($this->category, 20, "category in BusinessIndustry must have maxlength of 20 $within");
        Assert::notNull($this->mcc_code, "mcc_code in BusinessIndustry must not be NULL $within");
         Assert::minLength($this->mcc_code, 1, "mcc_code in BusinessIndustry must have minlength of 1 $within");
         Assert::maxLength($this->mcc_code, 20, "mcc_code in BusinessIndustry must have maxlength of 20 $within");
        Assert::notNull($this->subcategory, "subcategory in BusinessIndustry must not be NULL $within");
         Assert::minLength($this->subcategory, 1, "subcategory in BusinessIndustry must have minlength of 1 $within");
         Assert::maxLength($this->subcategory, 20, "subcategory in BusinessIndustry must have maxlength of 20 $within");
    }

    public function __construct()
    {
    }
}
