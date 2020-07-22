<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
 * payments, captured payments.
 *
 * generated from: model-update_payment_collection_request.json
 */
class UpdatePaymentCollectionRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<UpdateAuthorizationRequest>
     * An array of authorized payments for a purchase unit. A purchase unit can have zero or more authorized
     * payments.
     */
    public $authorizations;

    /**
     * @var array<UpdateCaptureRequest>
     * An array of captured payments for a purchase unit. A purchase unit can have zero or more captured payments.
     */
    public $captures;
}
