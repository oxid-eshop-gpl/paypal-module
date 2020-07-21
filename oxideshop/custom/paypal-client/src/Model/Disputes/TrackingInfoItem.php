<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The tracking information item.
 */
class TrackingInfoItem implements \JsonSerializable
{
	/** @var string */
	public $carrier_name;

	/** @var string */
	public $tracking_url;

	/** @var string */
	public $tracking_number;

	/** @var string */
	public $tracking_status;

	/** @var string */
	public $note;

	/** @var string */
	public $posted_time;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
