<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The update pricing scheme request details.
 *
 * generated from: update_pricing_schemes_list_request.json
 */
class UpdatePricingSchemesListRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<UpdatePricingSchemeRequest>
     * An array of pricing schemes.
     */
    public $pricing_schemes;
}
