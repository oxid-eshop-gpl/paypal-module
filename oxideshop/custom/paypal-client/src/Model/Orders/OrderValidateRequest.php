<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Completes an action for an order.
 */
class OrderValidateRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var ExtendedPaymentSource */
    public $payment_source;

    /** @var OrderValidateApplicationContext */
    public $application_context;
}
