<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Business information.
 */
class Business extends Party implements JsonSerializable
{
    use BaseModel;

    const TYPE_ANY_OTHER_BUSINESS_ENTITY = 'ANY_OTHER_BUSINESS_ENTITY';
    const TYPE_ASSOCIATION = 'ASSOCIATION';
    const TYPE_CORPORATION = 'CORPORATION';
    const TYPE_GENERAL_PARTNERSHIP = 'GENERAL_PARTNERSHIP';
    const TYPE_GOVERNMENT = 'GOVERNMENT';
    const TYPE_INDIVIDUAL = 'INDIVIDUAL';
    const TYPE_LIMITED_LIABILITY_PARTNERSHIP = 'LIMITED_LIABILITY_PARTNERSHIP';
    const TYPE_LIMITED_LIABILITY_PROPRIETORS = 'LIMITED_LIABILITY_PROPRIETORS';
    const TYPE_LIMITED_LIABILITY_PRIVATE_CORPORATION = 'LIMITED_LIABILITY_PRIVATE_CORPORATION';
    const TYPE_LIMITED_PARTNERSHIP = 'LIMITED_PARTNERSHIP';
    const TYPE_LIMITED_PARTNERSHIP_PRIVATE_CORPORATION = 'LIMITED_PARTNERSHIP_PRIVATE_CORPORATION';
    const TYPE_NONPROFIT = 'NONPROFIT';
    const TYPE_ONLY_BUY_OR_SEND_MONEY = 'ONLY_BUY_OR_SEND_MONEY';
    const TYPE_OTHER_CORPORATE_BODY = 'OTHER_CORPORATE_BODY';
    const TYPE_PARTNERSHIP = 'PARTNERSHIP';
    const TYPE_PRIVATE_PARTNERSHIP = 'PRIVATE_PARTNERSHIP';
    const TYPE_PROPRIETORSHIP = 'PROPRIETORSHIP';
    const TYPE_PROPRIETORSHIP_CRAFTSMAN = 'PROPRIETORSHIP_CRAFTSMAN';
    const TYPE_PROPRIETORY_COMPANY = 'PROPRIETORY_COMPANY';
    const TYPE_PRIVATE_CORPORATION = 'PRIVATE_CORPORATION';
    const TYPE_PUBLIC_COMPANY = 'PUBLIC_COMPANY';
    const TYPE_PUBLIC_CORPORATION = 'PUBLIC_CORPORATION';
    const TYPE_PUBLIC_PARTNERSHIP = 'PUBLIC_PARTNERSHIP';
    const TYPE_REGISTERED_COOPERATIVE = 'REGISTERED_COOPERATIVE';

    /** @var array<BusinessName> */
    public $names;

    /**
     * @var string
     * The business types classified.
     */
    public $type;

    /**
     * @var BusinessCategory
     * Business category information. Refer:
     * https://developer.paypal.com/docs/commerce-platform/reference/categories-subcategories/.
     */
    public $category;

    /** @var array<BusinessIdentification> */
    public $identifications;

    /** @var string */
    public $description;

    /** @var array<Person> */
    public $owners;

    /** @var string */
    public $url;

    /**
     * @var CustomerServiceContact
     * Customer care contact information.
     */
    public $customer_service_contacts;
}
