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
     * The API caller-provided external ID for the purchase unit.
     *
     * @var string
     * minLength: 1
     * maxLength: 256
     */
    public $reference_id;

    /**
     * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
     * payments, captured payments.
     *
     * @var UpdatePaymentCollectionRequest
     */
    public $payments;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->reference_id, "reference_id in UpdatePurchaseUnitRequest must not be NULL $within");
        Assert::minLength(
            $this->reference_id,
            1,
            "reference_id in UpdatePurchaseUnitRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->reference_id,
            256,
            "reference_id in UpdatePurchaseUnitRequest must have maxlength of 256 $within"
        );
        Assert::notNull($this->payments, "payments in UpdatePurchaseUnitRequest must not be NULL $within");
        Assert::isInstanceOf(
            $this->payments,
            UpdatePaymentCollectionRequest::class,
            "payments in UpdatePurchaseUnitRequest must be instance of UpdatePaymentCollectionRequest $within"
        );
         $this->payments->validate(UpdatePurchaseUnitRequest::class);
    }

    public function __construct()
    {
        $this->payments = new UpdatePaymentCollectionRequest();
    }
}
