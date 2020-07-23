<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The refund details.
 *
 * generated from: response-refund_details.json
 */
class RefundDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $allowed_refund_amount;

    /**
     * An array of refund objects.
     *
     * @var Refund[] | null
     */
    public $refunds;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->allowed_refund_amount) || Assert::isInstanceOf(
            $this->allowed_refund_amount,
            Money::class,
            "allowed_refund_amount in RefundDetails must be instance of Money $within"
        );
        !isset($this->allowed_refund_amount) ||  $this->allowed_refund_amount->validate(RefundDetails::class);
        !isset($this->refunds) || Assert::isArray(
            $this->refunds,
            "refunds in RefundDetails must be array $within"
        );

        if (isset($this->refunds)) {
            foreach ($this->refunds as $item) {
                $item->validate(RefundDetails::class);
            }
        }
    }

    public function __construct()
    {
    }
}
