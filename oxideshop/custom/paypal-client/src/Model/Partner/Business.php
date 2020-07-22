<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * generated from: customer_common_overrides-business.json
 */
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

    /**
     * @var array<BusinessNameDetail>
     * Name of the business.
     */
    public $names;

    /**
     * @var array<Email>
     * Email addresses of the business.
     */
    public $emails;

    /**
     * @var string
     * Website of the business.
     *
     * minLength: 1
     * maxLength: 50
     */
    public $website;

    /**
     * @var array<BusinessAddressDetail>
     * List of addresses associated with the business entity.
     */
    public $addresses;

    /**
     * @var array<BusinessPhoneDetail>
     * List of phone number associated with the business.
     */
    public $phones;

    /**
     * @var array<BusinessDocument>
     * Business Party related Document data collected from the customer.. For example SSN, ITIN, Business
     * registration number that were collected from the user.
     */
    public $documents;
}
