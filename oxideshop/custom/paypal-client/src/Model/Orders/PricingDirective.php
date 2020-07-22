<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Pricing directive for transaction indication the source and type of pricing.
 *
 * generated from: model-pricing_directive.json
 */
class PricingDirective implements JsonSerializable
{
    use BaseModel;

    /** Sender of the payment. */
    const PARTICIPANT_TYPE_SENDER = 'SENDER';

    /** Receiver of the payment. */
    const PARTICIPANT_TYPE_RECEIVER = 'RECEIVER';

    /** Facilitator of the payment. */
    const PARTICIPANT_TYPE_FACILITATOR = 'FACILITATOR';

    /** Blended Pricing Type. */
    const TYPE_BLENDED = 'BLENDED';

    /** IC+ Pricing Type. */
    const TYPE_IC_PLUS = 'IC_PLUS';

    /**
     * @var string
     * Participant type.
     *
     * use one of constants defined in this class to set the value:
     * @see PARTICIPANT_TYPE_SENDER
     * @see PARTICIPANT_TYPE_RECEIVER
     * @see PARTICIPANT_TYPE_FACILITATOR
     * minLength: 1
     * maxLength: 255
     */
    public $participant_type;

    /**
     * @var string
     * Account number of the preference owner.
     *
     * minLength: 1
     * maxLength: 30
     */
    public $account_number;

    /**
     * @var string
     * Type of pricing applied to a payment.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_BLENDED
     * @see TYPE_IC_PLUS
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate()
    {
        assert(!isset($this->participant_type) || strlen($this->participant_type) >= 1);
        assert(!isset($this->participant_type) || strlen($this->participant_type) <= 255);
        assert(!isset($this->account_number) || strlen($this->account_number) >= 1);
        assert(!isset($this->account_number) || strlen($this->account_number) <= 30);
        assert(!isset($this->type) || strlen($this->type) >= 1);
        assert(!isset($this->type) || strlen($this->type) <= 255);
    }
}
