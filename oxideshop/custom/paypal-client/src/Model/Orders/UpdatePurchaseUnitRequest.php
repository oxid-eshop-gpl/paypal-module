<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reference_id) || Assert::minLength($this->reference_id, 1, "reference_id in UpdatePurchaseUnitRequest must have minlength of 1 $within");
        !isset($this->reference_id) || Assert::maxLength($this->reference_id, 256, "reference_id in UpdatePurchaseUnitRequest must have maxlength of 256 $within");
        !isset($this->payments) || Assert::isInstanceOf($this->payments, UpdatePaymentCollectionRequest::class, "payments in UpdatePurchaseUnitRequest must be instance of UpdatePaymentCollectionRequest $within");
        !isset($this->payments) || $this->payments->validate(UpdatePurchaseUnitRequest::class);
    }

    public function __construct()
    {
    }
}
