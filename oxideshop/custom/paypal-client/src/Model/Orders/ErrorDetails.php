<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The error details. Required for client-side `4XX` errors.
 */
class ErrorDetails
{
	public $field;
	public $value;
	public $location;
	public $issue;
	public $description;
}
