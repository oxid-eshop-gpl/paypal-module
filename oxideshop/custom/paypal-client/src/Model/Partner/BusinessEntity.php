<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The business entity of the account.
 */
class BusinessEntity extends string
{
	/** @var BeneficialOwners */
	public $beneficial_owners;

	/** @var array */
	public $office_bearers;

	/** @var CurrencyRange */
	public $annual_sales_volume_range;

	/** @var CurrencyRange */
	public $average_monthly_volume_range;

	/** @var string */
	public $business_description;
}
