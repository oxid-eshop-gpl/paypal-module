<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The authorization of an order request.
 *
 * generated from: order_authorize_request.json
 */
class OrderAuthorizeRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment source definition.
     *
     * @var PaymentSource | null
     */
    public $payment_source;

    /**
     * The API caller-provided external ID for the purchase unit. Required for multiple purchase units.
     *
     * @var string | null
     * maxLength: 256
     */
    public $reference_id;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_source) || Assert::isInstanceOf(
            $this->payment_source,
            PaymentSource::class,
            "payment_source in OrderAuthorizeRequest must be instance of PaymentSource $within"
        );
        !isset($this->payment_source) ||  $this->payment_source->validate(OrderAuthorizeRequest::class);
        !isset($this->reference_id) || Assert::maxLength(
            $this->reference_id,
            256,
            "reference_id in OrderAuthorizeRequest must have maxlength of 256 $within"
        );
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in OrderAuthorizeRequest must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(OrderAuthorizeRequest::class);
    }

    public function __construct()
    {
    }
}
