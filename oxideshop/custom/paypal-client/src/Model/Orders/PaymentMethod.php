<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer and merchant payment preferences.
 */
class PaymentMethod implements JsonSerializable
{
    use BaseModel;

    const PAYEE_PREFERRED_UNRESTRICTED = 'UNRESTRICTED';
    const PAYEE_PREFERRED_IMMEDIATE_PAYMENT_REQUIRED = 'IMMEDIATE_PAYMENT_REQUIRED';

    /** @var string */
    public $payer_selected;

    /**
     * @var string
     * The merchant-preferred payment methods.
     */
    public $payee_preferred;

    /** @var string */
    public $standard_entry_class_code;
}
