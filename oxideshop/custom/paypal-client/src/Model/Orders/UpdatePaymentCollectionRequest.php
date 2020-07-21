<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized payments, captured payments.
 */
class UpdatePaymentCollectionRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $authorizations;

    /** @var array */
    public $captures;
}
