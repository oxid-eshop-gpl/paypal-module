<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Business incorporation information.
 */
class BusinessIncorporation implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $incorporation_country_code;

    /** @var string */
    public $incorporation_date;

    /** @var string */
    public $incorporation_province_code;
}
