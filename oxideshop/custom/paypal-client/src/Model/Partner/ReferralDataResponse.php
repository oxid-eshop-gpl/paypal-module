<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The share referral data response.
 */
class ReferralDataResponse
{
	/** @var string */
	public $partner_referral_id;

	/** @var string */
	public $submitter_payer_id;

	/** @var ReferralData */
	public $referral_data;

	/** @var array */
	public $links;
}
