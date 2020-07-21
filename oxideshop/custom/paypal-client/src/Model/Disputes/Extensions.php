<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The extended properties for the dispute. Includes additional information for a dispute category, such as
 * billing disputes, the original transaction ID, and the correct amount.
 */
class Extensions implements JsonSerializable
{
    use BaseModel;

    const MERCHANT_CONTACTED_OUTCOME_NO_RESPONSE = 'NO_RESPONSE';
    const MERCHANT_CONTACTED_OUTCOME_FIXED = 'FIXED';
    const MERCHANT_CONTACTED_OUTCOME_NOT_FIXED = 'NOT_FIXED';
    const MERCHANT_CONTACTED_MODE_WEBSITE = 'WEBSITE';
    const MERCHANT_CONTACTED_MODE_PHONE = 'PHONE';
    const MERCHANT_CONTACTED_MODE_EMAIL = 'EMAIL';
    const MERCHANT_CONTACTED_MODE_WRITTEN = 'WRITTEN';
    const MERCHANT_CONTACTED_MODE_IN_PERSON = 'IN_PERSON';

    /** @var boolean */
    public $merchant_contacted;

    /**
     * @var string
     * The outcome when the customer has contacted the merchant.
     *
     * use one of constants defined in this class to set the value:
     * @see MERCHANT_CONTACTED_OUTCOME_NO_RESPONSE
     * @see MERCHANT_CONTACTED_OUTCOME_FIXED
     * @see MERCHANT_CONTACTED_OUTCOME_NOT_FIXED
     */
    public $merchant_contacted_outcome;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $merchant_contacted_time;

    /**
     * @var string
     * The method used to contact the merchant.
     *
     * use one of constants defined in this class to set the value:
     * @see MERCHANT_CONTACTED_MODE_WEBSITE
     * @see MERCHANT_CONTACTED_MODE_PHONE
     * @see MERCHANT_CONTACTED_MODE_EMAIL
     * @see MERCHANT_CONTACTED_MODE_WRITTEN
     * @see MERCHANT_CONTACTED_MODE_IN_PERSON
     */
    public $merchant_contacted_mode;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $buyer_contacted_time;

    /**
     * @var BillingDisputesProperties
     * The billing issue details.
     */
    public $billing_dispute_properties;

    /**
     * @var UnauthorizedDisputeProperties
     * The customer-entered issue details for an unauthorized dispute.
     */
    public $unauthorized_dispute_properties;

    /**
     * @var MerchandizeDisputeProperties
     * The customer-provided merchandise issue details for the dispute.
     */
    public $merchandize_dispute_properties;

    /**
     * @var ExternalCaseProperties
     * The third-party claims properties.
     */
    public $external_case_properties;
}
