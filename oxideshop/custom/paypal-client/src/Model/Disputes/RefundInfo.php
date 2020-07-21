<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payout details for the referred dispute.
 */
class RefundInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $recipient;

    /** @var Money */
    public $amount;

    /** @var string */
    public $create_time;

    /** @var string */
    public $transaction_id;

    /** @var string */
    public $payout_type;

    /** @var boolean */
    public $seller_protection_eligible;

    /** @var string */
    public $transaction_source;
}
