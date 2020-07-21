<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The information for a purchased item in a disputed transaction.
 */
class ItemInfo implements JsonSerializable
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

    /**
     * @var string
     * The reason for the item-level dispute. For information about the required information for each dispute reason
     * and associated evidence type, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     */
    public $reason;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $dispute_amount;

    /** @var string */
    public $notes;
}
