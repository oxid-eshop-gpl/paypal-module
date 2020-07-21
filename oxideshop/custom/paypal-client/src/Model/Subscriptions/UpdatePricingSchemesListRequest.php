<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The update pricing scheme request details.
 */
class UpdatePricingSchemesListRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $pricing_schemes;
}
