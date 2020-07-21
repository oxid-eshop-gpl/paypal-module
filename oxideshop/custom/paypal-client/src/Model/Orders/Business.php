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
