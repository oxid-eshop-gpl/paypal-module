<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the merchant who receives the funds and fulfills the order. The merchant is also known as the
 * payee.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-payee_base.json
 */
class PayeeBase implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     */
    public $email_address;

    /**
     * @var string
     * The account identifier for a PayPal account.
     */
    public $merchant_id;

    /** @var string */
    public $client_id;
}
