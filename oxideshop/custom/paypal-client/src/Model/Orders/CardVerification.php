<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The API caller can opt in to verify the card through PayPal offered verification services (e.g. Smart Dollar Auth, 3DS).
 */
class CardVerification implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $method;
}
