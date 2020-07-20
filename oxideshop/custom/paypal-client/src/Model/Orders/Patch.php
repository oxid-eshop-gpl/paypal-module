<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The JSON patch object to apply partial updates to resources.
 */
class Patch
{
	public $op;
	public $path;
	public $value;
	public $from;
}
