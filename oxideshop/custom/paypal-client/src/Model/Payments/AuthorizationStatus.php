<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The status fields for an authorized payment.
 */
class AuthorizationStatus implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $status;

    /** @var AuthorizationStatusDetails */
    public $status_details;
}
