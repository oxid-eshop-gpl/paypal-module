<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The list of plans with details.
 */
class PlanCollection
{
	/** @var array */
	public $plans;

	/** @var integer */
	public $total_items;

	/** @var integer */
	public $total_pages;

	/** @var array */
	public $links;
}
