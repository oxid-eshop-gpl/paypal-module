<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Additional attributes associated with the use of this card
 */
class CardAttributes implements \JsonSerializable
{
    use BaseModel;

    /** @var Customer */
    public $customer;

    /** @var CardVerification */
    public $verification;
}
