<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * The details for the merchant who receives the funds and fulfills the order. For example, merchant ID, and contact email address.
 */
class Merchant
{
	/** @var string */
	public $merchant_id;

	/** @var string */
	public $name;
}
