<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are required.
 */
class TaxInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $tax_id;

    /** @var string */
    public $tax_id_type;
}
