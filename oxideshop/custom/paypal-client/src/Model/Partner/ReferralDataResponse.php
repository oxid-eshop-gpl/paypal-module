<?php

namespace OxidProfessionalServices\PayPal\Model\Partner;

/**
 * The share referral data response.
 */
class ReferralDataResponse
{
	/** @var string */
	public $partner_referral_id;

	/** @var string */
	public $submitter_payer_id;

	/** @var array */
	public $links;
}
