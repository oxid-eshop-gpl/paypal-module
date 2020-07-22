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
     *
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * @var string
     * The PayPal account ID for the merchant.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $merchant_id;

    /**
     * @var string
     * The name of the merchant.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $name;

    public function validate()
    {
        assert(!isset($this->email) || strlen($this->email) >= 3);
        assert(!isset($this->email) || strlen($this->email) <= 254);
        assert(!isset($this->merchant_id) || strlen($this->merchant_id) >= 1);
        assert(!isset($this->merchant_id) || strlen($this->merchant_id) <= 255);
        assert(!isset($this->name) || strlen($this->name) >= 1);
        assert(!isset($this->name) || strlen($this->name) <= 2000);
    }
}
