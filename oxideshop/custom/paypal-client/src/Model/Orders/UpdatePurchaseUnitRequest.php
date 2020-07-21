<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The purchase unit details. Used to capture required information for the payment contract.
 */
class UpdatePurchaseUnitRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reference_id;

    /**
     * @var UpdatePaymentCollectionRequest
     * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
     * payments, captured payments.
     */
    public $payments;
}
