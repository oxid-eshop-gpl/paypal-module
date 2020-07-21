<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The card network or brand. Applies to credit, debit, gift, and payment cards.
 */
class CardBrand implements JsonSerializable
{
    use BaseModel;
}
