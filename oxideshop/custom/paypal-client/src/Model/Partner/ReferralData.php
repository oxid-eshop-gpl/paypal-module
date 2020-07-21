<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer's referral data that partners share with PayPal.
 */
class ReferralData extends Account implements JsonSerializable
{
    use BaseModel;

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

    /** @var array<Operation> */
    public $operations;

    /** @var array<string> */
    public $products;

    /** @var array<LegalConsent> */
    public $legal_consents;
}
