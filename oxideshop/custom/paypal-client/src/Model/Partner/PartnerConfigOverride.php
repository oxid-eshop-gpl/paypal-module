<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $partner_logo_url;

    /**
     * @var string
     * The URL to which to redirect the customer upon completion of the onboarding process.
     */
    public $return_url;

    /**
     * @var string
     * The description of the return URL.
     */
    public $return_url_description;

    /**
     * @var string
     * If `renew_action_url` expires, redirect the customer to this URL.
     */
    public $action_renewal_url;

    /**
     * @var boolean
     * Indicates whether to show an add credit card page.
     */
    public $show_add_credit_card;
}
