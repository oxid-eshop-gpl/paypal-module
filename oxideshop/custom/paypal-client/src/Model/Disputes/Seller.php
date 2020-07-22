<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the merchant who receives the funds and fulfills the order. For example, merchant ID, and
 * contact email address.
 *
 * generated from: response-seller.json
 */
class Seller implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     */
    public $email;

    /** @var string */
    public $merchant_id;

    /** @var string */
    public $name;
}
