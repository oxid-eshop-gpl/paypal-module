<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Client configuration that captures the product flows and specific experiences that a user completes a paypal transaction.
 */
class ClientConfiguration
{
	public $product_code;
	public $product_feature;
	public $api;
	public $integration_artifact;

	/** @var OxidProfessionalServices\PayPal\Api\Model\ProductExperience */
	public $experience;
}
