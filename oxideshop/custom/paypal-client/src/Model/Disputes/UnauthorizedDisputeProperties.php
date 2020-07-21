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

    /** @var string */
    public $review_sla;

    /** @var array */
    public $rejected_dispute_transactions;
}
