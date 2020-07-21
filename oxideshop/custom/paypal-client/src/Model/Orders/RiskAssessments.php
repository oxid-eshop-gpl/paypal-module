<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The risk assessment for a customer account, merchant account, or transaction.
 */
class RiskAssessments
{
	/** @var RiskAssessment */
	public $payer;

	/** @var RiskAssessment */
	public $payee;
}
