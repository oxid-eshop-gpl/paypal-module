<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

class Business
{
	/** @var BusinessTypeInfo */
	public $business_type;

	/** @var BusinessIndustry */
	public $business_industry;

	/** @var BusinessIncorporation */
	public $business_incorporation;

	/** @var array */
	public $names;

	/** @var array */
	public $emails;

	/** @var string */
	public $website;

	/** @var array */
	public $addresses;

	/** @var array */
	public $phones;

	/** @var array */
	public $documents;
}
