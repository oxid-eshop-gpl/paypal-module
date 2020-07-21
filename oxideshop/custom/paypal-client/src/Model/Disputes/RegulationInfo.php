<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The details for the regulation under which the transaction is covered.
 */
class RegulationInfo
{
	/** @var string */
	public $regulation_covered;

	/** @var string */
	public $resolution_sla;
}
