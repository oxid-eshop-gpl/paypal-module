<?php

namespace OxidProfessionalServices\PayPal\Api\Catalog;

/**
 * The details for a product in the collection response.
 */
class ProductElement
{
	/** @var string */
	public $id;

	/** @var string */
	public $name;

	/** @var string */
	public $description;

	/** @var array */
	public $links;
}
