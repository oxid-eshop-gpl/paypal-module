<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * Payment data for a purchase unit.
 */
class PaymentUnit
{
	/** @var string */
	public $reference_id;

	/** @var string */
	public $parent_reference_id;

	/** @var string */
	public $idempotency_id;

	/** @var string */
	public $partner_attribution_id;

	/** @var string */
	public $payment_category;

	/** @var array */
	public $items;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $description;

	/** @var string */
	public $invoice_id;

	/** @var string */
	public $payment_schedule_category;

	/** @var string */
	public $biller_company_name;

	/** @var string */
	public $biller_company_id;

	/** @var array */
	public $context_attributes;
}
