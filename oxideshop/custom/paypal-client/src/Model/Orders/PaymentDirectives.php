<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Payment Directives for transaction.
 */
class PaymentDirectives implements \JsonSerializable
{
	/** @var string */
	public $disbursement_type;

	/** @var string */
	public $linked_group_id;

	/** @var string */
	public $settlement_account_number;

	/** @var string */
	public $loss_account_number;

	/** @var string */
	public $liability_type;

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

	/** @var AuthorizationDirectives */
	public $authorization_directives;

	/** @var string */
	public $currency_receiving_directive;

	/** @var boolean */
	public $immediate_payment_required;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
