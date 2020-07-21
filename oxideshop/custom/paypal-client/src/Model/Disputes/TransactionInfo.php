<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The information about the disputed transaction.
 */
class TransactionInfo implements \JsonSerializable
{
    /** @var string */
    public $buyer_transaction_id;

    /** @var string */
    public $seller_transaction_id;

    /** @var string */
    public $create_time;

    /** @var string */
    public $transaction_status;

    /** @var Money */
    public $gross_amount;

    /** @var string */
    public $invoice_number;

    /** @var string */
    public $custom;

    /** @var Buyer */
    public $buyer;

    /** @var Seller */
    public $seller;

    /** @var Facilitator */
    public $facilitator;

    /** @var array */
    public $items;

    /** @var boolean */
    public $seller_protection_eligible;

    /** @var string */
    public $seller_protection_type;

    /** @var RegulationInfo */
    public $regulation_info;

    /** @var string */
    public $provisional_credit_status;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
