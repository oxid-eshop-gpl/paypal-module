<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
 */
class Payee extends PayeeBase implements JsonSerializable
{
    use BaseModel;

    /** @var PayeeDisplayable */
    public $display_data;
}
