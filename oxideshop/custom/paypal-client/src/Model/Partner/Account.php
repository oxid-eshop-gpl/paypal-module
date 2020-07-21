<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Common account object to hold the account related details of the customer.
 */
class Account
{
	/** @var array */
	public $individual_owners;

	/** @var string */
	public $business_entity;
}
