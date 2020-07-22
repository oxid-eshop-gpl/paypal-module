<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer-entered issue details for an unauthorized dispute.
 *
 * generated from: response-unauthorized_dispute_properties.json
 */
class UnauthorizedDisputeProperties implements JsonSerializable
{
    use BaseModel;

    /**
     * @var boolean
     * Indicates whether the customer changed their password after a spoof incident.
     */
    public $password_changed;

    /**
     * @var boolean
     * Indicates whether the customer changed their PIN after a spoof incident.
     */
    public $pin_changed;

    /**
     * @var boolean
     * Indicates whether the customer changed their answers to security questions after a spoof incident.
     */
    public $security_questions_changed;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $review_sla;

    /**
     * @var array<string>
     * An array of transaction IDs that the user reported as unauthorized but that PayPal rejected.
     */
    public $rejected_dispute_transactions;
}
