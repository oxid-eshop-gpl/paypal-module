<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The required operation to share data.
 */
class Operation implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $operation;

    /**
     * @var IntegrationDetails
     * The integration details for the partner and customer relationship. Required if `operation` is
     * `API_INTEGRATION`.
     */
    public $api_integration_preference;

    /**
     * @var BillingAgreement
     * The details of the billing agreement between the partner and a seller.
     */
    public $billing_agreement;
}
