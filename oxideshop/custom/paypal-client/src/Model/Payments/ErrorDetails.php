<?php

namespace OxidProfessionalServices\PayPal\Model\Payments;

/**
 * The error details. Required for client-side `4XX` errors.
 */
class ErrorDetails
{
	/** @var string */
	public $field;

	/** @var string */
	public $value;

	/** @var string */
	public $location;

	/** @var string */
	public $issue;

	/** @var string */
	public $description;
}
