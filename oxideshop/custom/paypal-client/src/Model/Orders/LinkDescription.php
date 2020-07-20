<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The request-related [HATEOAS link](/docs/api/reference/api-responses/#hateoas-links) information.
 */
class LinkDescription
{
	public $href;
	public $rel;
	public $method;
	public $title;
	public $mediaType;
	public $encType;

	/** @var OxidProfessionalServices\PayPal\Api\Model\LinkSchema */
	public $schema;

	/** @var OxidProfessionalServices\PayPal\Api\Model\LinkSchema */
	public $targetSchema;
}
