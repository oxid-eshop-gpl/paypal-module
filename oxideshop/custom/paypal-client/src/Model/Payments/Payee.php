<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
 */
class Payee extends PayeeBase implements JsonSerializable
{
    use BaseModel;

    /**
     * @var PayeeDisplayable
     * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout,
     * transactions, email receipts, and transaction history.
     */
    public $display_data;
}
