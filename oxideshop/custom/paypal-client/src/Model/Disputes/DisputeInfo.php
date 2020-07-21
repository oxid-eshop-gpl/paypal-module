<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The dispute summary information.
 */
class DisputeInfo implements \JsonSerializable
{
    /** @var string */
    public $dispute_id;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    /** @var array */
    public $disputed_transactions;

    /** @var array */
    public $disputed_account_activities;

    /** @var string */
    public $reason;

    /** @var string */
    public $status;

    /** @var string */
    public $dispute_state;

    /** @var Money */
    public $dispute_amount;

    /** @var Money */
    public $dispute_fee;

    /** @var string */
    public $external_reason_code;

    /** @var DisputeOutcome */
    public $dispute_outcome;

    /** @var string */
    public $dispute_life_cycle_stage;

    /** @var string */
    public $dispute_channel;

    /** @var array */
    public $messages;

    /** @var Extensions */
    public $extensions;

    /** @var array */
    public $evidences;

    /** @var string */
    public $buyer_response_due_date;

    /** @var string */
    public $seller_response_due_date;

    /** @var array */
    public $history;

    /** @var string */
    public $dispute_flow;

    /** @var Offer */
    public $offer;

    /** @var RefundDetails */
    public $refund_details;

    /** @var CommunicationDetails */
    public $communication_details;

    /** @var array */
    public $partner_actions;

    /** @var array */
    public $supporting_info;

    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
