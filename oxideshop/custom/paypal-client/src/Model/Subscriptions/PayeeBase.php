<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the merchant who receives the funds and fulfills the order. The merchant is also known as the
 * payee.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-payee_base.json
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

    /**
     * @var string
     * The public ID for the payee- or merchant-created app. Introduced to support use cases, such as BrainTree
     * integration with PayPal, where payee `email_address` or `merchant_id` is not available.
     */
    public $client_id;
}
