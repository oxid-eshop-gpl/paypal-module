<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The transaction for which to create a case.
 */
class ReferredTransaction
{
	/** @var string */
	public $id;

	/** @var array */
	public $items;

	/** @var string */
	public $status;
}
