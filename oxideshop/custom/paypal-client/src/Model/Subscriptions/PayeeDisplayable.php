<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout, transactions, email receipts, and transaction history.
 */
class PayeeDisplayable implements \JsonSerializable
{
    /** @var string */
    public $business_email;

    /** @var Phone */
    public $business_phone;

    /** @var string */
    public $brand_name;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
