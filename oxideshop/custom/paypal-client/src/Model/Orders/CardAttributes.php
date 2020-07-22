<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Additional attributes associated with the use of this card
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-card_attributes.json
 */
class CardAttributes implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Customer
     * The details about a customer in merchant's or partner's system of records.
     */
    public $customer;

    /**
     * @var CardVerification
     * The API caller can opt in to verify the card through PayPal offered verification services (e.g. Smart Dollar
     * Auth, 3DS).
     */
    public $verification;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->customer) || Assert::isInstanceOf($this->customer, Customer::class, "customer in CardAttributes must be instance of Customer $within");
        !isset($this->customer) || $this->customer->validate(CardAttributes::class);
        !isset($this->verification) || Assert::isInstanceOf($this->verification, CardVerification::class, "verification in CardAttributes must be instance of CardVerification $within");
        !isset($this->verification) || $this->verification->validate(CardAttributes::class);
    }

    public function __construct()
    {
    }
}
