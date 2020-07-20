<?php

namespace OxidProfessionalServices\PayPal\Api\Subscriptions;

/**
 * The list of subscriptions.
 */
class SubscriptionCollection
{
	/** @var array */
	public $subscriptions;

	/** @var integer */
	public $total_items;

	/** @var integer */
	public $total_pages;

	/** @var array */
	public $links;
}
