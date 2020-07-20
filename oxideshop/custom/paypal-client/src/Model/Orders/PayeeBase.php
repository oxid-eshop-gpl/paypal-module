<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details for the merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
 */
class PayeeBase
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Email */
	public $email_address;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AccountId */
	public $merchant_id;
	public $client_id;
}
