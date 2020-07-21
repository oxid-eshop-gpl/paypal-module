<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * Beneficial owners of the entity.
 */
class BeneficialOwners implements \JsonSerializable
{
	/** @var array */
	public $individual_beneficial_owners;

	/** @var array */
	public $business_beneficial_owners;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
