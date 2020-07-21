<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The request-related [HATEOAS link](/docs/api/reference/api-responses/#hateoas-links) information.
 */
class LinkDescription implements \JsonSerializable
{
	/** @var string */
	public $href;

	/** @var string */
	public $rel;

	/** @var string */
	public $method;

	/** @var string */
	public $title;

	/** @var string */
	public $mediaType;

	/** @var string */
	public $encType;

	/** @var LinkSchema */
	public $schema;

	/** @var LinkSchema */
	public $targetSchema;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
