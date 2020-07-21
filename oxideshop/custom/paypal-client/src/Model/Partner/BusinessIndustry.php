<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The category, subcategory and MCC code of the business.
 */
class BusinessIndustry implements \JsonSerializable
{
	/** @var string */
	public $category;

	/** @var string */
	public $mcc_code;

	/** @var string */
	public $subcategory;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
