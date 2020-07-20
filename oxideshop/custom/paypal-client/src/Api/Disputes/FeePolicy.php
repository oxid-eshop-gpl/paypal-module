<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * Policy that determines whether the fee needs to be retained or returned while moving the money as part of dispute process.
 */
class FeePolicy
{
	/** @var string */
	public $transaction_fee;
}
