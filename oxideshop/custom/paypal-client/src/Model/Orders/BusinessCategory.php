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
     *
     * minLength: 1
     * maxLength: 50
     */
    public $category;

    /**
     * @var string
     * Industry standard sub category of business.
     *
     * minLength: 1
     * maxLength: 50
     */
    public $sub_category;

    /**
     * @var string
     * Industry standard merchant category code of business.
     *
     * minLength: 1
     * maxLength: 4
     */
    public $mcc_code;
}
