<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The list transactions for a subscription request details.
 */
class TransactionsList
{
	/** @var array */
	public $transactions;

	/** @var integer */
	public $total_items;

	/** @var integer */
	public $total_pages;

	/** @var array */
	public $links;
}
