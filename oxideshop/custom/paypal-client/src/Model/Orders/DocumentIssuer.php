<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The document-issuing authority information.
 */
class DocumentIssuer implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $country_code;

    /** @var string */
    public $province_code;

    /** @var string */
    public $authority;
}
