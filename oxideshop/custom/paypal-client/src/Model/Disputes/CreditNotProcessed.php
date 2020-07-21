<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The credit not processed details.
 */
class CreditNotProcessed
{
	/** @var string */
	public $issue_type;

	/** @var Money */
	public $expected_refund;

	/** @var CancellationDetails */
	public $cancellation_details;

	/** @var ProductDetails */
	public $product_details;

	/** @var ServiceDetails */
	public $service_details;
}
