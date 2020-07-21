<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Business category information. Refer: https://developer.paypal.com/docs/commerce-platform/reference/categories-subcategories/.
 */
class BusinessCategory
{
	/** @var string */
	public $category;

	/** @var string */
	public $sub_category;

	/** @var string */
	public $mcc_code;
}
