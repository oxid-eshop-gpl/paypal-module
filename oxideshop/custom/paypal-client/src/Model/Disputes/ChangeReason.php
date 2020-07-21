<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A request to change the reason for a dispute.
 */
class ChangeReason implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;

    /** @var string */
    public $note;

    /** @var Extensions */
    public $extensions;

    /** @var array<AccountActivity> */
    public $disputed_account_activities;

    /** @var array */
    public $transaction_ids;

    /** @var Money */
    public $buyer_requested_amount;

    /** @var array<ItemInfo> */
    public $item_info;
}
