<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are required.
 */
class TaxInfo
{
	public $tax_id;
	public $tax_id_type;
}
