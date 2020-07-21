<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The risk assessment for a customer account, merchant account, or transaction.
 */
class RiskAssessments
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\RiskAssessment */
	public $payer;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\RiskAssessment */
	public $payee;
}
