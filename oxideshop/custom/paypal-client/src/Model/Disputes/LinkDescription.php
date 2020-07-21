<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The request-related [HATEOAS link](/docs/api/overview/#hateoas-links) information.
 */
class LinkDescription
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
}
