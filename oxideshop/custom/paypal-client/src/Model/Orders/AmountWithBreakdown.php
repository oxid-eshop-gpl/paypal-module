<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The total order amount with an optional breakdown that provides details, such as the total item amount, total tax amount, shipping, handling, insurance, and discounts, if any.<br/>If you specify `amount.breakdown`, the amount equals `item_total` plus `tax_total` plus `shipping` plus `handling` plus `insurance` minus `shipping_discount` minus discount.<br/>The amount must be a positive number. For listed of supported currencies and decimal precision, see the PayPal REST APIs <a href="/docs/integration/direct/rest/currency-codes/">Currency Codes</a>.
 */
class AmountWithBreakdown extends \Money implements \JsonSerializable
{
	/** @var AmountBreakdown */
	public $breakdown;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
