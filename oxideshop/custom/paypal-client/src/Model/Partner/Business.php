<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

class Business implements JsonSerializable
{
    use BaseModel;

    /**
     * @var BusinessTypeInfo
     * The type and subtype of the business.
     */
    public $business_type;

    /**
     * @var BusinessIndustry
     * The category, subcategory and MCC code of the business.
     */
    public $business_industry;

    /**
     * @var BusinessIncorporation
     * Business incorporation information.
     */
    public $business_incorporation;

    /** @var array<BusinessNameDetail> */
    public $names;

    /** @var array<Email> */
    public $emails;

    /** @var string */
    public $website;

    /** @var array<BusinessAddressDetail> */
    public $addresses;

    /** @var array<BusinessPhoneDetail> */
    public $phones;

    /** @var array<BusinessDocument> */
    public $documents;
}
