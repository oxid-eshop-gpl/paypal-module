<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class ReferredExtensions
{
	/** @var string */
	public $id;

	/** @var string */
	public $reason;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Disputes\TransactionHoldInfo */
	public $TransactionHoldInfo;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Disputes\TransactionRiskInfo */
	public $TransactionRiskInfo;
}
