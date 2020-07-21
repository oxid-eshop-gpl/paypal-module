<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The year and month, in ISO-8601 `YYYY-MM` date format. See [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
 */
class DateYearMonth implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
