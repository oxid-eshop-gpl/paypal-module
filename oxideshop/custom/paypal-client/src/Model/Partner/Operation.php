<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The required operation to share data.
 *
 * generated from: referral_data-operation.json
 */
class Operation implements JsonSerializable
{
    use BaseModel;

    /** The operation used by partner request permission for customers api access. */
    const OPERATION_API_INTEGRATION = 'API_INTEGRATION';

    /** Captured state of an order. */
    const OPERATION_BANK_ADDITION = 'BANK_ADDITION';

    /** The operation to create a billing agreement. */
    const OPERATION_BILLING_AGREEMENT = 'BILLING_AGREEMENT';

    /** The operation to create a contextual marketing consent. */
    const OPERATION_CONTEXTUAL_MARKETING_CONSENT = 'CONTEXTUAL_MARKETING_CONSENT';

    /**
     * @var string
     * The operation to enable for the customer. To enable the collection of the API permissions that you require to
     * integrate with the customer, specify `API_INTEGRATION`. `BANK_ADDITION` is supported only for the US.
     *
     * use one of constants defined in this class to set the value:
     * @see OPERATION_API_INTEGRATION
     * @see OPERATION_BANK_ADDITION
     * @see OPERATION_BILLING_AGREEMENT
     * @see OPERATION_CONTEXTUAL_MARKETING_CONSENT
     * minLength: 1
     * maxLength: 255
     */
    public $operation;

    /**
     * @var IntegrationDetails
     * The integration details for the partner and customer relationship. Required if `operation` is
     * `API_INTEGRATION`.
     */
    public $api_integration_preference;

    /**
     * @var BillingAgreement
     * The details of the billing agreement between the partner and a seller.
     */
    public $billing_agreement;
}
