<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The information for a purchased item in a disputed transaction.
 */
class ItemInformation
{
	/** @var string */
	public $item_id;

	/** @var string */
	public $item_description;

	/** @var string */
	public $item_quantity;

	/** @var string */
	public $partner_transaction_id;

	/** @var string */
	public $notes;
}
