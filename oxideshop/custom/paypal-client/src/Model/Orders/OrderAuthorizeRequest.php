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

    /** @var string */
    public $reference_id;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;
}
