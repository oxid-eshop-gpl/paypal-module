<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The required operation to share data.
 */
class Operation implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $operation;

    /** @var IntegrationDetails */
    public $api_integration_preference;

    /** @var BillingAgreement */
    public $billing_agreement;
}
