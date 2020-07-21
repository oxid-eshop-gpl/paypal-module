<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

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
