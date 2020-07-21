<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

/**
 * The product category.
 */
class ProductCategory implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
