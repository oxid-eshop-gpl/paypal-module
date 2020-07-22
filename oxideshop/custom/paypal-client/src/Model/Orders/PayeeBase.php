<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details for the merchant who receives the funds and fulfills the order. The merchant is also known as the
 * payee.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-payee_base.json
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
     *
     * maxLength: 254
     */
    public $email_address;

    /**
     * @var string
     * The account identifier for a PayPal account.
     *
     * minLength: 13
     * maxLength: 13
     */
    public $merchant_id;

    /**
     * @var string
     * The public ID for the payee- or merchant-created app. Introduced to support use cases, such as BrainTree
     * integration with PayPal, where payee `email_address` or `merchant_id` is not available.
     *
     * maxLength: 80
     */
    public $client_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->email_address) || Assert::maxLength($this->email_address, 254, "email_address in PayeeBase must have maxlength of 254 $within");
        !isset($this->merchant_id) || Assert::minLength($this->merchant_id, 13, "merchant_id in PayeeBase must have minlength of 13 $within");
        !isset($this->merchant_id) || Assert::maxLength($this->merchant_id, 13, "merchant_id in PayeeBase must have maxlength of 13 $within");
        !isset($this->client_id) || Assert::maxLength($this->client_id, 80, "client_id in PayeeBase must have maxlength of 80 $within");
    }

    public function __construct()
    {
    }
}
