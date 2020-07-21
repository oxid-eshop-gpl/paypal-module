<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Additional attributes associated with the use of this card
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
}
