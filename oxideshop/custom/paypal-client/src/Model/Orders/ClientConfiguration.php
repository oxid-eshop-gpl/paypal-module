<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Client configuration that captures the product flows and specific experiences that a user completes a paypal transaction.
 */
class ClientConfiguration
{
	/** @var string */
	public $product_code;

	/** @var string */
	public $product_feature;

	/** @var string */
	public $api;

	/** @var string */
	public $integration_artifact;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\ProductExperience */
	public $experience;
}
