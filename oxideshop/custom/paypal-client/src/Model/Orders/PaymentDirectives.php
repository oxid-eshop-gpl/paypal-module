<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class PaymentDirectives
{
	/** @var string */
	public $linked_group_id;

	/** @var string */
	public $settlement_account_number;

	/** @var string */
	public $loss_account_number;

	/** @var boolean */
	public $special_deny;

	/** @var boolean */
	public $allow_duplicate_invoice_id;

	/** @var array */
	public $policy_directives;

	/** @var array */
	public $payment_method_directives;

	/** @var array */
	public $pricing_directives;

	/** @var boolean */
	public $immediate_payment_required;
}
