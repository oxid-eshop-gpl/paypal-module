<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

class Business implements \JsonSerializable
{
    use BaseModel;

    /** @var BusinessTypeInfo */
    public $business_type;

    /** @var BusinessIndustry */
    public $business_industry;

    /** @var BusinessIncorporation */
    public $business_incorporation;

    /** @var array */
    public $names;

    /** @var array */
    public $emails;

    /** @var string */
    public $website;

    /** @var array */
    public $addresses;

    /** @var array */
    public $phones;

    /** @var array */
    public $documents;
}
