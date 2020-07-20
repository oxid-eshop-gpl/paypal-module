<?php

namespace OxidProfessionalServices\PayPal\Api\Catalog;

/**
 * The list of products, with details.
 */
class ProductCollection
{
	/** @var array */
	public $products;

	/** @var integer */
	public $total_items;

	/** @var integer */
	public $total_pages;

	/** @var array */
	public $links;
}
