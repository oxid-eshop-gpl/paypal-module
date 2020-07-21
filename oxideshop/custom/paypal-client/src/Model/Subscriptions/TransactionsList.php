<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The list transactions for a subscription request details.
 */
class TransactionsList implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $transactions;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array */
    public $links;
}
