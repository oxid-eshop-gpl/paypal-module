<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Additional attributes associated with the use of this paypal wallet
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-paypal_wallet_attributes.json
 */
class PaypalWalletAttributes implements JsonSerializable
{
    use BaseModel;

    /**
     * The details about a customer in merchant's or partner's system of records.
     *
     * @var Customer | null
     */
    public $customer;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->customer) || Assert::isInstanceOf(
            $this->customer,
            Customer::class,
            "customer in PaypalWalletAttributes must be instance of Customer $within"
        );
        !isset($this->customer) ||  $this->customer->validate(PaypalWalletAttributes::class);
    }

    public function __construct()
    {
    }
}
