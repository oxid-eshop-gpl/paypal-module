<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are
 * required.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-tax_info.json
 */
class TaxInfo implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $tax_id;

    /** @var string */
    public $tax_id_type;
}
