<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Currency receiving type defines the options when receiving payment in a currency not held by the reciver.
 */
class CurrencyReceivingType implements \JsonSerializable
{
    use BaseModel;
}
