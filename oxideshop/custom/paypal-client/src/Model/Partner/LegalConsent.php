<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer-provided consent.
 *
 * generated from: referral_data-legal_consent.json
 */
class LegalConsent implements JsonSerializable
{
    use BaseModel;

    /** The consent given by the customer to share their data with paypal. */
    const TYPE_SHARE_DATA_CONSENT = 'SHARE_DATA_CONSENT';

    /**
     * @var string
     * The type of consent. `SHARE_DATA_CONSENT` gives consent to you to share your customer's data with PayPal.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_SHARE_DATA_CONSENT
     * minLength: 1
     * maxLength: 127
     */
    public $type;

    /**
     * @var boolean
     * Indicates whether the customer agreed to share this type of data. To give consent, specify `true`. To withhold
     * consent, specify `false`.
     */
    public $granted;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength($this->type, 1, "type in LegalConsent must have minlength of 1 $within");
        !isset($this->type) || Assert::maxLength($this->type, 127, "type in LegalConsent must have maxlength of 127 $within");
    }

    public function __construct()
    {
    }
}
