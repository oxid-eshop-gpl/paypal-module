<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout,
 * transactions, email receipts, and transaction history.
 */
class PayeeDisplayable implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $business_email;

    /** @var Phone */
    public $business_phone;

    /** @var string */
    public $brand_name;
}
