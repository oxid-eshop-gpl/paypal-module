<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The preference to customize the web experience of the customer by overriding that is set at the Partner's
 * Account.
 *
 * generated from: referral_data-partner_config_override.json
 */
class PartnerConfigOverride implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The partner logo URL to display in the customer's onboarding flow.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $partner_logo_url;

    /**
     * @var string
     * The URL to which to redirect the customer upon completion of the onboarding process.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $return_url;

    /**
     * @var string
     * The description of the return URL.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $return_url_description;

    /**
     * @var string
     * If `renew_action_url` expires, redirect the customer to this URL.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $action_renewal_url;

    /**
     * @var boolean
     * Indicates whether to show an add credit card page.
     */
    public $show_add_credit_card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->partner_logo_url) || Assert::minLength($this->partner_logo_url, 1, "partner_logo_url in PartnerConfigOverride must have minlength of 1 $within");
        !isset($this->partner_logo_url) || Assert::maxLength($this->partner_logo_url, 127, "partner_logo_url in PartnerConfigOverride must have maxlength of 127 $within");
        !isset($this->return_url) || Assert::minLength($this->return_url, 1, "return_url in PartnerConfigOverride must have minlength of 1 $within");
        !isset($this->return_url) || Assert::maxLength($this->return_url, 127, "return_url in PartnerConfigOverride must have maxlength of 127 $within");
        !isset($this->return_url_description) || Assert::minLength($this->return_url_description, 1, "return_url_description in PartnerConfigOverride must have minlength of 1 $within");
        !isset($this->return_url_description) || Assert::maxLength($this->return_url_description, 127, "return_url_description in PartnerConfigOverride must have maxlength of 127 $within");
        !isset($this->action_renewal_url) || Assert::minLength($this->action_renewal_url, 1, "action_renewal_url in PartnerConfigOverride must have minlength of 1 $within");
        !isset($this->action_renewal_url) || Assert::maxLength($this->action_renewal_url, 127, "action_renewal_url in PartnerConfigOverride must have maxlength of 127 $within");
    }

    public function __construct()
    {
    }
}
