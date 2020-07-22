<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
}
