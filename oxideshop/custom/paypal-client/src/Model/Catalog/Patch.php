<?php

namespace OxidProfessionalServices\PayPal\Model\Catalog;

/**
 * The JSON patch object to apply partial updates to resources.
 */
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
