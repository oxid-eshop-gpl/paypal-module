<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

class Patch
{
	/** @var string */
	public $op;

	/** @var string */
	public $path;

	/** @var number|integer|string|boolean|null|array|object */
	public $value;

	/** @var string */
	public $from;
}
