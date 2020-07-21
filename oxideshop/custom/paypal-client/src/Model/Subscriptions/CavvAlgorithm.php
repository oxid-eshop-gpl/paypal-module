<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Indicates the algorithm used to generate the CAVV/AAV value.
 */
class CavvAlgorithm implements JsonSerializable
{
    use BaseModel;
}
