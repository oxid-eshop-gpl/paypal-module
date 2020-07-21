<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The individual owner of the account.
 */
class IndividualBeneficialOwner extends string implements \JsonSerializable
{
	/** @var string */
	public $percentage_of_ownership;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
