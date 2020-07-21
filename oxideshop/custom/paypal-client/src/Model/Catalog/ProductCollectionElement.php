<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

/**
 * The details for a product in the collection response.
 */
class ProductCollectionElement
{
	/** @var string */
	public $id;

	/** @var string */
	public $name;

	/** @var string */
	public $description;

	/** @var string */
	public $create_time;

	/** @var array */
	public $links;
}
