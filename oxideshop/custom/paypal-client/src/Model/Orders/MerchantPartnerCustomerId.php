<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The unique ID for a customer in merchant's or partner's system of records.
 */
class MerchantPartnerCustomerId implements JsonSerializable
{
    use BaseModel;
}
