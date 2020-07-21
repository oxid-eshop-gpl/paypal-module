<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
 * payments, captured payments, and refunds.
 */
class PaymentCollection implements JsonSerializable
{
    use BaseModel;

    /** @var array<AuthorizationWithAdditionalData> */
    public $authorizations;

    /** @var array<Capture> */
    public $captures;

    /** @var array<Refund> */
    public $refunds;
}
