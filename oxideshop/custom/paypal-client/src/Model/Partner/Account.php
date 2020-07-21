<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Common account object to hold the account related details of the customer.
 */
class Account
{
	/** @var array */
	public $individual_owners;

	/** @var BusinessEntity */
	public $business_entity;
}
