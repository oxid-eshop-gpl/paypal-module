<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

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
}
