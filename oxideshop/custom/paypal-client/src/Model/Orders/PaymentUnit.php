<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

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

	/** @var AmountWithBreakdown */
	public $amount;

	/** @var array */
	public $items;

	/** @var ShippingDetails */
	public $shipping_details;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $description;

	/** @var string */
	public $invoice_id;

	/** @var string */
	public $payment_schedule_category;

	/** @var SoftDescriptorDetails */
	public $soft_descriptor_details;

	/** @var string */
	public $biller_company_name;

	/** @var string */
	public $biller_company_id;

	/** @var OdfiDetails */
	public $odfi_details;

	/** @var array */
	public $context_attributes;

	/** @var string */
	public $receiver;

	/** @var PaymentDirectives */
	public $payment_directives;
}
