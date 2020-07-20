<?php

namespace OxidProfessionalServices\PayPal\Model\Catalog;

/**
 * The create product request details.
 */
class CreateProductRequest
{
	/** @var string */
	public $id;

	/** @var string */
	public $name;

	/** @var string */
	public $description;

	/** @var string */
	public $type;

	/** @var string */
	public $image_url;

	/** @var string */
	public $home_url;
}
