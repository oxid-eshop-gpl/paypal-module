<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the merchant who receives the funds and fulfills the order. The merchant is also known as the
 * payee.
 */
class PayeeBase implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $email_address;

    /** @var string */
    public $merchant_id;

    /** @var string */
    public $client_id;
}
