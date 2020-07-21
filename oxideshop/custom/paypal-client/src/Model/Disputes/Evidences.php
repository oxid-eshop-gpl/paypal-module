<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A merchant or customer request to provide evidence for a dispute.
 */
class Evidences implements \JsonSerializable
{
	/** @var array */
	public $evidences;

	/** @var AddressPortable */
	public $return_shipping_address;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
