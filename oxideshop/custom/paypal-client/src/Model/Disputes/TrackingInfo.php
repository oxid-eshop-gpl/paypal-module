<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The tracking information.
 */
class TrackingInfo
{
	/** @var string */
	public $carrier_name;

	/** @var string */
	public $carrier_name_other;

	/** @var string */
	public $tracking_url;

	/** @var string */
	public $tracking_number;
}
