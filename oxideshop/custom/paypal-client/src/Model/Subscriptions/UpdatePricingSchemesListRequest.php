<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The update pricing scheme request details.
 */
class UpdatePricingSchemesListRequest implements JsonSerializable
{
    use BaseModel;

    /** @var array<UpdatePricingSchemeRequest> */
    public $pricing_schemes;
}
