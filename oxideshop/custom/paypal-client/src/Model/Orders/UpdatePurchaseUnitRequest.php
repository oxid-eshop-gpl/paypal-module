<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The purchase unit details. Used to capture required information for the payment contract.
 */
class UpdatePurchaseUnitRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reference_id;

    /** @var UpdatePaymentCollectionRequest */
    public $payments;
}
