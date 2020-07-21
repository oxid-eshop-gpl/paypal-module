<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are required.
 */
class TaxInfo implements \JsonSerializable
{
    /** @var string */
    public $tax_id;

    /** @var string */
    public $tax_id_type;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
