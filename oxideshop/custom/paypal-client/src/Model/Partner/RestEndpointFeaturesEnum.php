<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The REST endpoint.
 */
class RestEndpointFeaturesEnum implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
