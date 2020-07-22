<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for PayPal CLASSIC endpoints.
 *
 * generated from: referral_data-classic_api_integration.json
 */
class ClassicApiIntegration implements JsonSerializable
{
    use BaseModel;

    /** The customer grants you, the partner, permission to use your API credentials to make API calls on their behalf. If you select this option, you must fill in details in <code>classic_third_party_details</code>. */
    const INTEGRATION_TYPE_THIRD_PARTY = 'THIRD_PARTY';

    /** You (partner) retrieve the customer's API credentials by calling the Account Status API. If you select this option, you must fill in details in <code>classic_first_party_details</code>. */
    const INTEGRATION_TYPE_FIRST_PARTY_INTEGRATED = 'FIRST_PARTY_INTEGRATED';

    /** The customer is prompted to provide their API credentials through the user interface at the end of the integrated sign-up flow. If you select this option, you must fill in details in <code>classic_first_party_details</code>. */
    const INTEGRATION_TYPE_FIRST_PARTY_NON_INTEGRATED = 'FIRST_PARTY_NON_INTEGRATED';

    /** Signature. */
    const FIRST_PARTY_DETAILS_SIGNATURE = 'SIGNATURE';

    /** Certificate. */
    const FIRST_PARTY_DETAILS_CERTIFICATE = 'CERTIFICATE';

    /**
     * @var string
     * The classic API integration type.
     *
     * use one of constants defined in this class to set the value:
     * @see INTEGRATION_TYPE_THIRD_PARTY
     * @see INTEGRATION_TYPE_FIRST_PARTY_INTEGRATED
     * @see INTEGRATION_TYPE_FIRST_PARTY_NON_INTEGRATED
     * minLength: 1
     * maxLength: 128
     */
    public $integration_type;

    /**
     * @var ClassicApiIntegrationThirdPartyDetails
     * The details of a classic third-party integration. If you have API credentials with which to call the API on
     * the customer's behalf, specify details in this field. The signup and setup flow asks that the seller grant the
     * required permissions to the partner.
     */
    public $third_party_details;

    /**
     * @var string
     * The details of a classic first-party integration. To use the customer's API credentials to make calls on his
     * or her behalf, specify details in this field.
     *
     * use one of constants defined in this class to set the value:
     * @see FIRST_PARTY_DETAILS_SIGNATURE
     * @see FIRST_PARTY_DETAILS_CERTIFICATE
     * minLength: 1
     * maxLength: 128
     */
    public $first_party_details;

    public function validate()
    {
        assert(!isset($this->integration_type) || strlen($this->integration_type) >= 1);
        assert(!isset($this->integration_type) || strlen($this->integration_type) <= 128);
        assert(!isset($this->first_party_details) || strlen($this->first_party_details) >= 1);
        assert(!isset($this->first_party_details) || strlen($this->first_party_details) <= 128);
    }
}
