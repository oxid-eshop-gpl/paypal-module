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

    /**
     * @var string
     * Industry standard category code of business.
     */
    public $category;

    /**
     * @var string
     * Industry standard sub category of business.
     */
    public $sub_category;

    /**
     * @var string
     * Industry standard merchant category code of business.
     */
    public $mcc_code;
}
