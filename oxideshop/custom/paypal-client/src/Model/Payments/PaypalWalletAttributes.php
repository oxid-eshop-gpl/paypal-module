<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Additional attributes associated with the use of this paypal wallet
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-paypal_wallet_attributes.json
 */
class PaypalWalletAttributes implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Customer
     * The details about a customer in merchant's or partner's system of records.
     */
    public $customer;
}