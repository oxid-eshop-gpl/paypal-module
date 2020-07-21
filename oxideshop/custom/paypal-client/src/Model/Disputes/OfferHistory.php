<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The offer history.
 */
class OfferHistory
{
	/** @var string */
	public $offer_time;

	/** @var string */
	public $actor;

	/** @var string */
	public $event_type;

	/** @var string */
	public $offer_type;

	/** @var Money */
	public $offer_amount;
}
