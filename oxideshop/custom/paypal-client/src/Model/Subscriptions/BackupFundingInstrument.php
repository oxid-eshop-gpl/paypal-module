<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The backup funding instrument to use for payment when the primary instrument fails.
 */
class BackupFundingInstrument
{
	/** @var CardResponse */
	public $card;
}
