<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The customer-provided consent.
 */
class LegalConsent implements \JsonSerializable
{
	/** @var string */
	public $type;

	/** @var boolean */
	public $granted;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
