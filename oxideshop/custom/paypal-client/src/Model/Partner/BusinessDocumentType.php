<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The type of documents.
 */
class BusinessDocumentType implements \JsonSerializable
{
	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
