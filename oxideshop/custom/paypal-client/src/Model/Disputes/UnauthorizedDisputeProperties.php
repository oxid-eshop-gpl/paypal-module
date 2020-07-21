<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer-entered issue details for an unauthorized dispute.
 */
class UnauthorizedDisputeProperties implements JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $password_changed;

    /** @var boolean */
    public $pin_changed;

    /** @var boolean */
    public $security_questions_changed;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $review_sla;

    /** @var array */
    public $rejected_dispute_transactions;
}
