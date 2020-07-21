<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Indicates the algorithm used to generate the CAVV/AAV value.
 */
class CavvAlgorithm implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
