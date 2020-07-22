<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The list transactions for a subscription request details.
 *
 * generated from: transactions_list.json
 */
class TransactionsList implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<Transaction>
     * An array of transactions.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 32767
     */
    public $transactions;

    /**
     * @var integer
     * The total number of items.
     */
    public $total_items;

    /**
     * @var integer
     * The total number of pages.
     */
    public $total_pages;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->transactions, "transactions in TransactionsList must not be NULL $within");
         Assert::minCount($this->transactions, 0, "transactions in TransactionsList must have min. count of 0 $within");
         Assert::maxCount($this->transactions, 32767, "transactions in TransactionsList must have max. count of 32767 $within");
         Assert::isArray($this->transactions, "transactions in TransactionsList must be array $within");

                                if (isset($this->transactions)){
                                    foreach ($this->transactions as $item) {
                                        $item->validate(TransactionsList::class);
                                    }
                                }

        !isset($this->links) || Assert::isArray($this->links, "links in TransactionsList must be array $within");
    }

    public function __construct()
    {
    }
}
