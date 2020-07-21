<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The request data or link target.
 */
class LinkSchema implements \JsonSerializable
{
	/** @var object */
	public $additionalItems;

	/** @var object */
	public $dependencies;

	/** @var object */
	public $items;

	/** @var object */
	public $definitions;

	/** @var object */
	public $patternProperties;

	/** @var object */
	public $properties;

	/** @var array */
	public $allOf;

	/** @var array */
	public $anyOf;

	/** @var array */
	public $oneOf;

	/** @var object */
	public $not;

	/** @var array */
	public $links;

	/** @var string */
	public $fragmentResolution;

	/** @var string */
	public $type;

	/** @var string */
	public $binaryEncoding;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Media */
	public $Media;

	/** @var string */
	public $pathStart;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
