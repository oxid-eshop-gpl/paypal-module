<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class ServiceDetails
{
	/** @var string */
	public $description;

	/** @var string */
	public $service_started;

	/** @var string */
	public $note;

	/** @var array */
	public $sub_reasons;

	/** @var string */
	public $purchase_url;
}
