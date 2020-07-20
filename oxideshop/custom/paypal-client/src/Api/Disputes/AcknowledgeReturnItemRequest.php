<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * A merchant request to acknowledge receipt of the disputed item that the customer returned.
 */
class AcknowledgeReturnItemRequest
{
	/** @var string */
	public $note;
}
