<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The purchase unit details. Used to capture required information for the payment contract.
 */
class UpdatePurchaseUnitRequest
{
	/** @var string */
	public $reference_id;

	/** @var UpdatePaymentCollectionRequest */
	public $payments;
}
