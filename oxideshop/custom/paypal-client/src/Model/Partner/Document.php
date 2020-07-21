<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The document object.
 */
class Document
{
	/** @var string */
	public $id;

	/** @var array */
	public $labels;

	/** @var string */
	public $name;

	/** @var string */
	public $identification_number;

	/** @var string */
	public $issue_date;

	/** @var string */
	public $expiry_date;

	/** @var string */
	public $issuing_country_code;

	/** @var array */
	public $files;

	/** @var array */
	public $links;
}
