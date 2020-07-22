<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The business name of the party.
 *
 * generated from: customer_common-v1-schema-common_components-v4-schema-json-openapi-2.0-business_name.json
 */
class BusinessName implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Required. The business name of the party.
     *
     * maxLength: 300
     */
    public $business_name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->business_name) || Assert::maxLength($this->business_name, 300, "business_name in BusinessName must have maxlength of 300 $within");
    }

    public function __construct()
    {
    }
}
