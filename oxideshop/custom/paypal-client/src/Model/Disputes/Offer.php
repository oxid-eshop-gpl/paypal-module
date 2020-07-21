<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The merchant-proposed offer for a dispute.
 */
class Offer
{
	/** @var Money */
	public $buyer_requested_amount;

	/** @var Money */
	public $seller_offered_amount;

	/** @var string */
	public $offer_type;

	/** @var array */
	public $history;
}
