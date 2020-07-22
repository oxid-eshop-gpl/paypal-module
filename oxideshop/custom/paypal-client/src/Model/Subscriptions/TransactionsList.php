<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The list transactions for a subscription request details.
 *
 * generated from: transactions_list.json
 */
class TransactionsList implements JsonSerializable
{
    use BaseModel;

    /** @var array<Transaction> */
    public $transactions;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array<array> */
    public $links;
}
