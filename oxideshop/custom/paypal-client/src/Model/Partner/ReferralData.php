<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The customer's referral data that partners share with PayPal.
 */
class ReferralData extends \Account
{
	/** @var string */
	public $email;

	/** @var string */
	public $preferred_language_code;

	/** @var string */
	public $tracking_id;

	/** @var PartnerConfigOverride */
	public $partner_config_override;

	/** @var FinancialInstruments */
	public $financial_instruments;

	/** @var array */
	public $operations;

	/** @var array */
	public $products;

	/** @var array */
	public $legal_consents;
}
