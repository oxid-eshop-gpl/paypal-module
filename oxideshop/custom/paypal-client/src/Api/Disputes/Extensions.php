<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * The extended properties for the dispute. Includes additional information for a dispute category, such as billing disputes, the original transaction ID, and the correct amount.
 */
class Extensions
{
	/** @var boolean */
	public $merchant_contacted;
}
