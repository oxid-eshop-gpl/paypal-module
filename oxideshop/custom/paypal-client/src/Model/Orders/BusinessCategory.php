<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Business category information. Refer:
 * https://developer.paypal.com/docs/commerce-platform/reference/categories-subcategories/.
 *
 * generated from: model-business_category.json
 */
class BusinessCategory implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $category;

    /** @var string */
    public $sub_category;

    /** @var string */
    public $mcc_code;
}
