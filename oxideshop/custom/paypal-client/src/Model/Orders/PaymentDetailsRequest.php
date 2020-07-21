<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Payment details for an order.
 */
class PaymentDetailsRequest implements JsonSerializable
{
    use BaseModel;

    /** @var PaymentSource */
    public $payment_source;

    /** @var array<UpdatePurchaseUnitRequest> */
    public $purchase_units;
}
