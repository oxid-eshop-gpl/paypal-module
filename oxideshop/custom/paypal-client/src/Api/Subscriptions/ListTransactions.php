<?php

namespace OxidProfessionalServices\PayPal\Api\Subscriptions;

/**
 * The list transactions for a subscription request details.
 */
class ListTransactions
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
