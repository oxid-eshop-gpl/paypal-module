<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * An array of JSON patch objects to apply partial updates to resources.
 */
class PatchRequest implements \JsonSerializable
{
    use BaseModel;
}
