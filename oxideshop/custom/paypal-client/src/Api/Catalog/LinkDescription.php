<?php

namespace OxidProfessionalServices\PayPal\Api\Catalog;

/**
 * The request-related [HATEOAS link](/docs/api/reference/api-responses/#hateoas-links) information.
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
}
