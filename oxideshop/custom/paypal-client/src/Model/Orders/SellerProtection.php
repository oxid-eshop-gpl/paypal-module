<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The level of protection offered as defined by [PayPal Seller Protection for Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
 */
class SellerProtection
{
	public $status;
	public $dispute_categories;
}
