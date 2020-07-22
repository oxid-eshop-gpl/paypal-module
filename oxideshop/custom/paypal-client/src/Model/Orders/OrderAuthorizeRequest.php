<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The authorization of an order request.
 *
 * generated from: order_authorize_request.json
 */
class OrderAuthorizeRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var PaymentSource
     * The payment source definition.
     */
    public $payment_source;

    /**
     * @var string
     * The API caller-provided external ID for the purchase unit. Required for multiple purchase units.
     *
     * maxLength: 256
     */
    public $reference_id;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    public function validate()
    {
        assert(!isset($this->reference_id) || strlen($this->reference_id) <= 256);
        assert(isset($this->amount));
    }
}
