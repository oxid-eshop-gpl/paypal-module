<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The level of protection offered as defined by [PayPal Seller Protection for Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
 */
class SellerProtection implements \JsonSerializable
{
	/** @var string */
	public $status;

	/** @var array */
	public $dispute_categories;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
