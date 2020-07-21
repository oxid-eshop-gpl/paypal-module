<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The business name of the party.
 */
class BusinessName implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $business_name;

    /**
     * @var string
     * The orthography type based on the ISO 15924 names for scripts. Scipts are chosen based on [most widely used
     * writing systems](https://www.worldatlas.com/articles/the-world-s-most-popular-writing-scripts.html).
     */
    public $orthography;
}
