<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The information for a purchased item in a disputed transaction.
 */
class ItemInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $item_id;

    /** @var string */
    public $item_description;

    /** @var string */
    public $item_quantity;

    /** @var string */
    public $partner_transaction_id;

    /** @var string */
    public $reason;

    /** @var Money */
    public $dispute_amount;

    /** @var string */
    public $notes;
}
