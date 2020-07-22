<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout,
 * transactions, email receipts, and transaction history.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-payee_displayable.json
 */
class PayeeDisplayable implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     */
    public $business_email;

    /**
     * @var Phone
     * The phone number, in its canonical international [E.164 numbering plan
     * format](https://www.itu.int/rec/T-REC-E.164/en).
     */
    public $business_phone;

    /**
     * @var string
     * The name of the merchant. Appears to the customer in checkout, payment transactions, email receipts, and
     * transaction history.
     */
    public $brand_name;
}
