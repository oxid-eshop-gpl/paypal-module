<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The information about the disputed transaction.
 *
 * generated from: response-transaction_info.json
 */
class TransactionInfo implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $buyer_transaction_id;

    /** @var string */
    public $seller_transaction_id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /** @var string */
    public $transaction_status;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $gross_amount;

    /** @var string */
    public $invoice_number;

    /** @var string */
    public $custom;

    /**
     * @var Buyer
     * The details for the customer who funds the payment. For example, the customer's first name, last name, and
     * email address.
     */
    public $buyer;

    /**
     * @var Seller
     * The details for the merchant who receives the funds and fulfills the order. For example, merchant ID, and
     * contact email address.
     */
    public $seller;

    /**
     * @var Facilitator
     * A resource representing a Facilitator/Partner who facilitates a transaction.
     */
    public $facilitator;

    /** @var array<ItemInfo> */
    public $items;

    /** @var boolean */
    public $seller_protection_eligible;

    /** @var string */
    public $seller_protection_type;

    /**
     * @var RegulationInfo
     * The details for the regulation under which the transaction is covered.
     */
    public $regulation_info;

    /** @var string */
    public $provisional_credit_status;
}
