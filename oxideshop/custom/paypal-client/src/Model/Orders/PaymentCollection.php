<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
 * payments, captured payments, and refunds.
 *
 * generated from: payment_collection.json
 */
class PaymentCollection implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<AuthorizationWithAdditionalData>
     * An array of authorized payments for a purchase unit. A purchase unit can have zero or more authorized
     * payments.
     */
    public $authorizations;

    /**
     * @var array<Capture>
     * An array of captured payments for a purchase unit. A purchase unit can have zero or more captured payments.
     */
    public $captures;

    /**
     * @var array<Refund>
     * An array of refunds for a purchase unit. A purchase unit can have zero or more refunds.
     */
    public $refunds;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->authorizations) || Assert::isArray($this->authorizations, "authorizations in PaymentCollection must be array $within");

                                if (isset($this->authorizations)){
                                    foreach ($this->authorizations as $item) {
                                        $item->validate(PaymentCollection::class);
                                    }
                                }

        !isset($this->captures) || Assert::isArray($this->captures, "captures in PaymentCollection must be array $within");

                                if (isset($this->captures)){
                                    foreach ($this->captures as $item) {
                                        $item->validate(PaymentCollection::class);
                                    }
                                }

        !isset($this->refunds) || Assert::isArray($this->refunds, "refunds in PaymentCollection must be array $within");

                                if (isset($this->refunds)){
                                    foreach ($this->refunds as $item) {
                                        $item->validate(PaymentCollection::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
