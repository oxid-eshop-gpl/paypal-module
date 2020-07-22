<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The purchase unit details. Used to capture required information for the payment contract.
 *
 * generated from: model-update_purchase_unit_request.json
 */
class UpdatePurchaseUnitRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The API caller-provided external ID for the purchase unit.
     *
     * minLength: 1
     * maxLength: 256
     */
    public $reference_id;

    /**
     * @var UpdatePaymentCollectionRequest
     * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
     * payments, captured payments.
     */
    public $payments;

    public function validate()
    {
        assert(!isset($this->reference_id) || strlen($this->reference_id) >= 1);
        assert(!isset($this->reference_id) || strlen($this->reference_id) <= 256);
    }
}
