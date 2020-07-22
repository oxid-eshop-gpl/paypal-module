<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The Buyer credit option used to fund the payment.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-paypal_credit.json
 */
class PaypalCredit implements JsonSerializable
{
    use BaseModel;

    /** Bill Me Later. */
    const TYPE_BILL_ME_LATER = 'BILL_ME_LATER';

    /** PayPal Smart Connect. */
    const TYPE_PAYPAL_SMART_CONNECT = 'PAYPAL_SMART_CONNECT';

    /** EBAY MasterCard. */
    const TYPE_EBAY_MASTERCARD = 'EBAY_MASTERCARD';

    /** PayPal Extras MasterCard. */
    const TYPE_PAYPAL_EXTRAS_MASTERCARD = 'PAYPAL_EXTRAS_MASTERCARD';

    /**
     * @var string
     * The PayPal-generated ID for the credit instrument.
     *
     * minLength: 4
     * maxLength: 25
     */
    public $id;

    /**
     * @var string
     * The credit sub-types.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_BILL_ME_LATER
     * @see TYPE_PAYPAL_SMART_CONNECT
     * @see TYPE_EBAY_MASTERCARD
     * @see TYPE_PAYPAL_EXTRAS_MASTERCARD
     * minLength: 1
     * maxLength: 50
     */
    public $type;
}
