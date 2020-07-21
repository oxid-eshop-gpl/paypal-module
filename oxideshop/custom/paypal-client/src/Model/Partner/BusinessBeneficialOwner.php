<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The business beneficial owner of the account.
 */
class BusinessBeneficialOwner extends string implements \JsonSerializable
{
	/** @var string */
	public $percentage_of_ownership;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
