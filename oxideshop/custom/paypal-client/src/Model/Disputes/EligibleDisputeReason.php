<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class EligibleDisputeReason
{
	/** @var string */
	public $stage;

	/** @var string */
	public $reason;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Disputes\AllowableLifeCycle */
	public $AllowableLifeCycle;
}
