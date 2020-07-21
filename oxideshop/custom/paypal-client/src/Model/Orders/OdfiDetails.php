<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * ODFI acts as the interface between the Federal Reserve or ACH network and the originator of the transaction.
 */
class OdfiDetails implements \JsonSerializable
{
	/** @var string */
	public $standard_entry_class_code;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
