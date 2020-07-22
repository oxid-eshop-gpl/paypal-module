<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer and merchant payment preferences.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-payment_method.json
 */
class PaymentMethod implements JsonSerializable
{
    use BaseModel;

    /** Accepts any type of payment from the customer. */
    const PAYEE_PREFERRED_UNRESTRICTED = 'UNRESTRICTED';

    /** Accepts only immediate payment from the customer. For example, credit card, PayPal balance, or instant ACH. Ensures that at the time of capture, the payment does not have the `pending` status. */
    const PAYEE_PREFERRED_IMMEDIATE_PAYMENT_REQUIRED = 'IMMEDIATE_PAYMENT_REQUIRED';

    /** @var string */
    public $payer_selected;

    /**
     * @var string
     * The merchant-preferred payment methods.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYEE_PREFERRED_UNRESTRICTED
     * @see PAYEE_PREFERRED_IMMEDIATE_PAYMENT_REQUIRED
     */
    public $payee_preferred;

    /** @var string */
    public $standard_entry_class_code;
}
