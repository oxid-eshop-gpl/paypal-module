<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * A set of filters that you can use to filter the disputes in the response.
 */
class Filter
{
	/** @var string */
	public $name;

	/** @var string */
	public $reasons;

	/** @var string */
	public $statuses;
}
