<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A request to settle a dispute in either the customer's or merchant's favor.
 */
class Adjudicate
{
	/** @var string */
	public $adjudication_outcome;
}
